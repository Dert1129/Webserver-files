DROP TABLE IF EXISTS Tooling_Schedule;
CREATE TABLE Tooling_Schedule(
    Customer varchar(50),
	Job_number varchar(50),
	Due_Date date,
	Part_Number varchar(50),
	Qty_To_Stock text,
	Design_Complete varchar(50),
	Work_Center varchar(50)
);

LOAD DATA INFILE "Tooling_TLs_Schedule.csv"
INTO TABLE Tooling_Schedule
FIELDS TERMINATED BY ","
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

alter table Tooling_Schedule
add Thumbnail text;

DELETE FROM Tooling_Schedule
WHERE Job_Number = "";

UPDATE Tooling_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Tooling_Schedule
SET Thumbnail = "Tooling.png"
WHERE Thumbnail IS NULL;

UPDATE Tooling_Schedule
SET Customer = replace(Customer,".","");