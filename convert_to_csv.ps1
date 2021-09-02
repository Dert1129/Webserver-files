Function ExcelToCsv($File){
    $myDir = "\\tiws07\dwg\Mfg Mtg\"
    $excelFile = "$myDir\" + $File + ".xlsx"
    $Excel = New-Object -ComObject Excel.Application
    $wb = $Excel.wORKBOOKS.oPEN($ExcelFile)

    foreach ($ws in $wb.Worksheets){
        $Excel.DisplayAlerts = $false;
        $ws.SaveAs("$myDir\" + $File + ".csv", 6)
    }
    $Excel.Quit()
}
$FileName = "Job Schedule"
ExcelToCsv -File $FileName