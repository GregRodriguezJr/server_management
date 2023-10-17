SELECT
    COUNT(order_id) AS number_of_orders,
    SUM(tax_amount) AS tax_amount_sum
FROM orders;