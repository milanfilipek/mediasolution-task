<?php
class EditaceZaznamuKontroler extends Kontroler{

    public function zpracuj($parametry){
        $spravceProduktu = new SpravceProduktu;

        $this->data["sloupce_nazvy"] = $spravceProduktu->ziskejNazvy();
        $this->data["zaznam"] = Db::dotazJeden("SELECT * FROM produkty WHERE PID LIKE {$parametry[0]}");

        if(!empty($_POST["pid"])){
            $spravceProduktu->upravZaznam($_POST);
            $this->pridejZpravu("Produkt byl úspěšně editován.");
            $this->presmeruj("editace");
        }

        $this->pohled = "editaceZaznamu";
    }

}
?>