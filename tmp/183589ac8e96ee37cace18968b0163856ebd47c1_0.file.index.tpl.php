<?php
/* Smarty version 4.1.0, created on 2022-05-02 14:13:18
  from 'C:\xampp\htdocs\Fullstack_kehittaminen\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626fcade644e96_33726898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '183589ac8e96ee37cace18968b0163856ebd47c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Fullstack_kehittaminen\\views\\index.tpl',
      1 => 1651493597,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626fcade644e96_33726898 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Fullstack_kehittaminen\\smarty-4.1.0\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
Hello

<br />



<?php echo $_smarty_tpl->tpl_vars['name']->value;?>


<table>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p', false, 'k');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<tr style="background: <?php echo smarty_function_cycle(array('values'=>'silver, gray'),$_smarty_tpl);?>
">
  <td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
