DROP TABLE IF EXISTS Job_Schedule
CREATE TABLE Job_Schedule(
	Technician varchar(50),
	Job_number varchar(50),
	Due_Date DateTime(50),
	Customer varchar(50),
	Part_Number varchar(50),
	Part_Description varchar(MAX),
	Customer_PO varchar(50),
	Qty text,
	[$] varchar(50),
	Value varchar(50),
	Product_Code varchar(50),
	JSDID INT IDENTITY(1,1) PRIMARY KEY,
	Thumbnail varbinary(MAX),
	Year varchar(50)
);