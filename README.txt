BEFORE RUNNING PROGRAM DOWNLOAD THESE AND FOLLOW INSTRUCTIONS
to download xampp:
    https://www.apachefriends.org/download.html
        1. accept default settings.
        2. install
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
            17. this should open a notepad text file. Ctrl + F to search for "extention="
            18. click enter until you see a list of extenstions
            19. in the list of extenstions, type "extension=php_pdo_sqlsrv_73_ts" The php_ should be the EXACT same name as the .dll files you copy and pasted earlier
            20. repeat step 19 for the second .dll file

            
        Change config files if you want:
            1. use default installation settings
            2. open xampp and click config on the Apache module. A drop down will open, click Apache(httpd.conf).
            3. Ctl + F to search for "Listen"
            4. Change ip and port to whatever you want to.

download/install php drivers for windows
https://www.microsoft.com/en-us/download/confirmation.aspx?id=20098
1. use default settings