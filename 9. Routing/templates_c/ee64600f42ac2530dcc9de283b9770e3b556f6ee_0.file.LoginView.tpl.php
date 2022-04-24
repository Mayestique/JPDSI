<?php
/* Smarty version 4.1.0, created on 2022-04-12 08:26:14
  from 'C:\xampp\htdocs\Zajecia\Zajecia6\Moje_pliki\Ochrona_dostepu\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62551b8600dc18_36245613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee64600f42ac2530dcc9de283b9770e3b556f6ee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zajecia\\Zajecia6\\Moje_pliki\\Ochrona_dostepu\\app\\views\\LoginView.tpl',
      1 => 1649744769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_62551b8600dc18_36245613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172801217062551b86003134_24627502', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_172801217062551b86003134_24627502 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_172801217062551b86003134_24627502',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<center><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" style="width: 500px;"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" style="width: 500px;"/><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary" style="width: 200px;"/>
		</div>
	</fieldset>
</form></center>	

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block 'content'} */
}
