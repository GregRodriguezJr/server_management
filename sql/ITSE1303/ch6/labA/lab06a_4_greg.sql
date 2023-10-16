SELECT account_description,
	COUNT(*) AS line_item_amount_count,
    SUM(line_item_amount) AS line_item_amount_sum
FROM general_ledger_accounts gla JOIN invoice_line_items ili
	ON gla.account_number = ili.account_number
GROUP BY account_description
HAVING line_item_amount_count > 1
ORDER BY line_item_amount_sum DESC;