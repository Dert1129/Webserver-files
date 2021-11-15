Function ExcelToCsv () {
    $date = Get-Date -Format "yyyy-MM-dd"
    $backschedule = $date + "_Backschedule";
    $dir = "\\tiws07\dwg\Mfg Mtg\"+$backschedule +".xlsx"
    if(Test-Path $dir -PathType Leaf){
        Copy-Item -Path $dir -Destination "C:\xampp\mysql\data\webserver\" -Force
        $newName = "Job Schedule Details"
         Rename-Item $dir -NewName $newName -Force
    
        $excelFile = "$dir\" + $newName + ".xlsx"
        $Excel = New-Object -ComObject Excel.Application
        $wb = $Excel.Workbooks.Open($excelFile)
        
        foreach ($ws in $wb.Worksheets) {
            $Excel.DisplayAlerts = $false;
            $ws.Columns("C").NumberFormat = "yyyy-mm-dd"
            $ws.SaveAs("$dir\" + $newName + ".csv", 6)
        }
        $Excel.Quit()
    }else{
        Write-Output "File doesn't exist, cannot copy"
    }
}
ExcelToCsv