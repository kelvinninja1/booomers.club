<?php
    $dev_environment = true; //true //false
    $base_url = ($dev_environment) ? "http://localhost/booomers.club" : "";


//    $environment = "dev"; //dev //test //beta //prod
//    $base_url = ($environment == "http://localhost/booomers.club") ? "https://booomers.club" : "";
//    $base_url = ($environment == "prod") ? "https://booomers.club" : (($environment == "dev") ? "http://localhost/booomers.club" : "https://beta.booomers.club");

echo $base_url;
?>