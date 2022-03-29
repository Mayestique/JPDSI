<?php
/* Smarty version 4.1.0, created on 2022-03-28 23:15:19
  from 'C:\xampp\htdocs\Zajecia\Zajecia4\Moje_pliki\Obiektowosc\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62422567cf5594_71105544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '103bfb573d2dadfdb785e3f37ca19d94fbc961d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Zajecia\\Zajecia4\\Moje_pliki\\Obiektowosc\\app\\calc.html',
      1 => 1648395343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62422567cf5594_71105544 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_167611312262422567c3ac00_35711176', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184627688162422567c3c579_36055926', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_167611312262422567c3ac00_35711176 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_167611312262422567c3ac00_35711176',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_184627688162422567c3c579_36055926 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_184627688162422567c3c579_36055926',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<center><h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
	<fieldset>
		<label>Kwota kredytu: </label>
		<input type="text" placeholder="Kwota kredytu" name="kwota" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kwota'];?>
">
		
		<label>Oprocentowanie: </label>
		<input type="text" placeholder="Oprocentowanie" name="procent" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['procent'];?>
">
		
		<label>Liczba miesięcy: </label>
		<input type="text" placeholder="Liczba miesięcy" name="ile" style="width: 500px;" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['ile'];?>
">
	</fieldset>
	<button type="submit" id="oblicz" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
	<h4>Miesięczna rata:</h4>
	<p class="res">
			<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>

</div></center>

<?php
}
}
/* {/block 'content'} */
}
