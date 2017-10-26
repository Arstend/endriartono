<p align="center">Aplikasi Agama Buddha di Indonesia</p>

<p align="center">How to install and run (Windows user) :</p>
1. You need download and install XAMPP, you can download it from <a href="https://www.apachefriends.org/download.html" target="_blank">this link</a>, recommended for XAMPP version 7.1.10 / PHP 7.1.10.
2. Download and install composer from <a href="https://getcomposer.org" target="_blank">composer.org</a>, for linux user you can run command "<b>sudo apt-get install composer -y</b>" to install from repository.
3. Run XAMPP Control Panel with Run As Administrator and checklist Apache and MySQL service and press <b>Start</b> button to run Apache and MySQL as service / daemon.
4. Download / clone this package and extract it to <b>D:\xampp\htdocs</b> (For example your XAMPP installed path at <b>D:\xampp</b>).
5. Open phpMyAdmin (http://localhost/phpmyadmin/).
6. Create database "<b>endriartono</b>".
7. Import endriartono.sql from "<b>D:\xampp\htdocs\endriartono-master\endriartono.sql</b>".
8. In <b>D:\xampp</b>, right click <b>htdocs</b> folder and select "Open Command Prompt window here" or "Open PowerShell window here".
9. Run command "<b>composer update</b>" to download all vendor file.
10. Test your web application from http://localhost/endriartono/public/