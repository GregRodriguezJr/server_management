SELECT COUNT(*) AS product_count
FROM products
WHERE categoryID = (
    SELECT categoryID
    FROM categories
    WHERE categoryName = 'Guitars'
);