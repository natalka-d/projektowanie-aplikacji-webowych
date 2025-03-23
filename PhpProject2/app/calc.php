<?php

require_once dirname(__FILE__) . '/../config.php';
include _ROOT_PATH . '/app/security/check.php'; // Ochrona kontrolera

// Pobranie parametrów
function getParams(&$x, &$y, &$operation) {
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
    $y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
    $operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

// Walidacja parametrów
function validate(&$x, &$y, &$operation, &$messages) {
    if (!(isset($x) && isset($y) && isset($operation))) {
        return false; // Brak parametrów - nie wykonujemy obliczeń
    }
    if ($x == "") $messages[] = 'Nie podano kwoty kredytu.';
    if ($y == "") $messages[] = 'Nie podano oprocentowania.';
    if (count($messages) > 0) return false;

    if (!is_numeric($x) || !is_numeric($y)) {
        $messages[] = 'Kwota kredytu i oprocentowanie muszą być liczbami.';
        return false;
    }
    return true;
}

// Obliczenia
function process(&$x, &$y, &$operation, &$messages, &$result) {
    $terms = ['1 rok' => 12, '2 lata' => 24, '3 lata' => 36, '5 lat' => 60];
    if (!isset($terms[$operation])) {
        $messages[] = 'Niepoprawny okres kredytowania.';
        return;
    }

    $P = floatval($x);
    $r = floatval($y) / (12 * 100); // Miesięczna stopa procentowa
    $n = $terms[$operation]; // Liczba miesięcy

    if ($r > 0) {
        $result = ($P * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
    } else {
        $result = $P / $n;
    }
}

// Definicja zmiennych
$x = null;
$y = null;
$operation = null;
$result = null;
$messages = [];

// Wykonanie
getParams($x, $y, $operation);
if (validate($x, $y, $operation, $messages)) {
    process($x, $y, $operation, $messages, $result);
}

include 'calc_view.php';
?>