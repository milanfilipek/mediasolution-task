<!DOCTYPE html>
<html lang='cs-CZ'>
  <head>
    <title>Produkty</title>
    <meta charset='utf-8'>
    <base href="/">
    <link rel="stylesheet" href="../css/styl.css">
  </head>
  <body>     
    <header>
      <h1>Produkty</h1>
    </header>

    <section class="zpravy">
      <?php foreach($zpravy as $zprava) { ?>
        <div><?= $zprava ?></div>
      <?php } ?>
    </section> 
     
    <main>
      <?php
        $this->kontroler->vypisPohled();      
      ?>
    </main>
  </body>
</html>