INSERT INTO Clientes (nome) VALUES 
('João'),
('Maria'),
('Fulano'),
('Siclano'),
('Beltrano');

INSERT INTO Categorias (descricao) VALUES 
('Eletrônicos'),
('Livros'),
('Roupas'),
('Alimentos'),
('Móveis');

INSERT INTO Produtos (descricao, valor) VALUES 
('Smartphone', 1500.00),
('Notebook', 3000.00),
('Camisa', 50.00),
('Livro de Ficção', 25.00),
('Mesa de Jantar', 800.00);

INSERT INTO ProdutosCategorias (produto_id, categoria_id) VALUES 
(1, 1),
(2, 1),
(3, 3),
(4, 2),
(5, 5);

INSERT INTO Pedidos (cliente_id, valor_total) VALUES 
(1, 1525.00),
(2, 3050.00),
(3, 800.00),
(4, 50.00);

INSERT INTO PedidosProdutos (pedido_id, produto_id) VALUES 
(1, 1),
(1, 4),
(2, 2),
(2, 3),
(3, 5),
(4, 3);

INSERT INTO Pagamentos (pedido_id, valor, concluido) VALUES 
(1, 1525.00, 1),
(2, 3050.00, 1),
(3, 800.00, 0),
(4, 50.00, 1);