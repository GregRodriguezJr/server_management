SELECT c.category_name,
    COUNT(p.product_id) AS product_count,
    MAX(p.list_price) AS most_expensive_price
FROM categories AS c
JOIN products AS p
	ON c.category_id = p.category_id
GROUP BY c.category_name
ORDER BY product_count DESC;