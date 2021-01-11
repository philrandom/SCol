<?php

    require_once "../f3il/f3il.php";
    require_once "../phpGrid/conf.php";
    f3il\Configuration::setConfigurationFile("../application/configuration.ini");

    $app = \f3il\Application::getInstance();
    $app->run();