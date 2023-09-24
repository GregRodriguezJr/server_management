-- Exercise 17-1

ALTER TABLE customers
ADD COLUMN middleInitials VARCHAR(3) NULL AFTER firstName;

ALTER TABLE customers
MODIFY COLUMN lastName VARCHAR(100);