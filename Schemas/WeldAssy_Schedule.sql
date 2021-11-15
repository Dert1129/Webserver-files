DROP TABLE IF EXISTS WeldAssy_Schedule;
CREATE TABLE WeldAssy_Schedule(
    Job_number varchar(50),
    Due_Date date,
    Customer varchar(50),
    Part_Number varchar(50),
    Part_Description text,
    QtyLeft text,
    Technician varchar(50)
);

LOAD DATA INFILE "WeldDept-JobsDueList.csv"
INTO TABLE WeldAssy_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n"
IGNORE 1 ROWS;

DELETE FROM WeldAssy_Schedule
WHERE Job_Number = "";

alter table WeldAssy_Schedule
add Thumbnail text;

DELETE FROM WeldAssy_Schedule
WHERE Job_Number = "";

UPDATE WeldAssy_Schedule
SET Part_Number = replace(Part_Number,"/","");

UPDATE WeldAssy_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

UPDATE WeldAssy_Schedule
SET Customer = replace(Customer,".","");