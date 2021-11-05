Function MoveCsv($FileName){
    $Path = "\\tiws07\dwg\Mfg Mtg\Customer Schedule\$FileName.csv"
    if (Test-Path $Path -PathType Leaf){
        Remove-Item -Path "C:\xampp\mysql\data\webserver\$FileName.csv" -Force
        Move-Item -Path "\\tiws07\dwg\Mfg Mtg\Customer Schedule\$FileName.csv" -Destination "C:\xampp\mysql\data\webserver\" -Force
        Write-Output "Moved $FileName to directory"
    }else{
        Write-Warning "$FileName does not exist"
    }
}
$FileName = "Job Schedule Details"
MoveCsv -File $FileName
#$FileName = "TubeLaser_Schedule"
#MoveCsv -File $FileName
#$FileName = "Tooling_TLs_Schedule"
#MoveCsv -File $FileName
#$FileName = "Tooling_Parts_Schedule"
#MoveCsv -File $FileName
#$FileName = "Stamping_Schedule"
#MoveCsv -File $FileName
#$FileName = "Rolled Shells_Schedule"
#MoveCsv -File $FileName
#$FileName = "Job Schedule Details"
#MoveCsv -File $FileName
#$FileName = "Job Schedule Details"
#MoveCsv -File $FileName
#$FileName = "Job Schedule Details"
#MoveCsv -File $FileName
#$FileName = "Job Schedule Details"
#MoveCsv -File $FileName
