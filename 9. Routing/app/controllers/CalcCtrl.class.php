<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->ile = getFromRequest('ile');
		$this->form->procent = getFromRequest('procent');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->ile ) && isset ( $this->form->procent ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->ile == "") {
			getMessages()->addError('Nie podano ilości miesięcy');
		}
		if ($this->form->procent == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if ((! is_numeric( $this->form->kwota )) || (! is_numeric( $this->form->ile )) || (! is_numeric( $this->form->procent ))) {
				getMessages()->addError('TO NIE JEST LICZBA!');
			}
			
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->ile = intval($this->form->ile);
			$this->form->procent = intval($this->form->procent);
			getMessages()->addInfo('Parametry poprawne.');
			
			//$this->result->result = round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2);
			
			if($this->form->ile>12){
				if (inRole('admin')) {
					$this->result->result = round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2);
				}else{
					getMessages()->addError('Nie można obliczyć miesięcznej raty dla kredytu trwającego dłużej niż rok.');
				}
			}else{
				$this->result->result = round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2);
			}
			
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze kredytowym');
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	
	public function generateView(){
		
		getSmarty()->assign('user',unserialize($_SESSION['user']));
		
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_description','Wylicz w łatwy sposób swoją ratę');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
		getSmarty()->assign('page_footer','autor szablonu: Marta Skowronek PAW3');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); // już nie podajemy pełnej ścieżki - foldery widoków są zdefiniowane przy ładowaniu Smarty
	}
}
