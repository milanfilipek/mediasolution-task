<h2>Editace záznamů v tabulce</h2>

<table>
    <thead>
        <?php 
            foreach ($sloupce_nazvy as $sloupec_nazev) {
                echo "<th>{$sloupec_nazev}</th>";
            }
        ?>
        <th>Editace</th>
    </thead>
    <tbody>
        <?php
            foreach($radky as $radek){
                echo "<tr>";
                for($i = 0; $i < count($sloupce_nazvy); $i++){
                    echo "<td>{$radek[$sloupce_nazvy[$i]]}</td>";
                }
                echo "<td>
                         <a href='editace-zaznamu/{$radek["pid"]}' class='editaceBtn'>Editovat</a>
                         <a href='generace-pdf/{$radek["pid"]}' class='generaceBtn'>GenerovatPDF</a>
                     </td>";
                echo "</tr>";
            } 
            ?>
    </tbody>
</table>