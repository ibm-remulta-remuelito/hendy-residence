
# Hendy Residence Web Application

![Screenshot 2025-03-18 190448](https://github.com/user-attachments/assets/33207deb-4162-4920-a2fd-402381cb4a71)

A sample web application built using CodeIgniter 3 with Hierarchical Model View Controller application design pattern that makes the project have 3 different modules.

### The 3 different modules includes:
- Registration module - this module handles the member's registration process in order to gain access to member's information.
- Authentication (login) module - this module handles the user grants of the registered member.
- Member module - this module handles the member information processes.

### SCSS Compilation & Documentation:

![Screenshot 2025-03-18 190545](https://github.com/user-attachments/assets/f3978a4a-efa8-456a-a73f-233e610ee341)

The frontend builder plugin version are quite old makes the development process challenging but I manage to use gulp-cli library with Node version 8 as supported version for the previous implementation of Gulp version 3.9.

To re-use the existing API, all you have to do is to follow the command below once the project is clone and Node version 8 is installed.

```
npm install --global gulp-cli
cd assets/
npm install
npx gulp
```

The command prompt should look like this now:
```
C:\xampp\htdocs\test-be\assets>npx gulp
[18:15:01] Using gulpfile C:\xampp\htdocs\test-be\assets\gulpfile.js
[18:15:01] Starting 'default'...
[18:15:01] Starting 'sass'...
[18:15:01] Starting 'watch'...
[18:15:01] Finished 'watch' after 14 ms
[18:15:01] Finished 'sass' after 173 ms
[18:15:01] Finished 'default' after 174 ms

```
### Documentation
Setup is easy, all you have to do is to follow the steps below to successfully setup the project on your local environment (this documentation applies for Windows):
- Install XAMPP Controller Panel with PHP 5 version.
- Go to `C:/xampp/htdocs`
- Clone the project
- Make sure that the project is under `C:/xampp/htdocs`
- Open XAMPP Controller Panel you installed and look for *Config* button under *Apache* line then choose *Apache (httpd.conf)*
- Change the following line to the cloned project folder name, it should look like this:
```
DocumentRoot "C:/xampp/htdocs/hendy-residence"
<Directory "C:/xampp/htdocs/hendy-residence">
```
- Click *Start* button on Apache and MySQL in you XAMPP Controller Panel.
- Follow the *Database setup* guide below.
- Visit http://localhost to view the web application.

### Database setup
SQL script are located in `application/sql` folder, you can just import it on your database administrator software tools like *PHPMyAdmin* which is included in the project.

### Approaches and Reasoning:
The system is in legacy state since the version of CodeIgniter and supported PHP version are quite old hence the reason it is difficult to setup at first. Hierarchical Model View Controller also gets tricky at first but seems to be convenient to use since all of the important parts of the module are in the same module folder making it more maintainable especially for future developers working on the same module.

### Contact information
If you need some assistance, please contact me through my email: remultasimpatiko@gmail.com
