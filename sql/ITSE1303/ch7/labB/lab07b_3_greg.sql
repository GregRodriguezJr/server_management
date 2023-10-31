SELECT category_name
FROM categories c
WHERE NOT EXISTS (
    SELECT *
    FROM products p
    WHERE p.category_id = c.category_id
);