use InternetShop_Аристов_Роман
go

create procedure prodofcateg(@id int)
as
begin
select Products.* from Products inner join Product_Categories on Products.Category_ID=Product_Categories.ID
end
go

create procedure Lider
as
begin
select top 1 Product_Manufacturers.* from Product_Manufacturers inner join Products on Product_Manufacturers.ID=Products.Manufacturer_ID inner join Orders_Products on Products.ID=Orders_Products.Product_ID inner join Orders on Orders_Products.Order_ID=Orders.ID where Orders.Status_Order=5 group by Product_Manufacturers.Name,Product_Manufacturers.ID,(Orders_Products.Quantity)
end

create procedure maxprice
as
begin
select max(Products.Price) from Products
end

create procedure minprice
as
begin
select min(Products.Price) from Products
end

create procedure fulprice(@a float)
as
begin
select Products.Name,sum(Products.Price*Orders_Products.Quantity) from Products inner join Orders_Products on Products.ID=Orders_Products.Product_ID inner join Orders on Orders_Products.Order_ID=Orders.ID group by Products.Name
end
