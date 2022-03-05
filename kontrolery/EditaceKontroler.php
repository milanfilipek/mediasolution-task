<?php
class EditaceKontroler extends Kontroler{

    public function zpracuj($parametry){
        $spravceProduktu = new SpravceProduktu;
        
        $this->data["sloupce_nazvy"] = $spravceProduktu->ziskejNazvy();
        $this->data["radky"] = $spravceProduktu->ziskejZaznamy();
        
        $this->pohled = "editace";
    }
}
?>