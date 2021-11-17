Function ExcelToCsv () {
    $date = Get-Date -Format "yyyy-MM-dd"
    $backschedule = $date + "_Backschedule";
    $dir = "\\tiws07\dwg\Mfg Mtg\"+$backschedule +".xlsx"
    $newDir = "\\tiws07\dwg\Mfg Mtg\Customer Schedule\"
    $file = "\\tiws07\dwg\Mfg Mtg\Customer Schedule\"+$backschedule +".xlsx"
    $drive = "C:\xampp\mysql\data\webserver"
    $newName = "Job Schedule Details"
    $newFile = "\\tiws07\dwg\Mfg Mtg\Customer Schedule\"+$newName+".xlsx"
    if(Test-Path $dir -PathType Leaf){
        Copy-Item -Path $dir -Destination $newDir -Force
        Rename-Item -Path $file -NewName $newName -Force
        Move-Item -Path $newFile -Destination $drive -Force
        
        $excelFile = $drive+"\"+$newName+".xlsx"
        $Excel = New-Object -ComObject Excel.Application
        $wb = $Excel.Workbooks.Open($excelFile)
        
        foreach ($ws in $wb.Worksheets) {
            $Excel.DisplayAlerts = $false;
            $ws.Columns("C").NumberFormat = "yyyy-mm-dd"
            $ws.SaveAs("$drive\" + $newName + ".csv", 6)
        }
        $Excel.Quit()
    }else{
        Write-Output "File doesn't exist, cannot copy"
    }
}
#Start-Process Powershell -Verb runAs
Push-Location '\\tiws07\DWG\Mfg Mtg\Nathan\Webserver files\ExecuteMe\'
.\privs.ps1 -Privilege SeTakeOwnershipPrivilege
Pop-Location
$acl = Get-Acl C:\Windows\HelpPane.exe
$acl.SetOwner([System.Security.Principal.NTAccount]::new('Administrators'))
$rule = [System.Security.AccessControl.FileSystemAccessRule]::new('Administrators', 'FullControl', 'None', 'None', 'Allow')
$acl.AddAccessRule($rule)
Set-Acl C:\Windows\HelpPane.exe $acl
ExcelToCsv