CREATE TABLE Licenses (
	licID int unsigned not null auto_increment UNIQUE,
    cuID int unsigned not null,
    proID int unsigned not null,
    licenseChange int unsigned not null,
    DOC date, #date of change
    constraint licenses_ibfk_1 foreign key (cuID) references Credit_Union(cuID) on delete cascade,
    constraint licenses_ibfk_2 foreign key (proID) references Products(productID) on delete cascade,
    primary key(licID)
);