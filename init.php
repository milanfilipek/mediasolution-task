<?php
  session_start();

  function nactiTridu($trida) {
    if (preg_match("/Kontroler$/", $trida))
      require("kontrolery/$trida.php"); 
    else
      require("modely/$trida.php");
  }
  spl_autoload_register("nactiTridu");
     
  Db::pripoj("localhost", "root", "", "mediasolution-task");   
?>