<?php 
    
    class ProducstLoader {

        private $cabecalhos;
        private $atributos;
        private $produtos;
        private $ultimoCampoProprio = "tags";
        private $inicioDeAtributos;
        private $fimDeAtributos;
        private $categorias = [
            [
                "id" => 1,
                "nome" => "Categoria 1"
            ],
            [
                "id" => 2,
                "nome" => "Categoria 2"
            ],
            [
                "id" => 3,
                "nome" => "Categoria 3"
            ]
        ];
    
        public function __construct($path){
            
            // Abrindo o arquivo para leitura
            $fh = @fopen($path,'r');
    
            // Verificando se foi possível abrir o arquivo
            if($fh === false){
                throw new Exception("Falhou ao abrir o arquivo enviado", 1);
            }

            // Lendo o cabecalho
            $this->cabecalhos = fgetcsv($fh,0,';','"');

            // Determinando início e fim de atributos
            $this->inicioDeAtributos = array_search($this->ultimoCampoProprio, $this->cabecalhos) + 1;
            $this->fimDeAtributos = count($this->cabecalhos) - 1;
            

            // Parsing Atributos
            $this->parseAtributos();

            // Salvando atributos
            $this->saveAtributos();

            // Criando categorias
            $this->saveCategorias();

            // Lendo os produtos
            $this->produtos = [];
            while($produto = fgetcsv($fh,0,';','"')){
                $this->produtos[] = $produto;
            }

            // Salvando produtos
            try {
                $this->saveProdutos();
            } catch (\Throwable $th) {
                throw $th;
            }
        
            
        }

        private function parseAtributos(){

            // Inicializando o array de atributos
            $this->atributos = [];
            
            // Percorrendo parte dos cabeçalhos que contém os atributos
            for ($i=$this->inicioDeAtributos; $i <= $this->fimDeAtributos; $i++) {
                
                $aux = explode(' ', trim($this->cabecalhos[$i]));
                $this->atributos[$i] = [
                    "nome" => $aux[0],
                    "unidade" => str_replace(')','',str_replace('(','',$aux[1]))
                ];
                
            }

        }

        private function saveAtributos(){
            
            // Criando conexão com o banco de dados
            $db = new DB();

            // Limpando tabela de atributos
            $db->query('DELETE FROM atributos');

            // Preparando a consulta de insersão
            $stmt = $db->prepare('INSERT INTO atributos (id, nome, unidade) VALUES (:id, :n, :u)');
            
            // Executando a consulta para cada atributo
            foreach ($this->atributos as $i=>$a) {
                $stmt->execute(['id'=>$i, 'n' => $a['nome'], 'u'=>$a['unidade']]);
            }

        }

        private function saveCategorias(){
            // Criando conexão com o banco de dados
            $db = new DB();

            // Limpando tabela de atributos
            $db->query('DELETE FROM categorias');

            // Preparando a consulta de insersão
            $stmt = $db->prepare('INSERT INTO categorias (id, nome) VALUES (:id, :nome)');
            
            // Executando a consulta para cada atributo
            foreach ($this->categorias as $c) {
                $stmt->execute($c);
            }
        }

        private function saveProdutos(){

            // Criando conexão com banco
            $db = new DB();

            // Limpando tabelas
            $db->query('DELETE FROM produtos');

            // Preparando a consulta de insersão
            $stmt = $db->prepare('INSERT INTO produtos
                                    (id, nome, descricao, id_categoria)
                                    VALUES
                                    (:id, :nome, :descricao, :id_categoria)'
                                );
            
            // Entrando no loop de produtos
            foreach ($this->produtos as $produto) {

                // Nomeando parâmetros
                $id = $produto[0];
                $nome = $produto[1];
                $idCategoria = $produto[2];
                $tags = array_map(function($tag){ return trim($tag); }, explode(',', $produto[4]));

                // Executando statement
                
                $ok = $stmt->execute([
                    "id" => $id,
                    "nome" => $nome,
                    "descricao" => '',
                    "id_categoria" => $idCategoria
                ]);
                    
                if(!$ok){
                    throw new Exception($stmt->errorInfo()[2], 1);
                }

                // Salvando tags
                $this->saveTags($id, $tags);

                // salvando atributos
                $this->saveAtributosDoProduto($produto);
            }

        }

        private function saveTags($idProduto, $tags){
            // Criando conexão com banco
            $db = new DB();

            // Preparando a consulta de insersão
            $stmt = $db->prepare('INSERT INTO tags
                                    (nome, produtos_id)
                                    VALUES
                                    (:nome, :produtos_id)'
                                );
            
            // Entrando no loop de produtos
            foreach ($tags as $tag) {
                $stmt->execute(["nome"=>$tag, "produtos_id"=>$idProduto]);
            }
        }

        private function saveAtributosDoProduto($produto){

            // Capturando o id do produto
            $idProduto = $produto[0];

            // Criando conexão com DB
            $db = new DB();

            // Criando statement
            $stmt = $db->prepare("INSERT INTO valores_de_atributos (valor, id_produto, id_atributo) VALUES (:v, :p, :a)");

            // Percorrendo trecho do array que se refere a atributos do produto
            for ($i=$this->inicioDeAtributos; $i <= $this->fimDeAtributos; $i++) {
                $valor = $produto[$i];
                if($valor){
                    if(!$stmt->execute(["v"=>$valor, "p"=>$idProduto, "a"=>$i])){
                        throw new Exception($stmt->errorInfo()[2], 1);
                    }
                }
            }
        }

        function getProdutos(){
            return $this->produtos;
        }
    }

?>