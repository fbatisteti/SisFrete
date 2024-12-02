/*
Escreva uma consulta que retorne o total de pedidos e a receita de cada cliente no último ano.
*/

SELECT 
    c.id AS cliente_id,
    c.nome AS cliente_nome,
    IF(COUNT(p.id) IS NULL, 0, COUNT(p.id)) AS num_pedidos,
    IF(SUM(p.valor_total) IS NULL, 0, SUM(p.valor_total)) AS valor_pedidos,
    IF(SUM(pg.valor) IS NULL, 0, SUM(pg.valor)) AS valor_pago
FROM 
    clientes c
LEFT JOIN 
    pedidos p ON p.cliente_id = c.id
LEFT JOIN 
    pagamentos pg ON pg.pedido_id = p.id
WHERE 
    p.created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR)
    OR p.created_at IS NULL -- esta linha é opcional, pois mostrará também os clientes que não tiveram pedidos
GROUP BY 
    c.id, c.nome;

-- Para melhorar a performance, ao custo de uma visuaização mais clara, eu removeria as funções IF.
-- Acredito que ela em si já está clara e bem otimizada.

/*
Crie uma consulta que mostre os produtos mais vendidos por categoria.
*/

SELECT
	*
FROM (
    SELECT 
        c.descricao AS categoria,
        p.descricao AS produto,
        SUM(pp.quantidade) AS quantidade_vendida
    FROM 
        categorias c
    JOIN 
        produtos_categorias pc ON c.id = pc.categoria_id
    JOIN 
        produtos p ON pc.produto_id = p.id
    JOIN 
        pedidos_produtos pp ON p.id = pp.produto_id
    GROUP BY 
        c.descricao, p.descricao
    ORDER BY 
	    c.descricao
    ) x
GROUP BY categoria;

-- Nesta eu usei uma sub-query, o que não é muito recomendado para fins de performance.
-- Porém, esta sub-query não poderia ser substituída por uma view (o que traria um pouco mais de performance).
