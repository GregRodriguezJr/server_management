USE ap;
SELECT vendor_name, vendor_contact_last_name, vendor_contact_first_name
FROM vendors
ORDER BY vendor_contact_last_name ASC, vendor_contact_first_name ASC;