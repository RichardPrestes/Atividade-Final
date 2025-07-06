-- Banco de dados: generico
DROP DATABASE IF EXISTS generico;
CREATE DATABASE generico;
USE generico;

-- Tabela PERFIS
CREATE TABLE perfis (
  idPerfil INT AUTO_INCREMENT PRIMARY KEY,
  nomePerfil VARCHAR(20) NOT NULL
);

INSERT INTO perfis (nomePerfil) VALUES
('cliente'),
('administrador');

-- Tabela USUARIOS
CREATE TABLE usuarios (
  idUsuario INT NOT NULL AUTO_INCREMENT,
  idPerfil INT NOT NULL,
  fotoUsuario VARCHAR(100) NOT NULL,
  nomeUsuario VARCHAR(50) NOT NULL,
  dataNascimentoUsuario DATE NOT NULL,
  cidadeUsuario VARCHAR(30) NOT NULL,
  telefoneUsuario VARCHAR(20) NOT NULL,
  emailUsuario VARCHAR(50) NOT NULL,
  senhaUsuario VARCHAR(100) NOT NULL,
  PRIMARY KEY (idUsuario),
  FOREIGN KEY (idPerfil) REFERENCES perfis(idPerfil)
);

INSERT INTO usuarios (idPerfil, fotoUsuario, nomeUsuario, dataNascimentoUsuario, cidadeUsuario, telefoneUsuario, emailUsuario, senhaUsuario) VALUES
(2, 'img/Classico_2D.webp', 'Sonic', '2025-04-05', 'telemacoBorba', '(42) 99999-9999', 'sonic@teste.com', MD5('123')),
(1, 'img/mario.png', 'Mario Mario', '2025-05-19', 'telemacoBorba', '(42) 99999-9999', 'mario@teste.com', MD5('123'));

-- Tabela PRODUTOS
CREATE TABLE produtos (
  idProduto INT NOT NULL AUTO_INCREMENT,
  fotoProduto VARCHAR(100) NOT NULL,
  nomeProduto VARCHAR(30) NOT NULL,
  descricaoProduto VARCHAR(200) NOT NULL,
  valorProduto DECIMAL(10,0) NOT NULL,
  statusProduto VARCHAR(10) NOT NULL,
  PRIMARY KEY (idProduto)
);

INSERT INTO produtos (fotoProduto, nomeProduto, descricaoProduto, valorProduto, statusProduto) VALUES
('img/xbox360.webp', 'Xbox 360', 'Console Microsoft Xbox 360 Slim', 300, 'disponivel'),
('img/tenisVans.jpg', 'Tênis Vans', 'Calçado Vans Old School Bla bla bla', 400, 'esgotado'),
('img/Fusca_Azul.jpeg', 'Fusca', 'VW Fusca Azul 1972', 20000, 'esgotado');

-- Tabela COMPRAS
CREATE TABLE compras (
  idCompra INT NOT NULL AUTO_INCREMENT,
  idUsuario INT DEFAULT NULL,
  idProduto INT DEFAULT NULL,
  dataCompra DATE DEFAULT NULL,
  horaCompra TIME DEFAULT NULL,
  valorCompra DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY (idCompra),
  FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
  FOREIGN KEY (idProduto) REFERENCES produtos(idProduto)
);

INSERT INTO compras (idUsuario, idProduto, dataCompra, horaCompra, valorCompra) VALUES
(2, 3, '2025-05-26', '21:25:35', 20000.00);
