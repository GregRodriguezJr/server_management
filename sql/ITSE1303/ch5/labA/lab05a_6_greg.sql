UPDATE invoices
SET credit_total = invoice_total * .10,
	payment_total = invoice_total - credit_total  
WHERE invoice_id = 115;