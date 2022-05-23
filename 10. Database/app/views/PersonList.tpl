{extends file="main.tpl"}

{block name=top}

<center><div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}personList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" style="width: 500px;" value="{$searchForm->surname}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
		<a class="pure-button button-success" href="{$conf->action_root}calcShow">Kalkulator kredytowy</a>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}
<br>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>ID</th>
		<th>imię</th>
		<th>nazwisko</th>
		<th>Kwota kredytu</th>
		<th>Ilość miesięcy</th>
		<th>Oprocentowanie</th>
		<th>Wynik</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["idperson"]}</td>
		<td>{$p["name"]}</td>
		<td>{$p["surname"]}</td>
		<td>{$p["kwota"]}</td>
		<td>{$p["ile"]}</td>
		<td>{$p["procent"]}</td>
		<td>{$p["resultCredit"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEdit&id={$p['idperson']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}personDelete&id={$p['idperson']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
</center>
{/block}
