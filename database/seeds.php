<?php
    // Definindo array de categorias
    $categorias = [
        [
            ':id' => 1,
            ':nome' => 'Sala de Máquinas'
        ],
        [
            ':id' => 2,
            ':nome' => 'Sala de Gesso'
        ]
    ];

    // Definindo array de produtos
    $produtos = [
        [
            ':id' => 1,
            ':nome' => 'Produto 1',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 1
        ],[
            ':id' => 2,
            ':nome' => 'Produto 2',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 1,
        ],[
            ':id' => 3,
            ':nome' => 'Produto 3',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 1,
        ],[
            'id' => 4,
            ':nome' => 'Produto 4',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 2,
        ],[
            'id' => 5,
            ':nome' => 'Produto 5',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 2,
        ],[
            'id' => 6,
            ':nome' => 'Produto 6',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 2,
        ],[
            'id' => 7,
            ':nome' => 'Produto 7',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 2,
        ],[
            'id' => 8,
            ':nome' => 'Produto 8',
            ':descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum fermentum lobortis. Cras pharetra orci ac risus vehicula blandit. Phasellus aliquet eleifend accumsan. Curabitur lobortis pulvinar risus vel gravida. Fusce luctus id dolor pulvinar suscipit. Praesent arcu justo, dapibus blandit nisl in, vehicula consectetur odio. Proin lacinia tortor sem, vitae varius augue congue et. Nulla a aliquam arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempor nibh non turpis condimentum aliquam. In eu felis scelerisque, laoreet magna non, vestibulum leo. Integer auctor nibh in magna fermentum lobortis. In leo sem, luctus at hendrerit vulputate, suscipit a nunc. Cras malesuada, mauris id convallis bibendum, ligula sem vulputate ipsum, quis semper magna turpis nec nibh.',
            ':id_categoria' => 2,
        ],
    ];

    // Definindo array de tags
    $nomes = explode('mala,quatro,saia,arroz,batata,azul,carne,polvo,copo,panela',',');
    $tags = [];
    foreach ($nomes as $i => $nome) {
        $tags[] = [
            ':id' => $i,
            ':nome' => $nome,
            ':id_produto' =>  4 + ($i % 5)
        ];
    }

    // Definindo array de imagens
    $imagens = [
        [
            ':id' => 1,
            ':caminho' => 'no-image.png',
            ':id_produto' => 4
        ],
        [
            ':id' => 2,
            ':caminho' => 'no-image.png',
            ':id_produto' => 4
        ],
        [
            ':id' => 3,
            ':caminho' => 'no-image.png',
            ':id_produto' => 4
        ],
        [
            ':id' => 4,
            ':caminho' => 'no-image.png',
            ':id_produto' => 4
        ],
    ];
    
    // Definindo array de produtos relacionados
    $relacionados = [
        [
            ':id_produto1' => 4,
            ':id_produto2' => 5
        ],
        [
            ':id_produto1' => 4,
            ':id_produto2' => 6
        ],
        [
            ':id_produto1' => 4,
            ':id_produto2' => 7
        ],
        [
            ':id_produto1' => 4,
            ':id_produto2' => 5
        ],
        [
            ':id_produto1' => 7,
            ':id_produto2' => 5
        ],
        [
            ':id_produto1' => 6,
            ':id_produto2' => 7
        ],
        [
            ':id_produto1' => 7,
            ':id_produto2' => 8
        ],
        [
            ':id_produto1' => 8,
            ':id_produto2' => 6
        ],
        [
            ':id_produto1' => 8,
            ':id_produto2' => 5
        ],
    ];

    // Definindo array de atributos
    $atributos = [
        [
            ':id' => 1,
            ':nome' => 'Peso'
        ],[
            ':id' => 2,
            ':nome' => 'Altura'
        ],[
            ':id' => 3,
            ':nome' => 'Largura'
        ],[
            ':id' => 4,
            ':nome' => 'Profundidade'
        ],[
            ':id' => 5,
            ':nome' => 'Potência'
        ],[
            ':id' => 6,
            ':nome' => 'Velocidade'
        ],
    ];

    // Definindo array de valores de atributos
    $valores = [];
    for ($i=0; $i < 40; $i++) { 
        $valores[] = [
            ':id' => ($i + 1),
            ':valor' => uniqid(),
            ':id_produto' => 1 + ($i % 8),
            ':id_atributo' => 1 + ($i % 6)
        ];    
    }