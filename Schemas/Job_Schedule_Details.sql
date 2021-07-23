DROP TABLE IF EXISTS Job_Schedule;
CREATE TABLE Job_Schedule(
	Technician varchar(50),
	Job_number varchar(50),
	Due_Date date,
	Customer varchar(50),
	Part_Number varchar(50),
	Part_Description text,
	Customer_PO varchar(50),
	Qty text,
	$ varchar(50),
	Value varchar(50),
	Product_Code varchar(50)
);

LOAD DATA INFILE "MyTable.csv"
INTO TABLE job_schedule
FIELDS TERMINATED BY ","
ENCLOSED BY '"'
LINES TERMINATED BY "\n"
IGNORE 1 ROWS;

DELETE FROM job_schedule WHERE Technician = "Page -1 of 1";

alter table job_schedule
add JSDID INT PRIMARY KEY auto_increment primary KEY;

alter table job_schedule
add Thumbnail text;

UPDATE Job_Schedule
SET Thumbnail = "No image available.png"
WHERE Thumbnail IS NULL;

/*Update customer names according to file system. If customer names don't match exactly then the Juob_number Hyperlink won't work*/
UPDATE Job_Schedule
SET Customer = 'Aeroparts'
WHERE Customer = 'AeroParts Manufacturing & Repair';

UPDATE Job_Schedule
SET Customer = 'Arvin Sango, Inc'
WHERE Customer = 'ARVIN SANGO, INC';

UPDATE Job_Schedule
SET Customer = 'California Hydroforming'
WHERE Customer = 'CALIFORNIA HYDROFORMING CO INC';

UPDATE Job_Schedule
SET Customer = 'Case NH'
WHERE Customer = 'CASE NEW HOLLAND';

UPDATE Job_Schedule
SET Customer = 'Caterpillar'
WHERE Customer = 'CATERPILLAR INC.';

UPDATE Job_Schedule
SET Customer = 'Chip Ganassi Racing'
WHERE Customer = 'CHIP GANASSI RACING';

UPDATE Job_Schedule
SET Customer = 'Chrysler'
WHERE Customer = 'CHRYSLER COMPANY LLC';

UPDATE Job_Schedule
SET Customer = 'ContiTech'
WHERE Customer = 'CONTITECH';

UPDATE Job_Schedule
SET Customer = 'Cummins'
WHERE Customer = 'CUMMINS EMISSION SOLUTIONS';

UPDATE Job_Schedule
SET Customer = 'Depatie'
WHERE Customer = 'DEPATIE FLUID POWER COMPANY';

UPDATE Job_Schedule
SET Customer = 'Eberspaecher'
WHERE Customer = 'EBERSPAECHER N.A.';

UPDATE Job_Schedule
SET Customer = 'Electrolux'
WHERE Customer = 'Electro Lux';

UPDATE Job_Schedule
SET Customer = 'Exhaust Systems'
WHERE Customer = 'EXHAUST SYSTEMS';

UPDATE Job_Schedule
SET Customer = 'Faurecia'
WHERE Customer = 'FAURECIA EMISSIONS CONTROL';

UPDATE Job_Schedule
SET Customer = 'Ford'
WHERE Customer = 'FORD MOTOR COMPANY';

UPDATE Job_Schedule
SET Customer = 'GMP Metal Products'
WHERE Customer = 'GMP METAL PRODUCTS';

UPDATE job_schedule 
SET Customer = 'Hendrick Motorsports'
WHERE Customer = "HENDRICK MOTORSPORTS";

UPDATE Job_Schedule
SET Customer = 'Honda'
WHERE Customer = 'HONDA R&D AMERICAS';

UPDATE Job_Schedule
SET Customer = 'Humanetics'
WHERE Customer = 'HUMANETICS INNOVATIVE SOLUTION';

UPDATE Job_Schedule
SET Customer = 'Isuzu'
WHERE Customer = 'ISUZU MANUFACTURING SERVICES';

UPDATE Job_Schedule
SET Customer = 'JAC Products'
WHERE Customer = 'JAC PRODUCTS';

UPDATE Job_Schedule
SET Customer = 'Jedco'
WHERE Customer = 'JEDCO, INC';

UPDATE Job_Schedule
SET Customer = 'John Deere'
WHERE Customer = 'JOHN DEERE HARVESTER WORKS';

UPDATE Job_Schedule
SET Customer = 'Matcor'
WHERE Customer = 'MATCOR MATSU';

UPDATE Job_Schedule
SET Customer = 'MSI Defense'
WHERE Customer = 'MSI DEFENSE SOLUTIONS';

UPDATE Job_Schedule
SET Customer = 'Newman Tech'
WHERE Customer = 'NEWMAN TECHNOLOGY, INC';

UPDATE Job_Schedule
SET Customer = 'Nikola'
WHERE Customer = 'NIKOLA CORPORATION';

UPDATE Job_Schedule
SET Customer = 'Penske'
WHERE Customer = 'PENSKE RACING SOUTH INC';

UPDATE Job_Schedule
SET Customer = 'Pit Products'
WHERE Customer = 'PIT PRODUCTS LLC.';

UPDATE Job_Schedule
SET Customer = 'Pridgeon & Clay'
WHERE Customer = 'PRIDGEON & CLAY';

UPDATE Job_Schedule
SET Customer = 'Richard Childress Racing'
WHERE Customer = 'RCR RACE OPERATIONS, LLC';

UPDATE Job_Schedule
SET Customer = 'Technique Chassis'
WHERE Customer = 'TECHNIQUE CHASSIS';

UPDATE Job_Schedule
SET Customer = 'Tenneco'
WHERE Customer = 'TENNECO GRASS LAKE';

UPDATE Job_Schedule
SET Customer = 'Tenneco Inc'
WHERE Customer = 'TENNECO, INC';

UPDATE Job_Schedule
SET Customer = 'Thyssenkrupp'
WHERE Customer = 'THYSSENKRUPP NA';

UPDATE Job_Schedule
SET Customer = 'Tramec Sloan'
WHERE Customer = 'TRAMEC SLOAN(CAT)';

UPDATE Job_Schedule
SET Customer = 'Volvo'
WHERE Customer = 'VOLVO TRUCKS N. AMERICA';

UPDATE Job_Schedule
SET Customer = 'World Class Industries'
WHERE Customer = 'WORLD CLASS INDUSTRIES';

UPDATE Job_Schedule
SET Customer = 'Yamaha'
WHERE Customer = 'YAMAHA MOTOR MFG. CORP';

UPDATE Job_Schedule
SET Customer = 'ZF NA'
WHERE Customer = 'ZF NORTH AMERICA';