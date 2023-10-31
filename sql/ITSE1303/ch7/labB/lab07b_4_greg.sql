SELECT subquery.email_address, 
    MAX(subquery.order_total) AS largest_order
FROM (SELECT c.email_address, oi.order_id,
            SUM((oi.item_price - oi.discount_amount) * oi.quantity) AS order_total
    FROM customers AS c
    JOIN orders AS o 
        ON c.customer_id = o.customer_id
    JOIN order_items AS oi 
        ON o.order_id = oi.order_id
    GROUP BY c.email_address, oi.order_id) AS subquery
GROUP BY subquery.email_address
ORDER BY largest_order DESC;