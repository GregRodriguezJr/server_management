SELECT account_description,
	COUNT(*) AS line_item_amount_count,
    SUM(line_item_amount) AS line_item_amount_sum
FROM general_ledger_accounts gla 
	JOIN invoice_line_items ili
		ON gla.account_number = ili.account_number
    JOIN invoices i
		ON ili.invoice_id = i.invoice_id
        WHERE i.invoice_date BETWEEN '2018-04-01' AND '2018-06-30'
GROUP BY account_description
HAVING line_item_amount_count > 1
ORDER BY line_item_amount_sum DESC;