<?php 

    class ZipHandler {

        private $zip;
        const CAMINHO_PARA_IMAGENS = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'img/produtos/';

        public function __construct($path){
            
            // Criando arquivo zip
            $this->zip = new ZipArchive();

            // Abrindo o arquivo zip
            if($this->zip->open($path, ZipArchive::RDONLY) !== true){
                throw new Exception("Falha ao abrir arquivo zip", 1);
            }

        }

        public function extract(){

            // Definindo caminho de destino
            $dest = sys_get_temp_dir();

            // Capturando nome da pasta raíz (possui a "/" no final)
            $raiz = $this->zip->getNameIndex(0);

            // Extraindo para pasta de destino
            if(!$this->zip->extractTo($dest)) {
                throw new Exception("Falha ao tentar descompactar arquivo", 1);
            }

            // listando conteúdo da pasta destino
            $pastas = array_values(preg_grep('/^([^.])/', scandir($dest.DIRECTORY_SEPARATOR.$raiz)));

            // Tratando pastas
            foreach ($pastas as $pasta) {
                $this->tratarPasta($dest.DIRECTORY_SEPARATOR.$raiz.$pasta);
            }
        }

        private function tratarPasta($path){
            
            // Capturando o id do produto
            $idProduto = basename($path);

            // Listando imagens da pasta
            $imagens = array_values(preg_grep('/.*\.(png|jpg|gif)$/', scandir($path)));
            foreach ($imagens as $i=> $imagem) {
                $imagens[$i] = $path.DIRECTORY_SEPARATOR.$imagem;
            }
            
            // Salvando imagens
            foreach ($imagens as $imagem) {
                $this->salvarImagem($idProduto, $imagem);
            }

            // Listando descrições da pasta
            $desc = array_values(preg_grep('/.*\.(htm|html)$/', scandir($path)));
            if($desc){
                // Existe arquivo de descrição
                $this->salvarDescricao($idProduto, $path.DIRECTORY_SEPARATOR.$desc[0]);
            }
        }

        private function salvarImagem($idProduto, $path){

            // Definindo a pasta de imagens do produto
            $pastaDeImagensDoProduto = self::CAMINHO_PARA_IMAGENS.$idProduto;

            // Criando a pasta do produto caso ela não exista
            if(!file_exists($pastaDeImagensDoProduto)){
                if(!mkdir($pastaDeImagensDoProduto)){
                    throw new Exception("Impossível criar pasta de imagens do produto", 1);
                }
            }

            // Movendo arquivo para pasta
            if(!rename($path, $pastaDeImagensDoProduto.DIRECTORY_SEPARATOR.basename($path))){
                throw new Exception("Falha ao tentar mover imagem para a pasta de imagens do produto", 1);
            }
        }

        private function salvarDescricao($idProduto, $path){
            $db = new DB();
            $stmt = $db->prepare("UPDATE produtos SET descricao=:desc WHERE id=:idProduto");
            if(!$stmt->execute(["desc"=>file_get_contents($path),"idProduto"=>$idProduto])){
                throw new Exception($stmt->errorInfo()[2], 1);
            }
        }

    }

?>