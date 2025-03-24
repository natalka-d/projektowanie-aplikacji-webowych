<?php
require_once dirname(__FILE__) . '/../config.php';

// Pobranie parametrów
$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;

// Walidacja i obliczenia
$messages = [];
$result = null;

if (!(isset($x) && isset($y) && isset($operation))) {
    // Brak danych - wyświetl tylko widok
    include _ROOT_PATH . '/app/calc_view.php';
    exit;
}

if ($x == "") $messages[] = 'Nie podano kwoty kredytu.';
if ($y == "") $messages[] = 'Nie podano oprocentowania.';
if (!is_numeric($x) || !is_numeric($y)) {
    $messages[] = 'Kwota kredytu i oprocentowanie muszą być liczbami.';
}

if (empty($messages)) {
    $terms = ['1 rok' => 12, '2 lata' => 24, '3 lata' => 36, '5 lat' => 60];
    if (!isset($terms[$operation])) {
        $messages[] = 'Niepoprawny okres kredytowania.';
    } else {
        $P = floatval($x);
        $r = floatval($y) / (12 * 100);
        $n = $terms[$operation];
        if ($r > 0) {
            $result = ($P * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        } else {
            $result = $P / $n;
        }
    }
}

include _ROOT_PATH . '/app/calc_view.php';
?>