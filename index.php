<?php 
    require_once(dirname(__FILE__) . '/config/config.php');
    require_once(dirname(__FILE__) . '/models/Clube.php');

    $clube = Clube::getResultSetFromSelect();
    print_r($clube);