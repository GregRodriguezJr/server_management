-- Exercise 17-2

DROP DATABASE IF EXISTS ap;
CREATE DATABASE ap;

USE ap;

CREATE TABLE vendors (
  vendorID INT PRIMARY KEY AUTO_INCREMENT,
  vendorName VARCHAR(45) NOT NULL,
  vendorAddress VARCHAR(45) NOT NULL,
  vendorCity VARCHAR(45) NOT NULL,
  vendorState VARCHAR(45) NOT NULL,
  vendorZipcode VARCHAR(10) NOT NULL,
  vendorPhone VARCHAR(20) NOT NULL
);

CREATE TABLE invoices (
  invoiceID INT PRIMARY KEY AUTO_INCREMENT,
  vendorID INT NOT NULL,
  invoiceNumber VARCHAR(45) UNIQUE NOT NULL,
  invoiceDate DATETIME NOT NULL,
  invoiceTotal DECIMAL NOT NULL,
  paymentTotal DECIMAL NOT NULL,
  FOREIGN KEY (vendorID) REFERENCES vendors(vendorID)
);

CREATE TABLE lineitems (
  lineItemID INT PRIMARY KEY AUTO_INCREMENT,
  invoiceID INT NOT NULL,
  description VARCHAR(45) NOT NULL,
  quantity INT NOT NULL,
  price INT NOT NULL,
  lineItemTotal DECIMAL NOT NULL,
  FOREIGN KEY (invoiceID) REFERENCES invoices(invoiceID)
);

DROP USER IF EXISTS 'ap_user'@'localhost';
CREATE USER 'ap_user'@'localhost' IDENTIFIED BY 'sesame';
GRANT SELECT, INSERT, UPDATE ON `ap`.* TO 'ap_user'@'localhost';