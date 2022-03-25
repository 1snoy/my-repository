create function BONUSprice(@a int)
returns float
as 
begin
declare @b float =(select(Products.Price*Customers.BONUS) from Orders inner join Orders_Products on Orders.ID=Orders_Products.Order_ID inner join Products on Orders_Products.Product_ID=Products.ID inner join Customers on Customers.ID=Orders.Customer_ID where Orders.ID=@a)
return @b
end

create function timebetweendeliverydateorder(@a int)
returns int
as
begin
declare @b int=(select ((DATEDIFF(MONTH,Orders.Date_Order,Orders.Date_Delivery)*30)+DATEDIFF(DAY,Orders.Date_Order,Orders.Date_Delivery)) as 's' from Orders where Orders.ID=@a)
return @b
end