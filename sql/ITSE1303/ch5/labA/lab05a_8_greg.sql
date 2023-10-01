UPDATE invoices
SET terms_id = 2
WHERE vender_id IN
	(SELECT vendor_id
	FROM vendors
    WHERE default_terms_id = 2);