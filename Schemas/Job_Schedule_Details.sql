DROP TABLE IF EXISTS Job_Schedule_Details
CREATE TABLE Job_Schedule_Details(
	Technician text,
	Job_number varchar(50),
	Due_Date varchar(50),
	Customer varchar(50),
	Part_number varchar(50),
	Part_Description varchar(MAX),
	Customer_PO varchar(50),
	Qty text,
	Value money,
	Profit money,
	Product_Code varchar(50),
	JSDID INT IDENTITY(1,1) PRIMARY KEY,
	Images varchar (max)
);