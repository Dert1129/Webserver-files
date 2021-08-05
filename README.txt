BEFORE RUNNING PROGRAM DOWNLOAD THESE AND FOLLOW INSTRUCTIONS
    1.  Install nodejs https://nodejs.org/en/
    2.  Install vscode
    3.  Type "npm install jquery" into terminal
    4.  Type "npm install tablesorter" into terminal
    5.  Type "npm install tslib" into terminal
    6.  Install "Enable local file links" Extention on CHROME
    DOWNLOAD AND INSTALL LATEST VISUAL STUDIO VERSION 
    DOWNLOAD AND INSTALL MYSQL COMMUNITY EDITION
to download xampp:
    https://www.apachefriends.org/download.html
        1. Accept default settings.
        2. Install
----------------ignore these instructions for now-----------------------------
        download/install php drivers for windows DOWNLOAD AFTER XAMPP
            https://www.microsoft.com/en-us/download/confirmation.aspx?id=20098
                1. Click browse to place drivers in
                2. Find and open xampp folder
                3. Open php folder
                4. Click on ext folder
                5. Click okay
                6. Done
        BEFORE CHANGING PORT NUMBER AND IP, DO THIS FIRST
            1. Open xampp and click start.
            2. Type localhost:1433 into your browser
            3. Click on PHPInfo in navigation bar at top of site.
            4. Review PHP version and Architechture (ex. 86 or 64)
            5. Go to https://github.com/Microsoft/msphpsql/releases
            6. Scroll down to find OS and version number for php. (ex. "Windows-7.3.zip");
            7. Download zip
            8. Extract zip whereever you want.
            9. Open folder displaying OS and version
            9. Open archetechure version that was seen in step 4.
            10. Copy files php_pdo_sqlsrv_version_ts.dll and php_sqlsrv_73_ts.dll (ex. php_pdo_73_ts.dll, if i downloaded windows php version 7.3)
            11. Open drive xampp was installed in
            12. Open xampp. 
            13. Open php folder>ext folder
            14. Paste files inside of ext folder
            15. Open xampp
            16. Click on config in the Apace module. A drop down will open, click PHP(php.ini)
            17. This should open a notepad text file. Ctrl + F to search for "extension="
            18. Click enter until you see a list of extenstions
            19. In the list of extenstions, type "extension=php_pdo_sqlsrv_73_ts" The php_ should be the EXACT same name as the .dll files you copy and pasted earlier
            20. Repeat step 19 for the second .dll file

----------------------------------------------------------------------------------
        Change config files if you want:
            1. Use default installation settings
            2. Open xampp and click config on the Apache module. A drop down will open, click Apache(httpd.conf).
            3. Ctl + F to search for "Listen"
            4. Change ip and port to whatever you want to.

To launch server:
    1. Open xampp
    2. click start on apache 
    3. Click start on MySQL 
    
To view job table:
    1. Type ip address of machine into browser, followed by a colon and 8080 (ex: 127.0.0.1:8080)
 
 Task Scheduler
    1. Create Task
    2. Triggers tab: 00:00:00AM/PM 
    3. Go to actions tab and click on New...
    4. Action: Start a program 
    5. Program to run: C:\xampp\php\php.exe
    6. Arguements: -f "\\tiws07\dwg\Mfg Mtg\Nathan\Webserver files\execute_sql.php"
    7. Click ok
    8. Uncheck anyt boxes in conditions Tab 
    9. Go to settings tab
    10. Make sure these are checked:
        1. Allow task to be run on demand
        2. Run task as soon as possile after a scheduled start is missed
        3. If the task fails, restart every: 10 minutes
        4. If the running task does not end when requested, force it to stop
    11. Find "If the task is already running, then the following applies:
    12. Click on the drop down and choose "Do no start a new instance"
    13. Done.
    