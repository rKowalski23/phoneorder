<?php 
class phoneorder
{ 
    function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this, $f = '__construct' . $i)) { 
            call_user_func_array(array($this, $f), $a); 
        } 
    } 

    function get_input_vars()
    {
    global $_SERVER, $_POST,$_GET;
    $vars = $_POST ;
    foreach ($vars as $k=>$v){
        if (is_array($v)) continue;
        if (get_magic_quotes_gpc()) $v = stripslashes($v);
        $vars[$k] = trim($v);
    }
    $vars2 = $_GET ;
    foreach ($vars2 as $k=>$v)
    {
        if (is_array($v)) continue;
        if (get_magic_quotes_gpc()) $v = stripslashes($v);
        $vars[$k] = trim($v);
    }
    return $vars;
    }   
   
    function __construct1($a1) 
    { 
        echo('Order with following accessory added on: ' . $a1 . PHP_EOL); 
    } 
    
    function __construct2($a1,$a2) 
    { 
        echo('Order with following accessories added on: ' . $a1 . ',' . $a2 . PHP_EOL); 
    } 
    
    function __construct3($a1,$a2,$a3) 
    { 
        echo('Order with following accessories added on: ' . $a1 . ',' . $a2 . ',' . $a3 . PHP_EOL); 
    } 
} 

$vars=get_input_vars();

switch($vars['action']){

    case "order":{
      $e=trim($vars['accessory1']);
      $p=trim($vars['accessory2']);
      $s=trim($vars['accessory3']);
      
      setcookie("a_accessory1", $e, time()+6600);
      setcookie("a_accessory2", $p, time()+6600);
      setcookie("a_accessory3", $s, time()+6600);
      header("location: index.php");
      exit;
    exit;
    }   
}break;




$o = new A($e, $p, $s); 
/*
$o = new A('headphones');
$o = new A('headphones','car charger'); 
$o = new A('headphones','car charger','screen protector'); 
*/
?>