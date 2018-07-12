@echo off
start C:\wamp\wampmanager.exe

echo Configurez baza de date
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="CREATE DATABASE datadb"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; GRANT ALL PRIVILEGES ON *.* TO 'php'@'localhost' IDENTIFIED BY 'php';"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table1` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table2` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table3` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table4` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table5` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`table6` ( `Data1` FLOAT NOT NULL , `Data2` FLOAT NOT NULL ) ENGINE = MyISAM;"

C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tablebmp`  ( `Data1` TINYINT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tableds18` ( `Data1` TINYINT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tablegps`  ( `Data1` TINYINT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tablesht`  ( `Data1` TINYINT NOT NULL ) ENGINE = MyISAM;"
C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tabletsl`  ( `Data1` TINYINT NOT NULL ) ENGINE = MyISAM;"

C:\wamp\bin\mysql\mysql5.7.21\bin\mysql.exe -u root --execute="USE datadb; CREATE TABLE `datadb`.`tabletime` ( `Data1` MEDIUMTEXT NOT NULL ) ENGINE = MyISAM;"

PAUSE