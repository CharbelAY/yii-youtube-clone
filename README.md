# yii-youtube-clone

# Create Yii2 project

##Steps:
1. run docker-compose up this should start the services apache mariadb and phpmyadmin
2. inside dockerfile we ran a command to create the repository that will contain our websites applications in the following directory /var/www/freecodetube.testingapp this is initially empty but we will mount a volume (binding) to have the content of src in it. in this repository run composer create-project --prefer-dist yiisoft/yii2-app-advanced projectFolderName
3. We need to change the configurations of apache 2 so it serves our websites using their names this is in appache2-conf/sites-available/freecodetube.testingapp.conf the apache2-conf mirors the docker image directory /etc/apache2 this is where all the apache2 configurations are available this will tell apache where the files of the freecodetube.testingapp are located if the RewriteEngine on gives an error we need to run sudo a2enmod rewrite and service apache2 restart
4. we need to activate the website using sudo a2ensite freecodetube.testingapp
5. the info above are available here [https://linuxize.com/post/how-to-set-up-apache-virtual-hosts-on-ubuntu-18-04/](https://linuxize.com/post/how-to-set-up-apache-virtual-hosts-on-ubuntu-18-04/)
6. Now we need to let our local machine understand where to go when freecodetube.testingapp is typed in the browser. we need to add 127.0.0.1 freecodetube.testingapp in the following file on the local machine /etc/hosts
7. Now our website is served correctly hopefully :)
8. we still need to follow steps 3+ in the following link [https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md) like doing php init and...
9. after doing php yii migrate the login and register functionality should work on their own the emails are sent to frontend/runtime/mail with a link the link does not work we need to remove all = that have a new line after them and remove all 3D that follow = without removing the =

### This will create an advanced project with frontend and backend in different folders under one root folder
composer create-project --prefer-dist yiisoft/yii2-app-advanced projectFolderName


### Comments

1. When a controller is created the path in the url is the following nameofwebsite/controllername/action. So HelloWorldController will be hello-world and the action for example actionIndex will become index so nameofwebsite/hello-world/index