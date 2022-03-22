<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$ile = $_REQUEST ['ile'];
$procent = $_REQUEST ['procent']*0.01;

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($ile) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kredytu.';
}
if ( $ile == "") {
	$messages [] = 'Nie podano ilości miesięcy.';
}
if ( $procent == "") {
	$messages [] = 'Nie podano oprocentowania.';
}
 
//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie wartości czy są liczbami
	if ((! is_numeric( $kwota )) || (! is_numeric( $ile )) || (! is_numeric( $procent ))) {
		$messages [] = 'TO NIE JEST LICZBA!';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na float
	$kwota = floatval($kwota);
	$ile = floatval($ile);
	$procent = floatval($procent);
	
	//wykonanie operacji z zaokrągleniem do dwóch miejsc po przecinku (funkcja round).
	$result = round(((($kwota * $procent)+$kwota)/$ile),2);
}

// 4. Wywołanie widoku z przekazaniem zmiennych

include 'calc_view.php';