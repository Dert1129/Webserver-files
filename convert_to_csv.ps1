Function ExcelToCsv($File){
    $myDir = "\\tiws07\dwg\Mfg Mtg\Customer Schedule"
    $excelFile = "$myDir\" + $File + ".csv"
    $Excel = New-Object -ComObject Excel.Application
    $wb = $Excel.WORKBOOKS.oPEN($ExcelFile)

    foreach ($ws in $wb.Worksheets){
        $Excel.DisplayAlerts = $false;
        $ws.Columns("C").NumberFormat = "yyyy-mm-dd"
        $ws.SaveAs("$myDir\" + $File + ".csv", 6)
    }
    $Excel.Quit()
    Remove-Item -Path "C:\xampp\mysql\data\webserver\$FileName.csv" -Force
    Move-Item -Path "\\tiws07\dwg\Mfg Mtg\Customer Schedule\$FileName.csv" -Destination "C:\xampp\mysql\data\webserver\" -Force
}
$FileName = "Job Schedule Details"
ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
#$FileName = "Job Schedule Details"
#ExcelToCsv -File $FileName
