# SisFrete

## Sobre

Repositório criado para um teste para empresa SisFrete, para demonstrar conhecimentos de bancos de dados e API RESTful com Laravel.

## Instalação

- Clonar o repositório com ```git clone https://github.com/fbatisteti/SisFrete.git```
- Ajustar o [arquivo .env.example](https://github.com/fbatisteti/SisFrete/blob/main/sisfrete/.env.example) para apontar para o seu banco de dados
    - Depois renomear o arquivo para apenas ```.env```
- Criar o banco de dados. Isso pode ser feito pelo Laravel ou por SQL
    - LARAVEL: rodar ```php artisan migrate```
    - SQL: Rodar os comandos SQLs para criar as tabelas no banco de dados de sua escolha
        - Os comandos estão [neste arquivo](https://github.com/fbatisteti/SisFrete/blob/main/sql_queries_create.sql).
- Caso queira pré-popular o banco com alguns dados, deixei alguns comandos prontos
    - Os comandos estão [neste arquivo](https://github.com/fbatisteti/SisFrete/blob/main/sql_queries_populate.sql)

## Sobre as escolhas...

### ... do SQL:

Foram solicitadas as tabelas **Clientes**, **Pedidos**, **Produtos**, **Categorias de Produtos** e **Pagamentos**, com *relacionamentos N entre produtos e categorias* e *relacionamentos 1 entre clientes e pedidos, e entre pedidos e produtos*.

Para a criação das tabelas, tentei manter no mínimo necessário para funcionar em código e por visualização por pessoas. Qualquer outra coluna que seja necessária é para as regras de negócio específicas da empresa.

A tabela **Clientes** tem três campos: *ID (PK)*, *NOME* e *ATIVO*.

A tabela **Pedidos** tem três campos: *ID (PK)*, *CLIENTE_ID (FK para Clientes)* e *VALOR_TOTAL*.
Ela guarda o valor final de um pedido, que não necessariamente precisa ser o valor das somas de seus produtos (fretes, impostos, descontos...);

A tabela **Pagamentos** tem quatro campos: *ID (PK)*, *PEDIDO_ID (FK para Pedidos)*, *VALOR* e *CONCLUIDO*.
Cada pagamento se relaciona a um pedido, mas pode haver mais de um pagamento por pedido (para simular parcelamentos, pagamentos contestados e outras situações...). Cada pagamento também tem seu valor próprio, que é para se adequar à negociação do pagamento.

A tabela **Produtos** tem quatro campos: *ID (PK)*, *DESCRICAO*, *VALOR* e *ATIVO*.

A tabela **Categorias** tem três campos: *ID (PK)*, *DESCRICAO* e *ATIVO*.

A tabela **ProdutosCategorias** tem três campos: *ID (PK)*, *PRODUTO_ID (FK de Produtos)* e *CATEGORIA_ID (FK de Categorias)*.
Aqui é a representação de relacionamento N entre produtos e categorias.

A tabela **PedidosProdutos** tem três campos: *ID (PK)*, *PEDIDO_ID (FK de Pedidos)* e *PRODUTO_ID (FK de Produtos)*.
Aqui é a representação de relacionamento N entre pedidos e produtos.

### ... da API:

Fiz vários endpoints para cada função, ao invés de somente os que foram solicitados. Quase todas as tabelas tem um CRUD, salvo algumas condições específicas que, julgo eu, atrapalhariam a integridade do banco de dados.

A documentação da API pode ser encontrada [aqui]().

### ... das consultas:

asd