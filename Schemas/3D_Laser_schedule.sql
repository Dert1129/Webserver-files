DROP TABLE IF EXISTS 3D_Laser_Schedule;
CREATE TABLE 3D_Laser_Schedule(
    Customer varchar(50),
    Job_number varchar(50),
    Due_Date date,
    Part_Number varchar(50),
    Status varchar(50),
    Revision varchar(50),
    QtyLeft text
);

LOAD DATA INFILE "SpaceGear_Schedule.csv"
INTO TABLE 3D_Laser_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n";

DELETE FROM 3D_Laser_Schedule
WHERE Job_Number = "";

alter table 3D_Laser_Schedule
add Thumbnail text;

UPDATE 3D_Laser_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE 3D_Laser_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE 3D_Laser_Schedule
SET Customer = replace(Customer,".","");