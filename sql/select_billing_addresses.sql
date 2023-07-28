SELECT 
    c.firstName, 
    c.lastName, 
    a.line1, 
    a.line2, 
    a.city, 
    a.state, 
    a.zipCode
FROM 
    customers c
JOIN 
    addresses a ON c.billingAddressID = a.addressID
WHERE 
    c.lastName = 'sherwood';