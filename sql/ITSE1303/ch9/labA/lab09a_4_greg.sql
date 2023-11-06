SELECT invoice_number,
	invoice_date,
    DATE_ADD(invoice_date, INTERVAL 30 DAY) AS plus_30,
    payment_date,
	DATEDIFF(payment_date, invoice_date) AS days_to_pay,
	MONTH(invoice_date) AS "month",
	YEAR(invoice_date) AS "year"
FROM invoices
WHERE invoice_date > '2018-04-30' AND invoice_date < '2018-06-01';