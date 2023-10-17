SELECT p.product_name,
    SUM((oi.item_price - oi.discount_amount) * oi.quantity) AS total_amount
FROM products AS p
JOIN order_items AS oi
    ON p.product_id = oi.product_id
GROUP BY p.product_name
WITH ROLLUP;