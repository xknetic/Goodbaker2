 create database GoodBaker;
use GoodBaker;
drop database GoodBaker;

create table UserTable (
	userID INT PRIMARY KEY,
	userName varchar(50),
	password varchar(25),
	userRole varchar(25),
	userContact varchar(11),
	email varchar(50),
	);

create table SupplierTable (
	SupplierID INT PRIMARY KEY IDENTITY,
	SupplierName varchar(50),
	Address varchar(100),
	ContactNumber varchar(11)
	);

create table AreaTable (
	AreaID INT PRIMARY KEY,
	AreaName varchar(30)
	);

create table ProductPriceTable (
	Product INT REFERENCES ProductTable(ProductID),
	Area INT REFERENCES AreaTable(AreaID),
	Price float
	);

SELECT * FROM ProductPriceTable;

create table ProductTable (
	ProductID INT PRIMARY KEY IDENTITY,
	ProductCategory varchar(25),
	ProductName varchar(25),
	Unit varchar(25),
	Quantity INT,
	Amount float,
	CriticalLevel INT
	);

INSERT INTO ProductTable VALUES ('Cheese cupcake', '1pc', 15, 0, 10);

INSERT INTO ProductPriceTable VALUES (2, 1, 30);

create table PremixTable (
	PremixID INT PRIMARY KEY identity,
	PremixName varchar(25),
	Category varchar(25),
	Size varchar(25),
	Cost float
	);

create table RawMaterialTable (
	RawMaterialID INT PRIMARY KEY identity,
	RawMaterialName varchar(25),
	Container varchar(25),
	Unit varchar(25),
	Price float,
	Quantity INT,
	SupplierID INT REFERENCES SupplierTable(SupplierID) 
	);

create table ProductIngredientRawMaterialTable (
	ProductIngredientRawMaterialID INT PRIMARY KEY identity,
	Quantity INT,
	Product INT REFERENCES ProductTable(ProductID),
	RawMaterial INT REFERENCES RawMaterialTable(RawMaterialID)
	);

create table ProductIngredientPremixTable (
	ProductIngredientPremixID INT PRIMARY KEY identity,
	Quantity INT,
	Product INT REFERENCES ProductTable(ProductID),
	Premix INT REFERENCES PremixTable(PremixID)
	);

create table PremixIngredientTable (
	PremixIngredientID INT PRIMARY KEY identity,
	Quantity INT,
	Premix INT REFERENCES PremixTable(PremixID),
	RawMaterial INT REFERENCES RawMaterialTable(RawMaterialID)
	);

create table PurchaseOrderTable (
	PurchaseOrderID INT PRIMARY KEY,
	PurchaseDate Datetime,
	SupplierName INT REFERENCES SupplierTable(SupplierID)
	);

create table PurchaseItemTable (
	PurchaseOrderID INT REFERENCES PurchaseOrderTable(PurchaseOrderID),
	RawMaterial INT REFERENCES RawMaterialTable(RawMaterialID),
	Quantity INT
	);

create table DriverTable (
	DriverID INT PRIMARY KEY IDENTITY,
	DriverName varchar(30)
	);

create table TruckTable (
	TruckID INT PRIMARY KEY,
	PlateNumber varchar(7)
	);

create table DeliveryTable (
	DeliveryID INT PRIMARY KEY,
	Truck INT REFERENCES TruckTable(TruckID),
	TruckDriver INT REFERENCES DriverTable(DriverID),
	TruckAgent INT REFERENCES UserTable(UserID)
	);

insert into TruckTable values (1, 'nve1234', 1, 1);

create table TruckLoadTable (
	TruckLoadID INT PRIMARY KEY,
	LoadDate Datetime,
	Truck INT REFERENCES TruckTable(TruckID)
	);

create table TruckLoadItemTable (
	TruckLoadItemID INT PRIMARY KEY,
	TruckLoadID INT REFERENCES TruckLoadTable(TruckLoadID),
	Product INT REFERENCES ProductTable(ProductID),
	Quantity INT
	);

create table LoadInTable (
	LoadInID INT PRIMARY KEY,
	TruckLoadID INT REFERENCES TruckLoadTable(TruckLoadID),
	Product INT REFERENCES ProductTable(ProductID),
	Quantity INT
);

create table LoadOutTable (
	LoadOutID INT PRIMARY KEY,
	TruckLoadID INT REFERENCES TruckLoadTable(TruckLoadID),
	Product INT REFERENCES TruckLoadItemTable(TruckLoadItemID),
	Quantity INT
);

create table ClientTable (
	ClientID INT PRIMARY KEY,
	ClientName varchar(50),
	ClientAddress varchar(100),
	ClientContact INT
	);

