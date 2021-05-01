<?php
require ("../../frame.inc");

$basicPage = new Frame;
$basicPage->setTemplate("basicStates.phtml");
$propsTest = ["device"=> "unknown", "mode"=> "dark"];
$basicPage->setProps($propsTest);
$stateTest = ["You"=> "can", "list"=> "all", "states"=> "this", "way"=>0];
$basicPage->setState($stateTest);
$basicPage->echoF();