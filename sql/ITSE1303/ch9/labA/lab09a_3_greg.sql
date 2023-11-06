SELECT vendor_name,
	UPPER(vendor_name) AS upper_case,
    vendor_phone,
    RIGHT(vendor_phone, 4) AS last_four,
    REPLACE(REPLACE(REPLACE(vendor_phone,'(', ''), ')', '.'),'-', '.') AS number_dots,
	IF(LOCATE(' ', vendor_name) = 0,
        '',
		IF(LOCATE(' ', vendor_name, LOCATE(' ', vendor_name) + 1) = 0,
			SUBSTRING(vendor_name, LOCATE(' ', vendor_name) + 1),
			SUBSTRING(vendor_name,
				LOCATE(' ', vendor_name) + 1,
                LOCATE(' ', vendor_name, LOCATE(' ', vendor_name) + 1) - LOCATE(' ', vendor_name))))
    AS second_word
FROM vendors;