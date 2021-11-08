DROP TABLE IF EXISTS Spacegear_Schedule;
CREATE TABLE Spacegear_Schedule(
    Customer varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Part_Number varchar(50),
    Status varchar(50),
    Revision varchar(50),
    QtyLeft text
);

LOAD DATA INFILE "SpaceGear_Schedule.csv"
INTO TABLE Spacegear_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM Spacegear_Schedule
WHERE Job_Number = "";

alter table Spacegear_Schedule
add Thumbnail text;

UPDATE Spacegear_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE Spacegear_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE SpaceGear_Schedule
SET Customer = replace(Customer,".","");