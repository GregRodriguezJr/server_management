SELECT c.email_address,
    SUM(oi.item_price * oi.quantity) AS item_price_sum,
    SUM(oi.discount_amount * oi.quantity) AS discount_amount_sum
FROM customers AS c
JOIN orders AS o
    ON c.customer_id = o.customer_id
JOIN order_items AS oi
    ON o.order_id = oi.order_id
GROUP BY c.email_address
ORDER BY item_price_sum DESC;