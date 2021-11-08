DROP TABLE IF EXISTS Tube_Bender_Schedule;
CREATE TABLE Tube_Bender_Schedule(
    Job_number varchar(50),
    Due_Date date,
    Customer varchar(50),
    Part_Number varchar(50),
    Status varchar(50),
    Master_Job_Number varchar(50),
    Qty text,
    Technician varchar(50)
);

LOAD DATA INFILE "Bender_Schedule.csv"
INTO TABLE Tube_Bender_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Tube_Bender_Schedule WHERE Due_Date = "";

alter table Tube_Bender_Schedule
add Thumbnail text;

DELETE FROM Tube_Bender_Schedule
WHERE Job_Number = "";

UPDATE Tube_Bender_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Tube_Bender_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE Tube_Bender_Schedule
SET Customer = replace(Customer,".","");