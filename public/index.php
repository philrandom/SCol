<?php

    require_once "../f3il/f3il.php";
    f3il\Configuration::setConfigurationFile("../application/configuration.ini");

    $app = \f3il\Application::getInstance();
    $app->run();