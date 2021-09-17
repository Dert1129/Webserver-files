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
    12. Click on the drop down and choose "Run a new instance in paralell"
    13. Done.
    