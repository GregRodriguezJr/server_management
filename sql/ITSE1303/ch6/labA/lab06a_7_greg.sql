SELECT vendor_name,
	COUNT(DISTINCT ili.account_number) AS number_of_gla_accounts
FROM vendors v 
	JOIN invoices i
		ON v.vendor_id = i.vendor_id
    JOIN invoice_line_items ili
		ON i.invoice_id = ili.invoice_id
GROUP BY vendor_name
HAVING number_of_gla_accounts > 1
ORDER BY vendor_name;  