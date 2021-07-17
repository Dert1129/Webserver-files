BEFORE RUNNING PROGRAM DOWNLOAD THESE AND FOLLOW INSTRUCTIONS
    1.  Install nodejs https://nodejs.org/en/
    2.  Install vscode
    3.  Type "npm install jquery" into terminal
    4.  Type "npm install tablesorter" into terminal
    5.  Type "npm install tslib" into terminal
    6.  Install "Enable local file links" Extention on CHROME
to download xampp:
    https://www.apachefriends.org/download.html
        1. accept default settings.
        2. install
----------------ignore these instructions for now-----------------------------
        download/install php drivers for windows DOWNLOAD AFTER XAMPP
            https://www.microsoft.com/en-us/download/confirmation.aspx?id=20098
                1. click browse to place drivers in
                2. find and open xampp folder
                3. open php folder
                4. click on ext folder
                5. click okay
                6. done
        BEFORE CHANGING PORT NUMBER AND IP, DO THIS FIRST
            1. open xampp and click start.
            2. type localhost:1433 into your browser
            3. click on PHPInfo in navigation bar at top of site.
            4. review PHP version and Architechture (ex. 86 or 64)
            5. go to https://github.com/Microsoft/msphpsql/releases
            6. scroll down to find OS and version number for php. (ex. "Windows-7.3.zip");
            7. download zip
            8. extract zip whereever you want.
            9. open folder displaying OS and version
            9. open archetechure version that was seen in step 4.
            10. copy files php_pdo_sqlsrv_version_ts.dll and php_sqlsrv_73_ts.dll (ex. php_pdo_73_ts.dll, if i downloaded windows php version 7.3)
            11. open drive xampp was installed in
            12. open xampp. 
            13. open php folder>ext folder
            14. paste files inside of ext folder
            15. open xampp
            16. click on config in the Apace module. A drop down will open, click PHP(php.ini)
            17. this should open a notepad text file. Ctrl + F to search for "extension="
            18. click enter until you see a list of extenstions
            19. in the list of extenstions, type "extension=php_pdo_sqlsrv_73_ts" The php_ should be the EXACT same name as the .dll files you copy and pasted earlier
            20. repeat step 19 for the second .dll file

----------------------------------------------------------------------------------
        Change config files if you want:
            1. use default installation settings
            2. open xampp and click config on the Apache module. A drop down will open, click Apache(httpd.conf).
            3. Ctl + F to search for "Listen"
            4. Change ip and port to whatever you want to.

To launch server:
    1. open xampp
    2. click start on apache 
    3. Click start on MySQL 
    
To view job table:
    1. type ip address of machine into browser, followed by a colon and 8080 (ex: 127.0.0.1:8080)

    