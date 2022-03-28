<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.


//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów
function getParams(&$kwota,&$ile,&$procent){
$kwota = isset($_REQUEST ['kwota']) ? $_REQUEST['kwota'] : null;
$ile = isset($_REQUEST ['ile']) ? $_REQUEST['ile'] : null;
$procent = isset($_REQUEST ['procent']) ? $_REQUEST['procent'] : null;
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$ile,&$procent,&$messages){
	
// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($ile) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	return false;
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
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie wartości czy są liczbami
	if ((! is_numeric( $kwota )) || (! is_numeric( $ile )) || (! is_numeric( $procent ))) {
		$messages [] = 'TO NIE JEST LICZBA!';
	}
	
	if (count ( $messages ) != 0) return false;
	else return true;
}

// 3. wykonaj zadanie jeśli wszystko w porządku
	
function process(&$kwota,&$ile,&$procent,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na float
	$kwota = floatval($kwota);
	$ile = floatval($ile);
	$procent = floatval($procent);
	
	//wykonanie operacji z zaokrągleniem do dwóch miejsc po przecinku (funkcja round).
	if($ile>12){
		if ($_SESSION['role'] == 'admin') {
			$result = round(((($kwota * ($procent*0.01))+$kwota)/$ile),2);
		}else{
			$messages [] = 'Nie można obliczyć miesięcznej raty dla kredytu trwającego dłużej niż rok.';
		}
	}else{
		$result = round(((($kwota * ($procent*0.01))+$kwota)/$ile),2);
	}	

}

//definicja zmiennych kontrolera
$kwota = null;
$ile = null;
$procent = null;
$result = null;
$rola = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$ile,$procent);
if (validate ($kwota,$ile,$procent,$messages)) { // gdy brak błędów
	process ($kwota,$ile,$procent,$messages,$result);
}


// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';