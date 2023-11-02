SELECT date_added,
    CAST(date_added AS DATE) AS date_added_date,
    DATE_FORMAT(date_added, '%Y-%m') AS date_added_year_month,
    CAST(date_added AS TIME) AS date_added_time
FROM Products;