SELECT email_address,
    SUBSTRING(email_address, 1, LOCATE('@', email_address) - 1) AS user_name,
    SUBSTRING(email_address, LOCATE('@', email_address) + 1) AS domain_name
FROM administrators
WHERE email_address REGEXP '^[A-Za-z]+@[A-Za-z.]+$';