<?php 
 // Smarty Template engine supports

 require_once('header.php');
 
 $array = array(
   'Jesse' => 25,
   'Joey' => 26,
   'Jenny' => 24,
   'Justine' => 23
 );

 $date = '2022-05-02';

 $name= 'Jesse';

 $smarty -> assign('name', $name);
 $smarty -> assign('date', $date);
 $smarty -> assign('people', $array);
 
 $smarty -> display('index.tpl');
?>