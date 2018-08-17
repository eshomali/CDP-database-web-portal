CREATE TABLE Products (
    productID int unsigned NOT NULL auto_increment UNIQUE,
    productType varchar(255) NOT NULL,
    PRIMARY KEY (productID)
);

INSERT INTO Products (productType) 
values
('E-Teller'),
('E-Manage'),
('E-Sign'),
('Thermal'),
('Laser'),
('Email Encryption, Hosted'),
('Email Encryption, Appliance'),
('Email Encryption, ZixMail'),
('Email Encryption, Virtru'),
('Spam Filer'),
('Email Hosting, Zix/Greenview'),
('Scanport'),
('Transport'),
('Web Forms'),
('Thermal Data Masking'),
('SigSales'),
('ScanID'),
('Avanian'),
('Calyptix');

select * from Products;