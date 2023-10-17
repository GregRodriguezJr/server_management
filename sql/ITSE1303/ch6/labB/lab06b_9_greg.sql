SELECT oi.order_id,
    ((oi.item_price - oi.discount_amount) * oi.quantity) AS order_item_total,
    SUM((oi.item_price - oi.discount_amount) * oi.quantity) OVER (PARTITION BY oi.order_id) AS order_total
FROM order_items AS oi
ORDER BY oi.order_id ASC;