<h2>Editace záznamu</h2>

<form method='post' class='zaznam-info'>
<?php
  foreach ($sloupce_nazvy as $sloupec_nazev) {
    echo "<div>";
      echo "<label for='{$sloupec_nazev}'>{$sloupec_nazev}</label>";
      echo "<input type='text' name='{$sloupec_nazev}' id='{$sloupec_nazev}' value='{$zaznam[$sloupec_nazev]}'>";
    echo "</div>";	
  }
  echo "<input type='submit' value='Uložit' class='submitBtn'>";
?>
</form>