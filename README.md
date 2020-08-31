# innotestpizza

This is a test project for some IT company, written with PHP/MYSQL/JS/JQUERY.

A registered user can order pizza, and this order will be stored in his order history. Selected items are stored in cart using cookies and sessions. User can fill/change/clear it's cart from any page, without additional page reloads (using AJAX). Also registered user recieves mail, when he changes his password or make a new order.

A guest can also make orders, but he has not personal area and he can't see order history. Also guest do not recieve any mail.

2 DO LIST:

0) make it OOP and MVC
1) make an admin area, where admin can add/change/delete pizzas, users, see all orders and amount
2) improve some things like bonuses and time-limited actions
3) optimize images
4) put ajax files into separate directory =)
5) hide .php extensions in urls via .htaccess
6) make pizza great again

# Installation

- Upload all files (except dump.sql) to your home site directory
- Import the sql dump into your mysql database (using CLI or something like phpMyAdmin)
- Insert the correct settings into dbconf.php (host, database name, username, pass)
- Create mail account "no-reply@yourdomain.com" (or smth like this), define it in mailreg.php file

# Requiments

Web server + PHP (>=5.4) + MySQL + EXIM (or another post service)

This version is 1.1

GNU GPL (c) Alexander Makharinets 2020
