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

LOAD DATA INFILE "Job Schedue Detail-TubeBend.csv"
INTO TABLE Tube_Bender_Schedule
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY "\r\n"
IGNORE 1 ROWS;

DELETE FROM Tube_Bender_Schedule WHERE Job_number = "";

UPDATE Tube_Bender_Schedule
SET Customer = "Ada Metals"
WHERE Customer = "ADA Metal Products Inc";

UPDATE Tube_Bender_Schedule
SET Customer = 'Aeroparts'
WHERE Customer = 'AeroParts Manufacturing & Repair';

UPDATE Tube_Bender_Schedule
SET Customer = "Alabama Laser"
WHERE Customer = "Alabama Laser Systems";

UPDATE Tube_Bender_Schedule
SET Customer = 'Arvin Sango, Inc'
WHERE Customer = 'ARVIN SANGO, INC';

UPDATE Tube_Bender_Schedule
SET Customer = 'California Hydroforming'
WHERE Customer = 'CALIFORNIA HYDROFORMING CO INC';

UPDATE Tube_Bender_Schedule
SET Customer = "Cardington Yutaka"
WHERE Customer = "Cardington Yutaka Technologies";

UPDATE Tube_Bender_Schedule
SET Customer = "Carnegie Robotics"
WHERE Customer = "Carnegie Robotics, LLC";

UPDATE Tube_Bender_Schedule
SET Customer = 'Case NH'
WHERE Customer = 'CASE NEW HOLLAND';

UPDATE Tube_Bender_Schedule
SET Customer = 'Caterpillar'
WHERE Customer = 'CATERPILLAR INC.';

UPDATE Tube_Bender_Schedule
SET Customer = 'Chip Ganassi Racing'
WHERE Customer = 'CHIP GANASSI RACING';

UPDATE Tube_Bender_Schedule
SET Customer = 'Chrysler'
WHERE Customer = 'CHRYSLER COMPANY LLC';

UPDATE Tube_Bender_Schedule
SET Customer = 'Cobra Patterns & Models'
WHERE Customer = 'COBRA PATTERNS & MODELS INC';

UPDATE Tube_Bender_Schedule
SET Customer = 'ContiTech'
WHERE Customer = 'CONTITECH';

UPDATE Tube_Bender_Schedule
SET Customer = 'Cummins'
WHERE Customer = 'CUMMINS EMISSION SOLUTIONS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Depatie'
WHERE Customer = 'DEPATIE FLUID POWER COMPANY';

UPDATE Tube_Bender_Schedule
SET Customer = "Eaton"
WHERE Customer = "Eaton Corporation";

UPDATE Tube_Bender_Schedule
SET Customer = 'Eberspaecher'
WHERE Customer = 'EBERSPAECHER N.A.';

UPDATE Tube_Bender_Schedule
SET Customer = 'Electrolux'
WHERE Customer = 'Electro Lux';

UPDATE Tube_Bender_Schedule
SET Customer = 'Exhaust Systems'
WHERE Customer = 'EXHAUST SYSTEMS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Faurecia'
WHERE Customer = 'FAURECIA EMISSIONS CONTROL';

UPDATE Tube_Bender_Schedule
SET Customer = 'Ford'
WHERE Customer = 'FORD MOTOR COMPANY';

UPDATE Tube_Bender_Schedule
SET Customer = 'GMP Metal Products'
WHERE Customer = 'GMP METAL PRODUCTS';

UPDATE Tube_Bender_Schedule 
SET Customer = 'Hendrick Motorsports'
WHERE Customer = "HENDRICK MOTORSPORTS";

UPDATE Tube_Bender_Schedule 
SET Customer = "Hendrickson Int'l"
WHERE Customer = "Hendrickson International";

UPDATE Tube_Bender_Schedule
SET Customer = 'Honda'
WHERE Customer = 'HONDA R&D AMERICAS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Humanetics'
WHERE Customer = 'HUMANETICS INNOVATIVE SOLUTION';

UPDATE Tube_Bender_Schedule
SET Customer = 'Isuzu'
WHERE Customer = 'ISUZU MANUFACTURING SERVICES';

