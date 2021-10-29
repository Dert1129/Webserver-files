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
LINES TERMINATED BY "\r\n"
IGNORE 1 ROWS;

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
SET Customer = "Ada Metals"
WHERE Customer = "ADA Metal Products Inc";

UPDATE 2D_Laser_Schedule
SET Customer = 'Aeroparts'
WHERE Customer = 'AeroParts Manufacturing & Repair';

UPDATE 2D_Laser_Schedule
SET Customer = "Alabama Laser"
WHERE Customer = "Alabama Laser Systems";

UPDATE 2D_Laser_Schedule
SET Customer = 'Arvin Sango, Inc'
WHERE Customer = 'ARVIN SANGO, INC';

UPDATE 2D_Laser_Schedule
SET Customer = 'California Hydroforming'
WHERE Customer = 'CALIFORNIA HYDROFORMING CO INC';

UPDATE 2D_Laser_Schedule
SET Customer = "Cardington Yutaka"
WHERE Customer = "Cardington Yutaka Technologies";

UPDATE 2D_Laser_Schedule
SET Customer = "Carnegie Robotics"
WHERE Customer = "Carnegie Robotics, LLC";

UPDATE 2D_Laser_Schedule
SET Customer = 'Case NH'
WHERE Customer = 'CASE NEW HOLLAND';

UPDATE 2D_Laser_Schedule
SET Customer = 'Caterpillar'
WHERE Customer = 'CATERPILLAR INC.';

UPDATE 2D_Laser_Schedule
SET Customer = 'Chip Ganassi Racing'
WHERE Customer = 'CHIP GANASSI RACING';

UPDATE 2D_Laser_Schedule
SET Customer = 'Chrysler'
WHERE Customer = 'CHRYSLER COMPANY LLC';

UPDATE 2D_Laser_Schedule
SET Customer = 'Cobra Patterns & Models'
WHERE Customer = 'COBRA PATTERNS & MODELS INC';

UPDATE 2D_Laser_Schedule
SET Customer = 'ContiTech'
WHERE Customer = 'CONTITECH';

UPDATE 2D_Laser_Schedule
SET Customer = 'Cummins'
WHERE Customer = 'CUMMINS EMISSION SOLUTIONS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Depatie'
WHERE Customer = 'DEPATIE FLUID POWER COMPANY';

UPDATE 2D_Laser_Schedule
SET Customer = "Eaton"
WHERE Customer = "Eaton Corporation";

UPDATE 2D_Laser_Schedule
SET Customer = 'Eberspaecher'
WHERE Customer = 'EBERSPAECHER N.A.';

UPDATE 2D_Laser_Schedule
SET Customer = 'Electrolux'
WHERE Customer = 'Electro Lux';

UPDATE 2D_Laser_Schedule
SET Customer = 'Exhaust Systems'
WHERE Customer = 'EXHAUST SYSTEMS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Faurecia'
WHERE Customer = 'FAURECIA EMISSIONS CONTROL';

UPDATE 2D_Laser_Schedule
SET Customer = 'Ford'
WHERE Customer = 'FORD MOTOR COMPANY';

UPDATE 2D_Laser_Schedule
SET Customer = 'GMP Metal Products'
WHERE Customer = 'GMP METAL PRODUCTS';

UPDATE 2D_Laser_Schedule 
SET Customer = 'Hendrick Motorsports'
WHERE Customer = "HENDRICK MOTORSPORTS";

UPDATE 2D_Laser_Schedule 
SET Customer = "Hendrickson Int'l"
WHERE Customer = "Hendrickson International";

UPDATE 2D_Laser_Schedule
SET Customer = 'Honda'
WHERE Customer = 'HONDA R&D AMERICAS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Humanetics'
WHERE Customer = 'HUMANETICS INNOVATIVE SOLUTION';

UPDATE 2D_Laser_Schedule
SET Customer = 'Isuzu'
WHERE Customer = 'ISUZU MANUFACTURING SERVICES';

