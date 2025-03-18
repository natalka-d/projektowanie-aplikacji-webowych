<?php
// KONTROLER kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';

// Pobranie parametrów
$x = $_REQUEST['x']; // Kwota kredytu
$y = $_REQUEST['y']; // Oprocentowanie roczne
$operation = $_REQUEST['op']; // Okres kredytowania

// Walidacja parametrów
$messages = [];
if (!isset($x) || !isset($y) || !isset($operation)) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}
if ($x == "") {
    $messages[] = 'Nie podano kwoty kredytu.';
}
if ($y == "") {
    $messages[] = 'Nie podano oprocentowania.';
}
if (empty($messages) && (!is_numeric($x) || !is_numeric($y))) {
    $messages[] = 'Kwota kredytu i oprocentowanie muszą być liczbami.';
}

// Lista dostępnych okresów kredytowania
$terms = [
    '1 rok' => 12,
    '2 lata' => 24,
    '3 lata' => 36,
    '5 lat' => 60
];

if (!isset($terms[$operation])) {
    $messages[] = 'Niepoprawny okres kredytowania.';
}

// Obliczenia
if (empty($messages)) {
    $P = floatval($x);
    $r = floatval($y) / (12 * 100); // Miesięczna stopa procentowa
    $n = $terms[$operation]; // Liczba miesięcy

    if ($r > 0) {
        $result = ($P * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
    } else {
        $result = $P / $n; // Jeśli oprocentowanie 0%, rata to po prostu kwota podzielona na miesiące
    }
}

// Wywołanie widoku
include 'calc_view.php';
