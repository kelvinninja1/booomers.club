<?php
require ("../../frame.inc");
require ("AppPage/AppPage.module");

$newPage = new Frame();
$states = ['page' => "ModularDemo"];
$newPage->setState($states);
$newPage->setTemplate("modular.phtml");
$newAppPage = new AppPage();
$newAppPage->setContent($newPage->export());
$newAppPage->setFromPath('AppPage/')->echoF();
