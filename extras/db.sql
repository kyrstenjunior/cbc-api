-- Execute esse comando no seu banco de dados para a criação das tabelas
USE TESTECBC;

DROP TABLE IF EXISTS recurso, clube;

CREATE TABLE recurso (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    recurso VARCHAR(100) NOT NULL,
    saldo_disponivel DECIMAL(10,2) NOT NULL
);

CREATE TABLE clube (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    clube VARCHAR(100) NOT NULL,
    saldo_disponivel DECIMAL(10,2) NOT NULL
);

INSERT INTO recurso (id, recurso, saldo_disponivel) VALUES (null, "Recurso para passagens", 10000);
INSERT INTO recurso (id, recurso, saldo_disponivel) VALUES (null, "Recurso para hospedagens", 10000);