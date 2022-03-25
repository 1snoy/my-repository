use InternetShop_Аристов_Роман
go
create view Listoforders
as
select Products.Name,Customers.FirstName+' '+Customers.LastName as 'ФИО',Orders.Date_Order,Orders.Status_Order,Orders.Date_Delivery,Orders.Cost_Delivery,Orders.Full_Cost,Orders.Comment from Orders inner join Products on Orders.ID=Products.ID inner join Customers on Orders.Customer_ID=Customers.ID

create view orders_awaiting_delivery
as
select * from Orders where Status_Order=3

create view orderthismonth
as
select * from Orders where month(Orders.Date_Order)=MONTH(GETDATE())

create view out_of_stock
as
select*from Products where Amountproductsonsklad=0

create view cust
as
select*from Customers