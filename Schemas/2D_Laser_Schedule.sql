DROP TABLE IF EXISTS 2D_Laser_Schedule;
CREATE TABLE 2D_Laser_Schedule(
    Customer varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Part_Number varchar(50),
    Revision varchar(50),
    Open varchar(50),
    Original varchar(50),
    BOM varchar(50)
);

LOAD DATA INFILE "2D_Laser_Schedule.csv"
INTO TABLE 2D_Laser_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM 2D_Laser_Schedule
WHERE Job_Number = "";

alter table 2D_Laser_Schedule
add Thumbnail text;

UPDATE 2D_Laser_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE 2D_Laser_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE 2D_Laser_Schedule
SET Customer = replace(Customer,".","");