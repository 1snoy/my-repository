create trigger deleteprod
on Products
instead of delete
as
begin
DECLARE @A INT
SET @A = (select Products.Amountproductsonsklad from deleted
 inner join Orders_Products on deleted.ID=Orders_Products.Order_ID 
 inner join Products on Orders_Products.Product_ID=Products.ID 
 where deleted.ID=deleted.ID)
if(@A>0)
begin
RAISERROR('Completed deliveries cannot be deleted',0,1)
end
else
begin
DELETE Products WHERE Products.ID = @A
end
end