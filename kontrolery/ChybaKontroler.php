<?php
class ChybaKontroler extends Kontroler {

  public function zpracuj($parametry) {
    header("HTTP/1.0 404 Not Found");
    $this->pohled = "chyba";
  }
  
}
?>