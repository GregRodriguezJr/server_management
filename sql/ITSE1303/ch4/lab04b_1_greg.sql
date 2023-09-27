SELECT category_name, product_name, list_price
FROM categories INNER JOIN products
	ON categories.category_id = products.category_id
ORDER BY category_name ASC, product_name ASC; 