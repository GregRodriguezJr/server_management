-- ch. 3 retrive data from a single table
-- query to get clients that live in Texas
SELECT
    CONCAT(client_first_name, client_last_name) Full_Name,
    client_address Address,
    client_city City,
    client_state State,
    client_zipcode Zip
FROM clients
WHERE client_state = 'Texas'
ORDER BY city;

-- ch. 4 retrive data from two or more tables
-- query to get clients with more than 10 years
SELECT
	a.account_id,
    c.client_last_name Last_Name,
    c.client_email Email,
    a.account_type Account_Type,
    DATE_FORMAT(a.account_date_opened, '%m-%d-%Y') Date_Opened
FROM clients c
JOIN accounts a ON c.client_id = a.client_id
WHERE a.account_date_opened <= DATE_SUB(CURDATE(), INTERVAL 10 YEAR)
ORDER BY a.account_date_opened;

-- ch.5 how to insert, update, and delete data
-- insert new client
INSERT INTO clients VALUES
(54,'123-93-2782', 'John', 'Doe', '1995-03-23', '257 Lake View Street', '555-215-1634', 'jd@gmail.com','Corpus Christi','Texas','78404', 'Doe Solutions LLC');

-- update existing client
UPDATE clients
SET email = 'johndoe@gmail.com'
WHERE client_id = 54;

-- delete existing client
DELETE FROM clients
WHERE client_id = 54;

-- ch.6 how to code summary queries
-- query to show total withdraw trasactions
SELECT 
	COUNT(transaction_id) AS withdraw_count,
    SUM(transaction_amount) AS total_withdraw_amount
FROM transactions
WHERE transaction_type = 'Withdraw';

-- ch.7 how to code subqueries
-- query to get all the positions of Teller
SELECT
    employee_id,
    employee_first_name,
    employee_last_name,
    employee_position,
    employee_email
FROM employees
WHERE employee_position IN (
    SELECT employee_position
    FROM employees
    WHERE employee_position = 'Bank Teller'
);

-- ch.8 how to work with data types
-- query to get all loans over 10k and formating date and loan amount
SELECT
    c.client_id,
    CONCAT(c.client_first_name," ", c.client_last_name) full_name,
    FORMAT(l.loan_amount, 0) AS loan_balance,
    DATE_FORMAT(l.date_issued, '%M-%d-%Y') AS date_issued
FROM clients c
JOIN accounts a ON c.client_id = a.client_id
JOIN loans l ON a.account_id = l.account_id
WHERE l.loan_amount > 10000
ORDER BY loan_balance DESC;

-- ch.9 how to use functions
SELECT UPPER(c.client_last_name) AS last_name,
    TRUNCATE(a.account_balance, 2) AS formatted_account_balance
FROM clients c
JOIN accounts a ON c.client_id = a.client_id;