create table SalesTable (
	SalesID INT PRIMARY KEY IDENTITY,
	SalesDate datetime,
	Client INT REFERENCES ClientTable(ClientID),
	Truck INT REFERENCES TruckTable(TruckID),
	UserName INT REFERENCES UserTable(UserID),
	SalesStatus varchar(15),
	);

INSERT INTO SalesTable VALUES ('12/09/2024 12:24', 1, 1, 1, 'Completed', 1);
INSERT INTO SalesTable VALUES ('12/09/2024 12:24', 1, 1, 1, 'Completed');
SELECT * FROM SalesTable, SalesItemTable;

create table SalesItemTable (
	SalesItemID INT PRIMARY KEY IDENTITY,
	SalesID INT REFERENCES SalesTable(SalesID) Null,
	Product INT REFERENCES ProductTable(ProductID),
	Quantity INT
	);

INSERT INTO SalesTable VALUES (1, 1, 15)
INSERT INTO SalesItemTable (Product, Quantity) VALUES  (2, 30)

SELECT * FROM SalesItemTable;
SELECT * FROM SalesTable;
drop table SalesItemTable;
truncate table SalesItemTable;
truncate table SalesTable;

INSERT INTO SalesItemTable VALUES (3, 1, 1, 3);



SELECT SUM(QUANTITY)
FROM SalesItemTable;

SELECT SUM(Price), SalesID
FROM SalesItemTable
LEFT JOIN ProductTable
ON Product=ProductID
LEFT JOIN ProductPriceTable
ON ProductID=ProductPriceTable.Product
WHERE Area = 1
GROUP BY SalesID;



SELECT SUM(QUANTITY)
FROM SalesItemTable;

create table BadOrderTable (
	BOID INT PRIMARY KEY,
	BOName varchar(25)
	);

create table ReturnTable (
	ReturnID INT PRIMARY KEY,
	BadOrder INT REFERENCES BadOrderTable(BOID),
	SalesID INT REFERENCES SalesTable(SalesID)
	);

create table ReturnItemTable (
	ReturnItemID INT PRIMARY KEY,
	SalesItemID INT REFERENCES SalesItemTable(SalesItemID),
	Quantity INT
);

create table DiscountTable (
	DiscountID INT PRIMARY KEY,
	DiscountName varchar(25),
	DiscountAmount INT
	);

create table BranchTable (
	BranchID INT PRIMARY KEY IDENTITY,
	BranchName varchar(25)
	);

create table TransferTable (
	TransferID INT PRIMARY KEY,
	TransferDate Datetime,
	Branch INT REFERENCES BranchTable(BranchID)
	);

create table TransferProductTable (
	TransferProductID INT PRIMARY KEY IDENTITY,
	Product INT REFERENCES ProductTable(ProductID),
	Quantity INT,
	TransferID INT REFERENCES TransferTable(TransferID)
	);

create table TransferPremixTable (
	TransferProductID INT PRIMARY KEY IDENTITY,
	Premix INT REFERENCES PremixTable(PremixID),
	Quantity INT,
	TransferID INT REFERENCES TransferTable(TransferID)
	);

create table TransferRawMaterialTable (
	TransferProductID INT PRIMARY KEY IDENTITY,
	RawMaterial INT REFERENCES RawMaterialTable(RawMaterialID),
	Quantity INT,
	TransferID INT REFERENCES TransferTable(TransferID)
	);

create table BranchProductTable (
	BranchProductID INT PRIMARY KEY identity,
	Category varchar(25),
	ProductName varchar(25),
	Unit varchar(25),
	Quantity INT,
	Price float,
	Branch INT REFERENCES BranchTable(BranchID)
	);

create table BranchPremixTable (
	BranchPremixID INT PRIMARY KEY identity,
	PremixName varchar(25),
	Category varchar(25),
	Size varchar(25),
	Cost float,
	Branch INT REFERENCES BranchTable(BranchID)
	);

create table BranchRawMaterialTable (
	BranchRawMaterialID INT PRIMARY KEY identity,
	RawMaterialName varchar(25),
	Container varchar(25),
	Unit varchar(25),
	Price float,
	Quantity INT,
	SupplierID INT REFERENCES SupplierTable(SupplierID),
	Branch INT REFERENCES BranchTable(BranchID)
	);


INSERT INTO ClientTable VALUES (1, 'a', '1', '0123');
SELECT * FROM ClientTable;

create table OrderTable (
	OrderID INT PRIMARY KEY,
	CustomerName varchar(60),
	CustomerAddress varchar(100),
	CustomerContact INT,
	OrderDate datetime
	);

create table OrderItemTable (
	OrderItemID INT PRIMARY KEY IDENTITY,
	OrderID INT REFERENCES OrderTable(OrderID),
	Product INT REFERENCES ProductTable(ProductID),
	Quantity INT
	);