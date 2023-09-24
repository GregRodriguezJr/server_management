SELECT 
    v1.vendor_id,
    v1.vendor_name,
    CONCAT(v1.vendor_contact_first_name,
            ' ',
            v1.vendor_contact_last_name) AS contact_name
FROM
    Vendors v1
        INNER JOIN
    Vendors v2 ON v1.vendor_contact_last_name = v2.vendor_contact_last_name
        AND v1.vendor_id <> v2.vendor_id
ORDER BY v1.vendor_contact_last_name;