<?php
require ("../../includes/libs/echolibs/frame.inc");
require ("../../layout/AppLayout.module");

//$newPage = new Frame();
//$states = ['page' => "ModularDemo"];
//$newPage->setState($states);
//$newPage->setTemplate("modular.phtml");
//$newAppPage = new AppLayout();
//$newAppPage->setContent($newPage->export());
//$newAppPage->setFromPath('../../layout/')->echoF();

$newAppPage = new AppLayout();
$props = [
    'AppHead' =>['pageTitle'=> "Dashboard"],
    'AppBody'=>[],
    'AppContainer'=>[],
    'AppScripts'=>[],
    'AppHeader'=>[],
    'AppAction'=>[],
    'AppMain'=>[],
    'AppSideBar'=>[],
    'AppMainOuter'=>[],
    'AppMainInner'=>[],
    'AppFooter'=>[],
    'AppPageTitle'=>['title'=> "Welcome Back", 'note'=> "You Can Use Action button to take offer or goto referrals"],
    'AppContents'=>[]
];
$newAppPage->setProps($props);

$newAppPage->setFromPath('../../layout/')->echoF();