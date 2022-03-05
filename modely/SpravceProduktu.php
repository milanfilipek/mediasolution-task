<?php
class SpravceProduktu{

    public function ziskejNazvy(){
        $vysledek = Db::dotazVsechny("SHOW COLUMNS FROM produkty");

        $sloupce_nazvy = [];
        foreach($vysledek as $sloupec) {
            $sloupce_nazvy[] = $sloupec["Field"];
        }

        return $sloupce_nazvy;
    }

    public function ziskejZaznamy(){
        $radky = Db::dotazVsechny("SELECT * FROM produkty;");

        return $radky;
    }

    public function upravZaznam($zaznam){
        Db::zmen("produkty", $zaznam, "WHERE pid = ?", [$zaznam["pid"]]);
    }
}
?>