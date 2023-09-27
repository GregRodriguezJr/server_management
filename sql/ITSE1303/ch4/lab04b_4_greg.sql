SELECT last_name, first_name, order_date, product_name, 
	item_price, discount_amount, quantity
FROM customers c
	JOIN orders o
		ON c.customer_id = o.customer_id
	JOIN order_items i
		ON o.order_id = i.order_id
	JOIN products p
		ON i.product_id = p.product_id
ORDER BY last_name, order_date, product_name;