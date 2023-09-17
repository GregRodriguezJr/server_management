USE ap;
SELECT
    invoice_due_date,
    invoice_total,
    (invoice_total * 0.10) AS "10% of Invoice Total",
    (invoice_total + (invoice_total * 0.10)) AS "Invoice Total Plus 10%"
FROM
    invoices
WHERE
    invoice_total >= 500 AND invoice_total <= 1000
ORDER BY
    invoice_due_date DESC;