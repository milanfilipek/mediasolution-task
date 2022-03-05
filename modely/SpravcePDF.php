<?php

require_once __DIR__ . '/mPDF/vendor/autoload.php';
use Mpdf\Mpdf;

class SpravcePDF{

    public function vytvorPDF(){
        $mpdf = new mPDF();    

        $idZaznamu = $_SERVER["REQUEST_URI"];
        $idZaznamu = trim($idZaznamu, "/generace-pdf/");
        
        $spProd = new SpravceProduktu;
        $sloupce_nazvy = $spProd->ziskejNazvy();

        $zaznam = Db::dotazJeden("SELECT * FROM produkty WHERE PID LIKE {$idZaznamu}");
        
        $formatovanyNadpis = "<p style='font-weight: bold;font-size:22px;'>". $zaznam["product_name"] ."</p>";
        $mpdf->WriteHTML($formatovanyNadpis);

        foreach($sloupce_nazvy as $sloupec_nazev){
            if(strpos($sloupec_nazev, "extra_message") !== false && !empty($zaznam[$sloupec_nazev]))
                $mpdf->WriteHTML("<b>" . $sloupec_nazev . ":</b> " . strval($zaznam[$sloupec_nazev]));
            else if(strpos($sloupec_nazev, "product_name") === false && strpos($sloupec_nazev, "pid") === false) 
                $mpdf->WriteHTML("<b>" . $sloupec_nazev . ":</b> " . strval($zaznam[$sloupec_nazev]));
        }

        $mpdf->Output();
    }   
}
?>