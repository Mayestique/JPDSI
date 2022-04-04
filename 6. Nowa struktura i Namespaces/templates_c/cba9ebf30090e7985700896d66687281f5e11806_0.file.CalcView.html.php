<?php
/* Smarty version 4.1.0, created on 2022-04-04 23:42:37
  from 'C:\xampp\htdocs\Zajecia\Zajecia5\Moje_pliki\Namespaces\app\views\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_624b664da579d5_30172801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba9ebf30090e7985700896d66687281f5e11806' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zajecia\\Zajecia5\\Moje_pliki\\Namespaces\\app\\views\\CalcView.html',
      1 => 1648629534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_624b664da579d5_30172801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_419850210624b664d84f6d9_25094385', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_485329251624b664d851a40_45132312', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_419850210624b664d84f6d9_25094385 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_419850210624b664d84f6d9_25094385',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_485329251624b664d851a40_45132312 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_485329251624b664d851a40_45132312',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<center><h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
	<fieldset>
		<label>Kwota kredytu: </label>
		<input type="text" placeholder="Kwota kredytu" name="kwota" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">
		
		<label>Oprocentowanie: </label>
		<input type="text" placeholder="Oprocentowanie" name="procent" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->procent;?>
">
		
		<label>Liczba miesięcy: </label>
		<input type="text" placeholder="Liczba miesięcy" name="ile" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ile;?>
">
	</fieldset>
	<button type="submit" id="oblicz" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<?php echo $_smarty_tpl->tpl_vars['err']->value;?>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<?php echo $_smarty_tpl->tpl_vars['inf']->value;?>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Miesięczna rata:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>


</div></center>

<?php
}
}
/* {/block 'content'} */
}
