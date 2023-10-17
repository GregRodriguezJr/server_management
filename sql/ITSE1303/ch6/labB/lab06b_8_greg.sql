SELECT
    IF(GROUPING(c.category_name) = 1, 'Total', c.category_name) AS category_name,
    IF(GROUPING(p.product_name) = 1, 'Category Total', p.product_name) AS product_name,
    SUM(oi.quantity) AS total_quantity_purchased
FROM categories AS c
JOIN products AS p
    ON c.category_id = p.category_id
JOIN order_items AS oi
    ON p.product_id = oi.product_id
GROUP BY c.category_name, p.product_name
WITH ROLLUP;