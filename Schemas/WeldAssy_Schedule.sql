DROP TABLE IF EXISTS WeldAssy_Schedule;
CREATE TABLE WeldAssy_Schedule(
    Job_Number varchar(50),
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

UPDATE WeldAssy_Schedule
SET Customer = "Ada Metals"
WHERE Customer = "ADA Metal Products Inc";

UPDATE WeldAssy_Schedule
SET Customer = 'Aeroparts'
WHERE Customer = 'AeroParts Manufacturing & Repair';

UPDATE WeldAssy_Schedule
SET Customer = "Alabama Laser"
WHERE Customer = "Alabama Laser Systems";

UPDATE WeldAssy_Schedule
SET Customer = 'Arvin Sango, Inc'
WHERE Customer = 'ARVIN SANGO, INC';

UPDATE WeldAssy_Schedule
SET Customer = 'California Hydroforming'
WHERE Customer = 'CALIFORNIA HYDROFORMING CO INC';

UPDATE WeldAssy_Schedule
SET Customer = "Cardington Yutaka"
WHERE Customer = "Cardington Yutaka Technologies";

UPDATE WeldAssy_Schedule
SET Customer = "Carnegie Robotics"
WHERE Customer = "Carnegie Robotics, LLC";

UPDATE WeldAssy_Schedule
SET Customer = 'Case NH'
WHERE Customer = 'CASE NEW HOLLAND';

UPDATE WeldAssy_Schedule
SET Customer = 'Caterpillar'
WHERE Customer = 'CATERPILLAR INC.';

UPDATE WeldAssy_Schedule
SET Customer = 'Chip Ganassi Racing'
WHERE Customer = 'CHIP GANASSI RACING';

UPDATE WeldAssy_Schedule
SET Customer = 'Chrysler'
WHERE Customer = 'CHRYSLER COMPANY LLC';

UPDATE WeldAssy_Schedule
SET Customer = 'Cobra Patterns & Models'
WHERE Customer = 'COBRA PATTERNS & MODELS INC';

UPDATE WeldAssy_Schedule
SET Customer = 'ContiTech'
WHERE Customer = 'CONTITECH';

UPDATE WeldAssy_Schedule
SET Customer = 'Cummins'
WHERE Customer = 'CUMMINS EMISSION SOLUTIONS';

UPDATE WeldAssy_Schedule
SET Customer = 'Depatie'
WHERE Customer = 'DEPATIE FLUID POWER COMPANY';

UPDATE WeldAssy_Schedule
SET Customer = "Eaton"
WHERE Customer = "Eaton Corporation";

UPDATE WeldAssy_Schedule
SET Customer = 'Eberspaecher'
WHERE Customer = 'EBERSPAECHER N.A.';

UPDATE WeldAssy_Schedule
SET Customer = 'Electrolux'
WHERE Customer = 'Electro Lux';

UPDATE WeldAssy_Schedule
SET Customer = 'Exhaust Systems'
WHERE Customer = 'EXHAUST SYSTEMS';

UPDATE WeldAssy_Schedule
SET Customer = 'Faurecia'
WHERE Customer = 'FAURECIA EMISSIONS CONTROL';

UPDATE WeldAssy_Schedule
SET Customer = 'Ford'
WHERE Customer = 'FORD MOTOR COMPANY';

UPDATE WeldAssy_Schedule
SET Customer = 'GMP Metal Products'
WHERE Customer = 'GMP METAL PRODUCTS';

UPDATE WeldAssy_Schedule 
SET Customer = 'Hendrick Motorsports'
WHERE Customer = "HENDRICK MOTORSPORTS";

UPDATE WeldAssy_Schedule 
SET Customer = "Hendrickson Int'l"
WHERE Customer = "Hendrickson International";

UPDATE WeldAssy_Schedule
SET Customer = 'Honda'
WHERE Customer = 'HONDA R&D AMERICAS';

UPDATE WeldAssy_Schedule
SET Customer = 'Humanetics'
WHERE Customer = 'HUMANETICS INNOVATIVE SOLUTION';

UPDATE WeldAssy_Schedule
SET Customer = 'Isuzu'
WHERE Customer = 'ISUZU MANUFACTURING SERVICES';

UPDATE WeldAssy_Schedule
SET Customer = 'JAC Products'
WHERE Customer = 'JAC PRODUCTS';

UPDATE WeldAssy_Schedule
SET Customer = 'Jedco'
WHERE Customer = 'JEDCO, INC';

UPDATE WeldAssy_Schedule
SET Customer = 'John Deere'
WHERE Customer = 'JOHN DEERE HARVESTER WORKS';

UPDATE WeldAssy_Schedule
SET Customer = "Kellog"
WHERE Customer = "Kellogg's";

UPDATE WeldAssy_Schedule
SET Customer = "Mack Trucks"
WHERE Customer = "Mack Trucks, Inc";

UPDATE WeldAssy_Schedule
SET Customer = "Magneti"
WHERE Customer = "Magneti Marelli";

UPDATE WeldAssy_Schedule
SET Customer = 'Matcor'
WHERE Customer = 'MATCOR MATSU';

UPDATE WeldAssy_Schedule
SET Customer = 'MSI Defense'
WHERE Customer = 'MSI DEFENSE SOLUTIONS';

UPDATE WeldAssy_Schedule
SET Customer = 'Newman Tech'
WHERE Customer = 'NEWMAN TECHNOLOGY, INC';

UPDATE WeldAssy_Schedule
SET Customer = 'Nikola'
WHERE Customer = 'NIKOLA CORPORATION';

UPDATE WeldAssy_Schedule
SET Customer = 'Penske'
WHERE Customer = 'PENSKE RACING SOUTH INC';

UPDATE WeldAssy_Schedule
SET Customer = 'Pit Products'
WHERE Customer = 'PIT PRODUCTS LLC.';

UPDATE WeldAssy_Schedule
SET Customer = 'Pridgeon & Clay'
WHERE Customer = 'PRIDGEON & CLAY';

UPDATE WeldAssy_Schedule
SET Customer = "ProFab"
WHERE Customer = "ProFab Production Fabricators, Inc.";

UPDATE WeldAssy_Schedule
SET Customer = 'Richard Childress Racing'
WHERE Customer = 'RCR RACE OPERATIONS, LLC';

UPDATE WeldAssy_Schedule
SET Customer = "Rivian"
WHERE Customer = "RIVIAN";

UPDATE WeldAssy_Schedule
SET Customer = "Senior Flexonics"
WHERE Customer = "Senior Flexonics Inc";

UPDATE WeldAssy_Schedule
SET Customer = "Senneker"
WHERE Customer = "Senneker Performance";

UPDATE WeldAssy_Schedule
SET Customer = "Stryker"
WHERE Customer = "Stryker Corporation";

UPDATE WeldAssy_Schedule
SET Customer = 'Technique Chassis'
WHERE Customer = 'TECHNIQUE CHASSIS';

UPDATE WeldAssy_Schedule
SET Customer = 'Tenneco'
WHERE Customer = 'TENNECO GRASS LAKE';

UPDATE WeldAssy_Schedule
SET Customer = 'Tenneco Inc'
WHERE Customer = 'TENNECO, INC';

UPDATE WeldAssy_Schedule
SET Customer = "Thor Sport Racing"
WHERE Customer = "ThorSport Racing";

UPDATE WeldAssy_Schedule
SET Customer = 'Thyssenkrupp'
WHERE Customer = 'THYSSENKRUPP NA';

UPDATE WeldAssy_Schedule
SET Customer = 'Tramec Sloan'
WHERE Customer = 'TRAMEC SLOAN(CAT)';

UPDATE WeldAssy_Schedule
SET Customer = 'Volvo'
WHERE Customer = 'VOLVO TRUCKS N. AMERICA';

UPDATE WeldAssy_Schedule
SET Customer = 'World Class Industries'
WHERE Customer = 'WORLD CLASS INDUSTRIES';

UPDATE WeldAssy_Schedule
SET Customer = 'Yamaha'
WHERE Customer = 'YAMAHA MOTOR MFG. CORP';

UPDATE WeldAssy_Schedule
SET Customer = 'ZF NA'
WHERE Customer = 'ZF NORTH AMERICA';