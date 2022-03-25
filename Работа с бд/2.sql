use InternetShop_Аристов_Роман
go

create table Product_Manufacturers
(ID int not null,
Name nvarchar(255) not null,
constraint PK_ID_1 PRIMARY KEY (ID))
go

create table Product_Categories
(ID int not null,
Name nvarchar(255) not null,
constraint PK_ID_2 PRIMARY KEY (ID))
go

create table Products
(ID int not null,
Name nvarchar(255) not null,
Category_ID int not null,
Manufacturer_ID int not null,
Model nvarchar(255) not null,
Price float not null,
Garantiya int not null,
Opisanie nvarchar(255),
Amountproductsonsklad int not null,
foreign key (Category_ID)REFERENCES Product_Categories(ID),
foreign key (Manufacturer_ID)REFERENCES Product_Manufacturers(ID),
constraint PK_ID_3 PRIMARY KEY (ID),
constraint UC_Model UNIQUE (ID))
go

create table Customers
(ID int not null,
FirstName nvarchar(255) not null,
LastName nvarchar(255) not null,
Email nvarchar(255) not null,
Pass nvarchar(50) not null,
Adress_P nvarchar(255) not null,
Telefon nvarchar(11) not null,
Sex nvarchar(1) not null,
DateOfBirth datetime not null,
DateOfRegistration datetime not null default getdate(),
BONUS int not null default 0,
constraint PK_ID_4 PRIMARY KEY (ID),
constraint UC_Email UNIQUE (ID),
constraint UC_Telephone UNIQUE (ID),
constraint CHK_Pass CHECK (len(pass)>6),
constraint CHK_Sex CHECK (Sex in ('M','F')))
go

create table Orders
(ID int not null,
Customer_ID int not null,
Date_Order datetime not null default getdate(),
Status_Order int not null,
Date_Delivery datetime,
Cost_Delivery float,
Full_Cost float,
Comment nvarchar(255),
constraint PK_ID_5 PRIMARY KEY (ID),
foreign key (Customer_ID)REFERENCES Customers(ID),
constraint CHK_Status_Order CHECK (Status_Order>=1 and Status_Order<=5))
go

create table Orders_Products
(Order_ID int,
Product_ID int,
Quantity int not null,
Cost float,
foreign key (Product_ID)REFERENCES Products(ID),
foreign key (Order_ID)REFERENCES Orders(ID))
go
