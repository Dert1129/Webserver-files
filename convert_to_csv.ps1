Function ExcelToCsv($File){
    $myDir = "\\tiws07\dwg\Mfg Mtg\Customer Schedule"
    $excelFile = "$myDir\" + $File + ".xlsx"
    $Excel = New-Object -ComObject Excel.Application
    $wb = $Excel.WORKBOOKS.oPEN($ExcelFile)

    foreach ($ws in $wb.Worksheets){
        $Excel.DisplayAlerts = $false;
        $ws.Columns("C").NumberFormat = "yyyy-mm-dd"
        $ws.SaveAs("$myDir\" + $File + ".csv", 6)
    }
    $Excel.Quit()
}
$FileName = "Job Schedule Details"
ExcelToCsv -File $FileName
Remove-Item -Path "C:\xampp\mysql\data\webserver\Job Schedule Details.csv" -Force
Move-Item -Path "\\tiws07\dwg\Mfg Mtg\Customer Schedule\Job Schedule Details.csv" -Destination "C:\xampp\mysql\data\webserver\" -Force

#$FileName = "Job Schedue Detail-BrakeBaltec"
#ExcelToCsv -File $FileName
#Remove-Item -Path "C:\xampp\mysql\data\webserver\Job Schedue Detail-BrakeBaltec.csv" -Force
#Move-Item -Path "\\tiws07\dwg\Mfg Mtg\Customer Schedule\Job Schedue Detail-BrakeBaltec.csv" -Destination "C:\xampp\mysql\data\webserver\" -Force


Start-Sleep -Seconds 3