<?php
require ("../../frame.inc");

$nestedPage = new Frame;
$nestedPage->setTemplate("nested.phtml");
$innerTest = ['inner'=>"parts/inner.phtml",'more'=>"parts/moreInner.phtml"];
$nestedPage->setInnerTemplates($innerTest);

$nestedPage->echoF();
