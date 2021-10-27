Function MoveCsv($File){
    Remove-Item -Path "C:\xampp\mysql\data\webserver\$File" -Force
    Move-Item -Path "\\tiws07\dwg\Mfg Mtg\Customer Schedule\$File" -Destination "C:\xampp\mysql\data\webserver\" -Force
}
$File = "2D_Laser_Schedule.csv"
MoveCsv -File $File