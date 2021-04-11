<?php

use Krauskeite\MyLog;
use Krauskeite\QuEquation;

/*include "core/core/EquationInterface.php";
include "core/core/LogAbstract.php";
include "core/core/LogInterface.php";
include "Krauskeite/MyLog.php";
include "Krauskeite/Equation.php";
include "Krauskeite/QuEquation.php";
include "Krauskeite/Exception.php";*/
require_once __DIR__ . './vendor/autoload.php';

ini_set("display_errors", 1);
error_reporting(-1);

try {
	if(!is_dir("log")) {
        mkdir("log", 0700);
    }
    MyLog::log("Версия программы: " . trim(file_get_contents('version')) );
    $b = new QuEquation();
    $values = array();

    for ($i = 1; $i < 4; $i++) {
        echo "Введите " . $i . " аргумент: ";
        $values[] = readline();
    }
    $va = $values[0];
    $vb = $values[1];
    $vc = $values[2];

    MyLog::log("Введено уравнение " . $va . "x^2 + " . $vb . "x + " . $vc . " = 0");
    $x = $b->solve($va, $vb, $vc);

    $str = implode(", ", $x);
    MyLog::log("Корни уравнения: " . $str);
} catch (Exception $e) {
    MyLog::log($e->getMessage());
}

MyLog::write();

?>