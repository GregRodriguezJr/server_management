SELECT invoice_date, 
       CAST(invoice_date AS DATETIME) AS invoice_cast_datetime, 
       CAST(invoice_date AS CHAR(7)) AS invoice_cast_char7
FROM invoices