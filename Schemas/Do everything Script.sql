DROP TABLE IF EXISTS Job_Schedule;
CREATE TABLE Job_Schedule(
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
INTO TABLE job_schedule
FIELDS TERMINATED BY ","
ENCLOSED BY '"'
LINES TERMINATED BY "\n"
IGNORE 1 ROWS;

DELETE FROM job_schedule WHERE Technician = "Page -1 of 1";

alter table job_schedule
add JSDID INT PRIMARY KEY auto_increment primary KEY;

alter table job_schedule
add Thumbnail text;

UPDATE Job_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Job_Schedule
SET Customer = replace(Customer,".","");

UPDATE Job_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE job_schedule 
SET Thumbnail = "Big Steel Rack logo.png" 
WHERE Product_Code = "BSR\r";

UPDATE job_schedule 
SET Thumbnail = "Tooling.png" 
WHERE Product_Code = "TL\r";

UPDATE job_schedule 
SET Thumbnail = "Setup.png" 
WHERE Product_Code = "SU\r";

UPDATE job_schedule 
SET Thumbnail = "Pit Products.png" 
WHERE Product_Code = "PITPRODUCTS\r";

UPDATE job_schedule 
SET Thumbnail = "Engineering.png" 
WHERE Product_Code = "ENG\r";

UPDATE job_schedule 
SET Thumbnail = "Fixture.png" 
WHERE Product_Code = "FIXT\r";

UPDATE job_schedule 
SET Thumbnail = "Hardware.png" 
WHERE Product_Code = "HW\r";