<?php
   require "init.php";
   
   $smerovac = new SmerovacKontroler();
   if($_SERVER["REQUEST_URI"] !== "/export" && strpos($_SERVER["REQUEST_URI"], "generace-pdf") == false){
      $smerovac->zpracuj(array($_SERVER["REQUEST_URI"]));
      $smerovac->vypisPohled();
   }
   else if(strpos($_SERVER["REQUEST_URI"], "generace-pdf") !== false){
      $spPDF = new SpravcePDF;
      $spPDF->vytvorPDF();
   }
   else{
      $spXML = new SpravceXML;
      $spXML->zobrazXML();
   }
?>