6.1. Listar os dados de todos os clientes, ordenando-os por ordem alfabética (nome)
SELECT *
FROM cliente
ORDER BY nome;

6.2. Listar os clientes que têm um apelido começado por “V”
SELECT apelido
FROM cliente
WHERE apelido LIKE 'V%';

6.3. Listar todos os produtos com preço superior a 10€
SELECT *
FROM produto
WHERE preco > 10;

6.4. Obter o preço médio dos produtos
SELECT ROUND(AVG(preco),2) AS Preco_Médio
FROM produto;

6.5. Consultar o número total de faturas emitidas
SELECT COUNT(numfatura) AS Total_Faturas
FROM fatura;

6.6. Listar os clientes que compraram “Incógnito Tinto”
SELECT c.nome, c.apelido, SUM(lf.quantidade) AS Quantidade_comprada
FROM cliente c, fatura f, linhafatura lf, produto p
WHERE p.nome like 'Incógnito Tinto'
AND c.id = f.id_cliente_fk
AND f.numfatura = lf.numfatura_fk
AND lf.ref_fk = p.ref
GROUP BY c.nome, c.apelido;

6.7. Calcular o total gasto por cada cliente
SELECT c.nome, c.apelido, ROUND(SUM(p.preco*lf.quantidade),2) AS Total_Faturado
FROM cliente c, fatura f, linhafatura lf, produto p
WHERE c.id = f.id_cliente_fk
AND f.numfatura = lf.numfatura_fk
AND lf.ref_fk = p.ref
GROUP BY c.nome, c.apelido;

6.8. Listar a quantidade (total) vendida de cada produto
SELECT p.ref, SUM(lf.quantidade) AS Quantidade, lf.quantidade AS Total_por_produto
FROM linhafatura lf, produto p, fatura f
WHERE f.numfatura = lf.numfatura_fk
AND lf.ref_fk = p.ref
GROUP BY P.nome;

6.9. Mostrar o total faturado em cada dia
SELECT f.data AS data, ROUND(SUM(p.preco*lf.quantidade),2) AS Quantidade, lf.quantidade AS Total_por_produto
FROM linhafatura lf, produto p, fatura f
WHERE f.numfatura = lf.numfatura_fk
AND lf.ref_fk = p.ref
AND p.ref = lf.ref_fk
GROUP BY f.data
ORDER BY f.data;