UPDATE 2D_Laser_Schedule
SET Customer = 'JAC Products'
WHERE Customer = 'JAC PRODUCTS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Jedco'
WHERE Customer = 'JEDCO, INC';

UPDATE 2D_Laser_Schedule
SET Customer = 'John Deere'
WHERE Customer = 'JOHN DEERE HARVESTER WORKS';

UPDATE 2D_Laser_Schedule
SET Customer = "Kellog"
WHERE Customer = "Kellogg's";

UPDATE 2D_Laser_Schedule
SET Customer = "Mack Trucks"
WHERE Customer = "Mack Trucks, Inc";

UPDATE 2D_Laser_Schedule
SET Customer = "Magneti"
WHERE Customer = "Magneti Marelli";

UPDATE 2D_Laser_Schedule
SET Customer = 'Matcor'
WHERE Customer = 'MATCOR MATSU';

UPDATE 2D_Laser_Schedule
SET Customer = 'MSI Defense'
WHERE Customer = 'MSI DEFENSE SOLUTIONS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Newman Tech'
WHERE Customer = 'NEWMAN TECHNOLOGY, INC';

UPDATE 2D_Laser_Schedule
SET Customer = 'Nikola'
WHERE Customer = 'NIKOLA CORPORATION';

UPDATE 2D_Laser_Schedule
SET Customer = 'Penske'
WHERE Customer = 'PENSKE RACING SOUTH INC';

UPDATE 2D_Laser_Schedule
SET Customer = 'Pit Products'
WHERE Customer = 'PIT PRODUCTS LLC.';

UPDATE 2D_Laser_Schedule
SET Customer = 'Pridgeon & Clay'
WHERE Customer = 'PRIDGEON & CLAY';

UPDATE 2D_Laser_Schedule
SET Customer = "ProFab"
WHERE Customer = "ProFab Production Fabricators, Inc.";

UPDATE 2D_Laser_Schedule
SET Customer = 'Richard Childress Racing'
WHERE Customer = 'RCR RACE OPERATIONS, LLC';

UPDATE 2D_Laser_Schedule
SET Customer = "Rivian"
WHERE Customer = "RIVIAN";

UPDATE 2D_Laser_Schedule
SET Customer = "Senior Flexonics"
WHERE Customer = "Senior Flexonics Inc";

UPDATE 2D_Laser_Schedule
SET Customer = "Senneker"
WHERE Customer = "Senneker Performance";

UPDATE 2D_Laser_Schedule
SET Customer = "Stryker"
WHERE Customer = "Stryker Corporation";

UPDATE 2D_Laser_Schedule
SET Customer = 'Technique Chassis'
WHERE Customer = 'TECHNIQUE CHASSIS';

UPDATE 2D_Laser_Schedule
SET Customer = 'Tenneco'
WHERE Customer = 'TENNECO GRASS LAKE';

UPDATE 2D_Laser_Schedule
SET Customer = 'Tenneco Inc'
WHERE Customer = 'TENNECO, INC';

UPDATE 2D_Laser_Schedule
SET Customer = "Thor Sport Racing"
WHERE Customer = "ThorSport Racing";

UPDATE 2D_Laser_Schedule
SET Customer = 'Thyssenkrupp'
WHERE Customer = 'THYSSENKRUPP NA';

UPDATE 2D_Laser_Schedule
SET Customer = 'Tramec Sloan'
WHERE Customer = 'TRAMEC SLOAN(CAT)';

UPDATE 2D_Laser_Schedule
SET Customer = 'Volvo'
WHERE Customer = 'VOLVO TRUCKS N. AMERICA';

UPDATE 2D_Laser_Schedule
SET Customer = 'World Class Industries'
WHERE Customer = 'WORLD CLASS INDUSTRIES';

UPDATE 2D_Laser_Schedule
SET Customer = 'Yamaha'
WHERE Customer = 'YAMAHA MOTOR MFG. CORP';

UPDATE 2D_Laser_Schedule
SET Customer = 'ZF NA'
WHERE Customer = 'ZF NORTH AMERICA';