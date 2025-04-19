CREATE DATABASE sistema;

USE sistema;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  senha VARCHAR(100)
);

INSERT INTO usuarios (nome, email, senha)
VALUES ('Admin', 'admin@email.com', ('123456'));