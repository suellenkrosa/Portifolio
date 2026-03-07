CREATE DATABASE empresa;
USE empresa;

CREATE TABLE empregado(
	empnum int(2) NOT NULL,
	nome char(50) NOT NULL,
	funcao char(20) NOT NULL,
	chefe int(2),
	data_adm datetime NOT NULL,
	salario real NOT NULL,
	comissao real,
	depnum int(2) NOT NULL,
	PRIMARY KEY(empnum)
);


INSERT INTO empregado(empnum, nome, funcao, chefe, data_adm, salario, comissao, depnum)
VALUES(89, 'Antunes', 'Admin', 35, '2001-10-10', 14000, null, 10),
(45, 'Pascoal', 'Vendedor', 35, '2000-05-14', 15000, 4000, 10),
(69, 'Silva', 'Admin', 35, '2000-12-04', 14000, null, 40),
(78, 'Rato', 'Vendedor', 35, '2002-11-09', 16000, 3000, 10),
(36, 'Santos', 'Vendedor', 39, '2001-08-25', 13000, 500, 40),
(35, 'Alves', 'Chefe', 79, '2000-06-03', 23000, null, 10),
(39, 'Monteiro', 'Chefe', 79, '2000-09-14', 23000, null, 40),
(85, 'Farias', 'Analista', 35, '2002-12-12', 20000, null, 10),
(79, 'Xavier', 'Presidente', null, '2000-06-01', 40000, null, 10),
(30, 'Brito', 'Vendedor', 39, '2002-03-02', 14000, 6000, 40),
(12, 'Ribeiro', 'Vendedor', 98, '2000-07-16', 15000, 3000, 30),
(18, 'Barros', 'Analista', 98, '2000-03-12', 20000, null, 30),
(46, 'Souto', 'Vendedor', 33, '2001-05-04', 15000, 2000, 20),
(32, 'Rafael', 'Admin', 98, '2000-11-26', 13000, null, 30),
(98, 'Neto', 'Chefe', 79, '2000-11-28', 23000, null, 30),
(77, 'Moura', 'Analista', 33, '2000-08-03', 20000, null, 20),
(21, 'Pires', 'Admin', 33, '2000-09-18', 14000, null, 20),
(14, 'Lima', 'Admin', 33, '2002-05-23', 14000, null, 20),
(33, 'Barroso', 'Chefe', 79, '2000-02-24', 20000, null, 20);

1) a) O Presidente passou a ganhar uma comissão de 1000 €.
UPDATE empregado 
SET comissao = 1000
WHERE empnum = 79;

b) Os Vendedores com uma comissão inferior a 2000 € passam a ganhar mais 300 €.
UPDATE empregado 
SET salario = salario + 300
WHERE funcao LIKE 'vendedor' AND comissao < 2000 ;

c) O empregado Lima agora tem a função de Analista e passou a trabalhar no
departamento 40. Agora o seu chefe é o chefe do departamento 40.
UPDATE empregado 
SET funcao = 'analista', 
    depnum = 40, 
    chefe = 39
Where empnum = 14;

d)Todos os Chefes passaram a ganhar mais 200 € de salário.
UPDATE empregado
SET salario = salario + 200
WHERE funcao LIKE 'chefe';

2) a) Liste os números de todos os empregados, os seus nomes e números dos seus
chefes.
SELECT empnum, nome, chefe
FROM empregado

b) Considerando que o salário é o salário anual, liste o salário mensal de cada
empregado.
SELECT empnum, nome, salario, salario AS salario_anual, ROUND(salario/12, 2) AS salario_mensal
FROM empregado

c) Liste os departamentos existentes na empresa.
SELECT DISTINCT depnum
FROM empregado
ORDER BY depnum

d) Liste os nomes, função e salário anual dos empregados da empresa, ordenados
alfabeticamente por nome.
SELECT nome, funcao, salario AS salario_anual
FROM empregado
ORDER BY nome

e) Liste todos empregados (numero, nome, função e numero de departamento) de todos
os Administrativos.
SELECT empnum, nome, funcao, depnum
FROM empregado
WHERE funcao LIKE 'Admin%'

f) Liste os empregados cujo salário anual é maior do que 20 000 €.
SELECT empnum, nome, funcao, salario AS salario_anual
FROM empregado
WHERE salario > 20000

g) Liste os empregados cujo salário está entre 15000 e 20 000 €.
SELECT empnum, nome, funcao, salario AS salario_anual
FROM empregado
WHERE salario BETWEEN 15000 AND 20000
ORDER BY salario ASC

h) Liste os empregados que sejam chefiados pelo no 33 e pelo no 39.
SELECT empnum, nome, funcao, chefe
FROM empregado
WHERE chefe = 33 OR chefe = 39
ORDER BY chefe ASC

i) Liste todos os vendedores com salário maior que 16 000 €.
SELECT empnum, nome, funcao, salario AS salario_anual
FROM empregado
WHERE funcao LIKE 'Vendedor%' AND salario > 16000

j) Listar, para todos os empregados, o seu salario mais comissões.
SELECT empnum, nome, salario AS salario_anual, salario + IFNULL(comissao, 0), comissao AS salario_mais_comissao
FROM empregado
