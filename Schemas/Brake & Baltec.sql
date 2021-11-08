DROP TABLE IF EXISTS Brake_Baltec_Schedule;
CREATE TABLE Brake_Baltec_Schedule(
    Technician varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Customer varchar(50),
    Part_Number varchar(50),
    Master_Job_Number varchar(50),
    Qty text
);

LOAD DATA INFILE "Brake_Baltec_Schedule.csv"
INTO TABLE Brake_Baltec_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Brake_Baltec_Schedule
WHERE Job_Number = "";

alter table Brake_Baltec_Schedule
add Thumbnail text;

UPDATE Brake_Baltec_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Brake_Baltec_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE Brake_Baltec_Schedule
SET Customer = replace(Customer,".","");