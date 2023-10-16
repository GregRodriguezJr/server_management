SELECT vendor_name, 
	SUM(payment_total) AS payment_total_sum
FROM invoices JOIN vendors
  ON invoices.vendor_id = vendors.vendor_id
GROUP BY vendor_name
ORDER BY payment_total_sum DESC