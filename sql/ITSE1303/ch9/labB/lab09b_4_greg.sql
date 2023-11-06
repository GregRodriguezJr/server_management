SELECT order_id,
    order_date,
    DATE_ADD(order_date, INTERVAL 2 DAY) AS approx_ship_date,
    ship_date,
    DATEDIFF(ship_date, order_date) AS days_to_ship
FROM orders
WHERE YEAR(order_date) = 2018 AND MONTH(order_date) = 3;