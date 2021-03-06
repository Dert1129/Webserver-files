DROP TABLE IF EXISTS Rolled_Shells_Schedule;
CREATE TABLE Rolled_Shells_Schedule(
    Technician varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Customer varchar(50),
    Part_Number varchar(50),
    Qty_To_Make varchar(50),
    Master_Job_Number varchar(50),
    Qty_Left varchar(50),
    Type varchar(50)
);

LOAD DATA INFILE "Rolled Shells_Schedule.csv"
INTO TABLE Rolled_Shells_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Rolled_Shells_Schedule WHERE Job_number = "";

alter table Rolled_Shells_Schedule
add Thumbnail text;

UPDATE Rolled_Shells_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Rolled_Shells_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE Rolled_Shells_Schedule
SET Customer = replace(Customer,".","");