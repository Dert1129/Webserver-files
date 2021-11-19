DROP TABLE IF EXISTS Stamping_Schedule;
CREATE TABLE Stamping_Schedule(
    Technician varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Customer varchar(50),
    Part_Number varchar(50),
    Qty_To_Make varchar(50),
    Master_Job_Number varchar(50),
    Qty_Left text,
    Type varchar(50)
);

LOAD DATA INFILE "Stamping_Schedule.csv"
INTO TABLE Stamping_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Stamping_Schedule
WHERE Job_Number = "";

alter table Stamping_Schedule
add Thumbnail text;

UPDATE Stamping_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Stamping_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE Stamping_Schedule
SET Customer = replace(Customer,".","");