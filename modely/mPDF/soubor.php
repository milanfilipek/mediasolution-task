<?php
  session_start();
?>

<!doctype html>
<html lang="cs-CZ">
  <head>    
    <meta charset="utf-8">
    <title>12 - Práce se soubory</title>
  </head>
  
  <body>
    <?php
        if(isset($_SESSION['uzivatel'])){
          echo "<p>Přihlášen: ". $_SESSION['uzivatel']['prijmeni'] ." ". $_SESSION['uzivatel']['prijmeni'] . "</p>";
          echo "<a href='logout.php'>Odhlásit se</a>";
        }
        else{
          echo "<a href='login.php'>Přihlásit se</a>";
        }

        $dir = "dokumenty";
        if(!file_exists($dir)){
          mkdir($dir);
        }
        

        $allowedTypes = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/pdf", "text/plain"];
        if(isset($_POST["odeslat"])){
          print_r($_FILES);
          if(in_array($_FILES['file']['type'], $allowedTypes)){
            if($_FILES['file']['size'] <= 1024*1024){
              move_uploaded_file($_FILES['file']['tmp_name'], $dir."/".$_FILES['file']['name']);
            }
            else{
              echo "<p>Soubor je příliš velký</p>";
            }
          }
          else{
            echo "<p>Nepovolený formát souboru.</p>";
          }
        }

        $nameArr = [];
        $currDir = opendir($dir);
        while(($filename = readdir($currDir)) !== false){
          if(!in_array($filename, [".", ".."])){
            $nameArr[] = $filename;
          }
        }
    ?>

<?php if(isset($_SESSION['uzivatel'])){ ?>
    <h2>Nahrávání souborů</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <input type="file" name="file" accept="<?= implode(",", $allowedTypes) ?>">
        <input type="submit" name="odeslat" value="Nahrát soubor">
    </form>
<?php } ?>

    <ul>
        <?php
          foreach ($nameArr as $name) {
        ?>
          <li><a href="<?= $dir."/".$name ?>"><?= $name ?></a></li>      
        <?php
          }
        ?>
    </ul>

  </body>
</html>