UPDATE Tube_Bender_Schedule
SET Customer = 'JAC Products'
WHERE Customer = 'JAC PRODUCTS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Jedco'
WHERE Customer = 'JEDCO, INC';

UPDATE Tube_Bender_Schedule
SET Customer = 'John Deere'
WHERE Customer = 'JOHN DEERE HARVESTER WORKS';

UPDATE Tube_Bender_Schedule
SET Customer = "Kellog"
WHERE Customer = "Kellogg's";

UPDATE Tube_Bender_Schedule
SET Customer = "Mack Trucks"
WHERE Customer = "Mack Trucks, Inc";

UPDATE Tube_Bender_Schedule
SET Customer = "Magneti"
WHERE Customer = "Magneti Marelli";

UPDATE Tube_Bender_Schedule
SET Customer = 'Matcor'
WHERE Customer = 'MATCOR MATSU';

UPDATE Tube_Bender_Schedule
SET Customer = 'MSI Defense'
WHERE Customer = 'MSI DEFENSE SOLUTIONS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Newman Tech'
WHERE Customer = 'NEWMAN TECHNOLOGY, INC';

UPDATE Tube_Bender_Schedule
SET Customer = 'Nikola'
WHERE Customer = 'NIKOLA CORPORATION';

UPDATE Tube_Bender_Schedule
SET Customer = 'Penske'
WHERE Customer = 'PENSKE RACING SOUTH INC';

UPDATE Tube_Bender_Schedule
SET Customer = 'Pit Products'
WHERE Customer = 'PIT PRODUCTS LLC.';

UPDATE Tube_Bender_Schedule
SET Customer = 'Pridgeon & Clay'
WHERE Customer = 'PRIDGEON & CLAY';

UPDATE Tube_Bender_Schedule
SET Customer = "ProFab"
WHERE Customer = "ProFab Production Fabricators, Inc.";

UPDATE Tube_Bender_Schedule
SET Customer = 'Richard Childress Racing'
WHERE Customer = 'RCR RACE OPERATIONS, LLC';

UPDATE Tube_Bender_Schedule
SET Customer = "Rivian"
WHERE Customer = "RIVIAN";

UPDATE Tube_Bender_Schedule
SET Customer = "Senior Flexonics"
WHERE Customer = "Senior Flexonics Inc";

UPDATE Tube_Bender_Schedule
SET Customer = "Senneker"
WHERE Customer = "Senneker Performance";

UPDATE Tube_Bender_Schedule
SET Customer = "Stryker"
WHERE Customer = "Stryker Corporation";

UPDATE Tube_Bender_Schedule
SET Customer = 'Technique Chassis'
WHERE Customer = 'TECHNIQUE CHASSIS';

UPDATE Tube_Bender_Schedule
SET Customer = 'Tenneco'
WHERE Customer = 'TENNECO GRASS LAKE';

UPDATE Tube_Bender_Schedule
SET Customer = 'Tenneco Inc'
WHERE Customer = 'TENNECO, INC';

UPDATE Tube_Bender_Schedule
SET Customer = "Thor Sport Racing"
WHERE Customer = "ThorSport Racing";

UPDATE Tube_Bender_Schedule
SET Customer = 'Thyssenkrupp'
WHERE Customer = 'THYSSENKRUPP NA';

UPDATE Tube_Bender_Schedule
SET Customer = 'Tramec Sloan'
WHERE Customer = 'TRAMEC SLOAN(CAT)';

UPDATE Tube_Bender_Schedule
SET Customer = 'Volvo'
WHERE Customer = 'VOLVO TRUCKS N. AMERICA';

UPDATE Tube_Bender_Schedule
SET Customer = 'World Class Industries'
WHERE Customer = 'WORLD CLASS INDUSTRIES';

UPDATE Tube_Bender_Schedule
SET Customer = 'Yamaha'
WHERE Customer = 'YAMAHA MOTOR MFG. CORP';

UPDATE Tube_Bender_Schedule
SET Customer = 'ZF NA'
WHERE Customer = 'ZF NORTH AMERICA';