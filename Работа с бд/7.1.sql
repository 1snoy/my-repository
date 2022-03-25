use InternetShop_Аристов_Роман
go
CREATE TRIGGER newzakaz
ON Orders_Products
FOR INSERT
AS
DECLARE @A INT
DECLARE @B INT
SET @A = (SELECT inserted.Quantity
FROM inserted)
SET @B = (SELECT Products.Amountproductsonsklad FROM Products,inserted
 WHERE Products.ID=inserted.Product_ID)
 IF(@A > @B)
 BEGIN
 PRINT 'Невозможно добавить тк нет на складе'
ROLLBACK TRANSACTION
 END
Else
Begin
Update products
Set Amountproductsonsklad = Amountproductsonsklad - @A
Where Products.ID = inserted.Product_ID
end