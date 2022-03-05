<?php
class SpravceXML{

    public function parsujXML($filenameXML){
        $data = simplexml_load_file($filenameXML) or die("Chyba:Nepodarilo se vytvorit objekt s XML daty.");
        return $data;
    }

    public function ulozDoDB($XMLdata){
        foreach($XMLdata->children() as $produkt){
            if (!isset($produkt->EXTRA_MESSAGE)){
                $values = [ intval($produkt->EAN), strval($produkt->PRODUCTNO), strval($produkt->ITEM_ID), strval($produkt->PRODUCTNAME), strval($produkt->PRODUCT), strval($produkt->MANUFACTURER),
                            strval($produkt->DESCRIPTION), strval($produkt->URL), strval($produkt->IMGURL), intval($produkt->DELIVERY_DATE), strval($produkt->CATEGORYTEXT), intval($produkt->PRICE_VAT)];
                
                $sql = "INSERT INTO produkty
                        (ean, product_no, item_id, product_name, product, manufacturer, description, url , imgurl, delivery_date, category_text, price_vat) 
                        VALUES (";
            }
            else{
                $values = [ intval($produkt->EAN), strval($produkt->PRODUCTNO), strval($produkt->ITEM_ID), strval($produkt->PRODUCTNAME), strval($produkt->PRODUCT), strval($produkt->MANUFACTURER),
                            strval($produkt->DESCRIPTION), strval($produkt->URL), strval($produkt->IMGURL), intval($produkt->DELIVERY_DATE), strval($produkt->CATEGORYTEXT), intval($produkt->PRICE_VAT), strval($produkt->EXTRA_MESSAGE)];
                
                $sql = "INSERT INTO produkty
                        (ean, product_no, item_id, product_name, product, manufacturer, description, url , imgurl, delivery_date, category_text, price_vat, extra_message) 
                        VALUES (";
            }
            
            Db::dotaz($sql . str_repeat("?,", sizeOf($values) - 1) . "?)",  array_values($values));
        }
    }

    public function vytvorCDATA($novyChild, $dataZeZaznamu){
        $child = dom_import_simplexml($novyChild);
        $cdata = $child->ownerDocument->createCDATASection($dataZeZaznamu);
        $child->appendChild($cdata);
    }

    public function zobrazXML(){
        $produkty = Db::dotazVsechny("SELECT * FROM produkty");
 
        $xml = new SimpleXMLElement("<SHOP></SHOP>");
        
        foreach($produkty as $produkt) {
            $shopitem = $xml->addChild("SHOPITEM");
            self::vytvorCDATA($shopitem->addChild("PRODUCTNAME"), $produkt["product_name"]);
            self::vytvorCDATA($shopitem->addChild("PRODUCT"), $produkt["product"]);
            $shopitem->addChild("MANUFACTURER", $produkt["manufacturer"]);
            self::vytvorCDATA($shopitem->addChild("DESCRIPTION"), $produkt["description"]);
            $shopitem->addChild("URL", $produkt["url"]);
            $shopitem->addChild("IMGURL", $produkt["imgurl"]);
            $shopitem->addChild("DELIVERY_DATE", $produkt["delivery_date"]);
            self::vytvorCDATA($shopitem->addChild("CATEGORYTEXT"), $produkt["category_text"]);
            $shopitem->addChild("PRICE_VAT", $produkt["price_vat"]);
            if ($produkt["ean"] !== 0) $shopitem->addChild("EAN", $produkt["ean"]);
            $shopitem->addChild("ITEM_ID", $produkt["item_id"]);
            $shopitem->addChild("PRODUCTNO", $produkt["product_no"]);
            if ($produkt["extra_message"] !== NULL)  $shopitem->addChild("EXTRA_MESSAGE", $produkt["extra_message"]);
        }

        Header('Content-type: text/xml');
        echo $xml->asXML();
    }
}
?>