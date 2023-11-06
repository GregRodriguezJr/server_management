SELECT invoice_total,
	ROUND(invoice_total, 1) AS total_round_one_digit,
    ROUND(invoice_total, 0) AS total_round_no_decimal,
    TRUNCATE(invoice_total, 0) AS total_truncated
FROM invoices;