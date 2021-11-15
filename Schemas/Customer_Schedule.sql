DROP TABLE IF EXISTS Customer_Job_Schedule;
CREATE TABLE Customer_Job_Schedule(
	Technician varchar(50),
	Job_number varchar(50),
	Due_Date date,
	Customer varchar(50),
	Part_Number varchar(50),
	Part_Description text,
	Customer_PO varchar(50),
	Qty text,
	$ varchar(50),
	Value varchar(50),
	Product_Code varchar(50)
);

LOAD DATA INFILE "Job Schedule Details.csv"
INTO TABLE Customer_Job_Schedule
FIELDS TERMINATED BY ","
ENCLOSED BY '"'
LINES TERMINATED BY "\n"
IGNORE 1 ROWS;

DELETE FROM Customer_Job_Schedule WHERE Technician = "Page -1 of 1";

alter table Customer_Job_Schedule
add JSDID INT PRIMARY KEY auto_increment primary KEY;

alter table Customer_Job_Schedule
add Thumbnail text;

UPDATE Customer_Job_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Customer_Job_Schedule
SET Customer = replace(Customer,".","");

UPDATE Customer_Job_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Big Steel Rack logo.png" 
WHERE Product_Code = "BSR\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Tooling.png" 
WHERE Product_Code = "TL\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Setup.png" 
WHERE Product_Code = "SU\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Pit Products.png" 
WHERE Product_Code = "PITPRODUCTS\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Engineering.png" 
WHERE Product_Code = "ENG\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Fixture.png" 
WHERE Product_Code = "FIXT\r";

UPDATE Customer_Job_Schedule 
SET Thumbnail = "Hardware.png" 
WHERE Product_Code = "HW\r";