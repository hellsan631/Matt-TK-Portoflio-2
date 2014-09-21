INSTALLATION ============


1. Copy over everything to your servers ftp.

2. In Notepad, open "class.database.config.php" inside the "_objects/" folder.

3. Enter in all of your mysql database information (don't worry about $newpass, we'll get to the later)

4. Once you've entered in everything, open a web browser

5. GOTO "www.yoursite.com/install.php" or navigate to install.php on your server.



If the page says "Success!" then delete install.php and use the website.

If the page doesn't say "Success!", then you got your database information wrong, and recheck that.



USING ADMIN ============



To use admin, open a web browser



1. GOTO "www.yoursite.com/de--admin.php" or what ever you named the admin page to.

2. Login using the default credentals:
	
Username: Admin
	
Password: admin
	


CHANGE ADMIN PASS ============



1. In Notepad, open "class.database.config.php" inside the "_objects/" folder.

2. Change whats inside the quotes of $newpass to what ever you want

3. Login to the admin area with the default username and password (or previously used password if you've changed it)

4. After logging in, the password will be changed to the new password.

5. You can then delete or comment out the $newpass line

NOTES ============
the default mysql is saved as "zsg.sql"
you can import this in phpMyAdmin instead of running install.php