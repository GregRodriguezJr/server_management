USE ap;
SELECT *
FROM vendors
INNER JOIN invoices ON vendors.vendor_id = invoices.vendor_id;