CREATE DATABASE iefpnet;
USE iefpnet;

CREATE TABLE utilizador(
num_util int(8) NOT NULL AUTO_INCREMENT,
pNome varchar(30) NOT NULL,
apelido varchar(30) NOT NULL,
data_nasc date NOT NULL,
localidade varchar(50) NOT NULL,
telefone int(9) NOT NULL,
email varchar(50) NOT NULL,
nickname varchar(50) NOT NULL,
password varchar(30) NOT NULL,
PRIMARY KEY (num_util),
UNIQUE (email),
UNIQUE (nickname),
UNIQUE (telefone)
);

CREATE TABLE tipo_publicacao(
id int(1) NOT NULL AUTO_INCREMENT,
nome varchar(15) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE publicacao(
id int(10) NOT NULL AUTO_INCREMENT,
data date NOT NULL,
hora time NOT NULL,
cont_publi varchar(2000) NOT NULL,
num_util_fk int(8) NOT NULL,
id_fk int(1) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (num_util_fk) REFERENCES utilizador(num_util),
FOREIGN KEY (id_fk) REFERENCES tipo_publicacao(id)
);