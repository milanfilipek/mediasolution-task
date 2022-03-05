<?php
class ImportKontroler extends Kontroler {

    public function zpracuj($parametry){
        $spravceXML = new SpravceXML;
        
        if(isset($_POST["odeslat"])){
            if($_FILES["souborXML"]["type"] == "text/xml"){
                $filenameXML = $_FILES["souborXML"]["name"];
                $XMLdata = $spravceXML->parsujXML($filenameXML);
                $spravceXML->ulozDoDB($XMLdata);
                $this->presmeruj("uvod");
            }
            else{
                $this->pridejZpravu("Byl vybran spatny soubor!");
            }
        }

        $this->pohled = "import";
    }
}
?>