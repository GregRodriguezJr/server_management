SELECT c.email_address,
    COUNT(DISTINCT o.order_id) AS number_of_orders,
    SUM((oi.item_price - oi.discount_amount) * oi.quantity) AS total_amount
FROM customers AS c
JOIN orders AS o
    ON c.customer_id = o.customer_id
JOIN order_items AS oi
    ON o.order_id = oi.order_id
WHERE oi.item_price > 400
GROUP BY c.email_address
HAVING number_of_orders > 1
ORDER BY total_amount DESC;