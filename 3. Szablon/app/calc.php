<?php
// KONTROLER stronn kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smartn
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['ile'] = isset($_REQUEST['ile']) ? $_REQUEST['ile'] : null;
	$form['procent'] = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennnch dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwota']) && isset($form['ile']) && isset($form['procent']) ))	return false;	
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty kredytu';
	if ( $form['ile'] == "") $msgs [] = 'Nie podano ilości miesięcy';
	if ( $form['procent'] == "") $msgs [] = 'Nie podano oprocentowania';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {

		// sprawdzenie wartości czy są liczbami
	if ((! is_numeric( $form['kwota'] )) || (! is_numeric( $form['ile'] )) || (! is_numeric( $form['procent'] ))) {
		$msgs [] = 'TO NIE JEST LICZBA!';
	}
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na float
	$form['kwota'] = floatval($form['kwota']);
	$form['ile'] = floatval($form['ile']);
	$form['procent'] = floatval($form['procent']);
	
	$result = round(((($form['kwota'] * ($form['procent']*0.01))+$form['kwota'])/$form['ile']),2);
	
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Wylicz w łatwy sposób swoją ratę');
$smarty->assign('page_header','Kalkulator kredytowy');
$smarty->assign('page_footer','autor szablonu: Marta Skowronek PAW3');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wnwołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');