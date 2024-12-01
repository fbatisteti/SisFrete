-- Criando o banco de dados
CREATE DATABASE sisfrete;
USE sisfrete;

-- Tabela Clientes
CREATE TABLE Clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    ativo INT DEFAULT(1)
);

-- Tabela Pedidos
CREATE TABLE Pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT NOT NULL,
    valor_total FLOAT NOT NULL,
    pagamento_id INT DEFAULT NULL, -- É uma FK "falsa"
    FOREIGN KEY (cliente_id) REFERENCES Clientes(id)
);

-- Tabela Pagamentos
CREATE TABLE Pagamentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT,
    valor FLOAT NOT NULL,
    concluido INT DEFAULT 0,
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(id)
);

-- Tabela Produtos
CREATE TABLE Produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    ativo INT DEFAULT(1)
);

-- Tabela Categorias
CREATE TABLE Categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    ativo INT DEFAULT(1)
);

-- Tabela Produtos_Categorias (para relacionamento N:N entre Produtos e Categorias)
CREATE TABLE Produtos_Categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    produto_id INT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES Produtos(id),
    FOREIGN KEY (categoria_id) REFERENCES Categorias(id)
);

-- Tabela Pedidos_Produtos (para relacionamento N:N entre Pedidos e Produtos)
CREATE TABLE Pedidos_Produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES Produtos(id)
);