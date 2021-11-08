DROP TABLE IF EXISTS Tooling_Parts_Schedule;
CREATE TABLE Tooling_Parts_Schedule(
    Customer varchar(50),
	Job_number varchar(50),
	Due_Date date,
    Part_Number varchar(50),
	Qty_Ordered int,
	Qty_Open int,
	Done int,
	Work_Center varchar(50)
);

LOAD DATA INFILE "Tooling_Parts_Schedule.csv"
INTO TABLE Tooling_Parts_Schedule
FIELDS TERMINATED BY ","
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Tooling_Parts_Schedule
WHERE Job_Number = "";

alter table Tooling_Parts_Schedule
add Thumbnail text;

UPDATE Tooling_Parts_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Tooling_Parts_Schedule
SET Thumbnail = "Tooling.png"
WHERE Thumbnail IS NULL;

UPDATE Tooling_Parts_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Tooling_Parts_Schedule
SET Customer = replace(Customer,".","");