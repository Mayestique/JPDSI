<?php

namespace app\controllers;

use app\forms\PersonEditForm;
use DateTime;
use PDOException;

class PersonEditCtrl {

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new PersonEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		$this->form->name = getFromRequest('name',true,'Błędne wywołanie aplikacji2');
		$this->form->surname = getFromRequest('surname',true,'Błędne wywołanie aplikacji3');
		$this->form->kwota = getFromRequest('kwota',true,'Błędne wywołanie aplikacji4');
		$this->form->procent = getFromRequest('procent',true,'Błędne wywołanie aplikacji5');
		$this->form->ile = getFromRequest('ile',true,'Błędne wywołanie aplikacji6');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->name))) {
			getMessages()->addError('Wprowadź imię');
		}
		if (empty(trim($this->form->surname))) {
			getMessages()->addError('Wprowadź nazwisko');
		}
		if (empty(trim($this->form->kwota))) {
			getMessages()->addError('Wprowadź kwotę kredytu');
		}
		if (empty(trim($this->form->procent))) {
			getMessages()->addError('Wprowadź oprocentowanie');
		}
		if (empty(trim($this->form->ile))) {
			getMessages()->addError('Wprowadź ilość miesięcy');
		}

		if ( getMessages()->isError() ) return false;
		
		// 2. sprawdzenie poprawności przekazanych parametrów
		
		/*$d = DateTime::createFromFormat('Y-m-d', $this->form->birthdate);
		if ( $d === false ){
			getMessages()->addError('Zły format daty. Przykład: 2015-12-20');
		}*/
		
		return ! getMessages()->isError();
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy osób (parametr jest wymagany)
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_personNew(){
		$this->generateView();
	}
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_personEdit(){
		// 1. walidacja id osoby do edycji
		if ( $this->validateEdit() ){
			try {
				// 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("person", "*",[
					"idperson" => $this->form->id
				]);
				// 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
				$this->form->id = $record['idperson'];
				$this->form->name = $record['name'];
				$this->form->surname = $record['surname'];
				$this->form->kwota = $record['kwota'];
				$this->form->procent = $record['procent'];
				$this->form->ile = $record['ile'];
				$this->form->resultCredit = $record['resultCredit'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		
		// 3. Wygenerowanie widoku
		$this->generateView();		
	}

	public function action_personDelete(){		
		// 1. walidacja id osoby do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("person",[
					"idperson" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy osób
		forwardTo('personList');		
	}

	public function action_personSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("person");
					if ($count <= 20) {
						getDB()->insert("person", [
							"name" => $this->form->name,
							"surname" => $this->form->surname,
							"kwota" => $this->form->kwota,
							"procent" => $this->form->procent,
							"ile" => $this->form->ile,
							"resultCredit" => round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2)
							//result->result = round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2);
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("person", [
						"name" => $this->form->name,
						"surname" => $this->form->surname,
						"kwota" => $this->form->kwota,
						"procent" => $this->form->procent,
						"ile" => $this->form->ile,
						//"resultCredit" => $this->form->credit+round((($this->form->credit * $this->form->interest *($this->form->months + 1))/2400),2)
						"resultCredit" => round(((($this->form->kwota * ($this->form->procent*0.01))+$this->form->kwota)/$this->form->ile),2)
					], [ 
						"idperson" => $this->form->id
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
			forwardTo('personList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		
		getSmarty()->assign('user',unserialize($_SESSION['user']));
		
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_description','Wylicz w łatwy sposób swoją ratę');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
		getSmarty()->assign('page_footer','autor szablonu: Marta Skowronek PAW3');
		
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('CalcView.html');
	}
}
?>