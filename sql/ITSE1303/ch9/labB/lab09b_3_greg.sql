SELECT card_number,
    LENGTH(card_number) AS card_number_length,
    RIGHT(card_number, 4) AS last_four_digits,
    CASE
        WHEN LENGTH(card_number) = 16 THEN
            CONCAT('XXXX-XXXX-XXXX-', RIGHT(card_number, 4))
        WHEN LENGTH(card_number) = 15 THEN
            CONCAT('XXXX-XXXXXX-X', RIGHT(card_number, 4))
    END AS formatted_card_number
FROM orders;