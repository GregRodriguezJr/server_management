SELECT order_date,
    DATE_FORMAT(order_date, '%Y') AS formatted_year,
    DATE_FORMAT(order_date, '%b-%d-%Y') AS formatted_date,
    DATE_FORMAT(order_date, '%h:%i %p') AS formatted_time,
    DATE_FORMAT(order_date, '%m/%d/%y %H:%i') AS formatted_datetime
FROM orders;