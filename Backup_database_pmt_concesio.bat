@echo off
set mySqlPath=C:\xampp\mysql
set dbUser=root
set dbPassword="kevin4678"
set dbName=pmt_consecion
set file=%dbName%_%date:~-4,4%%date:~-7,2%%date:~-10,2%_%time:~0,2%%time:~3,2%%time:~6,2%.sql
set path=C:\%dbName%

echo Running dump for database %dbName% ^> ^%path%\%file%
"%mySqlPath%\bin\mysqldump.exe" -u %dbUser% -p%dbPassword%  %dbName% >"%path%\%file%"
pause