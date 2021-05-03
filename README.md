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


### Convention

1. HelloController class is for hello in url 
2. actionSamir inside HelloController is samir in url
3. in views folder hello folder is for HelloController site folder is for SiteController


### install Bootstrap4
by default we get bootstrap3 but if we want bootstrap 4 we can do the following in the project folder:
1. composer remove yiisoft/yii2-bootstrap3
2. composer require yiisoft/yii2-bootstrap4

3. assets folder of each project can contain the sources like bootstrap for general settings of the app the dependencies are as follows each asset will show what dependencies it has on other assets YiiAsset depends on jqueryasset so on in the depends array
4. layouts: in layouts and other pages we can add events for yii framework to listen to like the following:
beginPage \
endPage \
beginBody \
endBody \
beginForm \
endForm \
registerCsrfMetaTags is for cross site request forgery \
AppAsset::register($this); $this is an instance of the view class /* @var $this \yii\web\View will register the app assets AppAsset.php configuration in the layout N.B: site.css should be the last thing included in AppAsset \
lang="<?= Yii::$app->language ?>"> in this the $app refers to our app that was created in the index.php file on the web folder of the backend or frontend project and it has some parameters like languages we access it using Yii class  'language'=>'en-US', in config/main.php \
5. wrapper for components widgets (Yii::$app->user->isGuest) user is a component defined in the config file config/main.php (singleton)*  components can be user request session log some components are project specific and others are global in common/config/main like cache
in the general components we specify the class of the singleton but in the project specific we do not because they are specified in the Application class in yiisoft/yii2/web/Application at the end of the class these are web components but we are extending another class that provide console components like log called CoreComponent
