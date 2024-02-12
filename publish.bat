@echo on
SET YourDirToCompress="%cd%"
SET ZipFileResult="%cd%\dist\output.zip"
SET DirToExclude=dist

REM Check if a parameter is provided
IF "%~1"=="" (
    echo Usage: %0 CommitMessage
    goto :eof
)

echo Zipping...
powershell -Command "$YourDirToCompress='%YourDirToCompress%'; $ZipFileResult='%ZipFileResult%'; $DirToExclude=@('%DirToExclude%'); Get-ChildItem $YourDirToCompress | Where-Object { $_.Name -notin $DirToExclude } | Compress-Archive -DestinationPath $ZipFileResult -Update"
echo Done!

SET CommitMessage=%~1
git add .
git commit -m "%CommitMessage%"
git push

echo Done!

pause