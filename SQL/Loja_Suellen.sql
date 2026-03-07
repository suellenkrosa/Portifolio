CREATE DATABASE loja;
USE loja;

CREATE TABLE CLIENTE(
	id int(4) NOT NULL AUTO_INCREMENT,
	nome varchar(20) NOT NULL,
	apelido varchar(20) NOT NULL,
	NIF int(9) NOT NULL,
	NISS bigint(11) NOT NULL,
    	PRIMARY KEY (id),
	UNIQUE (NIF),
	UNIQUE (NISS)
);

CREATE TABLE produto(
	ref varchar(4) NOT NULL,
	nome varchar(20) NOT NULL,
	preco float NOT NULL,
    	PRIMARY KEY (ref)
);

create table fatura(
	numfatura bigint NOT NULL AUTO_INCREMENT,
	data date NOT NULL,
	id_cliente_FK int(4) NOT NULL,
	PRIMARY KEY (numfatura),
	FOREIGN KEY (id_cliente_FK) REFERENCES cliente(id)
);

CREATE TABLE linhaFatura(
	id bigint NOT NULL AUTO_INCREMENT,
	quantidade int(4) NOT NULL,
	numfatura_fk bigint NOT NULL,
	ref_fk varchar(4) NOT NULL,
	FOREIGN KEY (numfatura_fk) REFERENCES fatura(numfatura),
	FOREIGN KEY (ref_fk) REFERENCES produto(ref),
	PRIMARY KEY (id)
);