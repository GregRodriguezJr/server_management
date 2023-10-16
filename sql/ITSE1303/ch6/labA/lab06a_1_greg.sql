SELECT vendor_id,
	SUM(invoice_total)
FROM invoices
GROUP BY vendor_id;