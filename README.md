# backend

Create Mysql database and table with following command : mysql -u 'user' -p 'password' <db.sql

Alternatively you can use online DB to test the app, just comment the localhost mysql data and uncomment the freedb.tech data on 'db_connection.php' file.

Assuming you have php installed, run following command inside dir above backend dir : php -S 127.0.0.1:8000 -t backend

This will run a server serving the phps files on localhost.

# Known bugs:

If location doesn't exist in DB, the first click on search buttton will insert it on DB, the second one will read it from DB, same happens when updating it.



