SELECT list_price,
    FORMAT(list_price, 1) AS list_price_format,
    CONVERT(list_price, SIGNED) AS list_price_convert,
    CAST(list_price AS SIGNED) AS list_price_cast
FROM Products;