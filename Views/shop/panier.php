   <?php

    /*     if (!isset($_SESSION['quantite'])) {
        $_SESSION['quantite']['1'] = 1;
        $_SESSION['quantite']['2'] = 1;
        $_SESSION['quantite']['3'] = 1;
        $_SESSION['quantite']['4'] = 1;
    } */



    echo "<br>";
    echo "quantite";
    echo "<br>";
    var_dump($_SESSION['quantite']);
    echo "<br>";

    echo "<br>";

    var_dump($_SESSION['prix']);
    echo "<br>";
    ?>


   <p> c'est le panier </p>

   <br>
   <?php

    foreach ($articles as $key => $article) {

    ?>
       <?php var_dump($_SESSION['quantite'][$article['id_article']])  ?>
       <form action="" method="post">
           <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">
           <input name="prix_article" value="<?= $article['prix_article'] ?>" type="hidden">
           <button name="add" type="submit"> creer </button>
       </form>


       <form action="" method="post">
           <p> <?= $article['titre_article'] ?> </p>

           <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">


           <button name="upQuantity" value="1" type="submit"> + </button>
           <?php if ($_SESSION['quantite'][$article['id_article']] > 0) { ?>
               <button name="downQuantity" value="1" type="submit"> - </button>
           <?php } ?>

       </form>


   <?php }
    $resultat = 0;
    foreach ($_SESSION['quantite'] as $quantite) {
        $resultat = $resultat + $quantite;
    }
    ?>

   <p> nombre total d'articles : <?= $resultat ?> </p>

   <p>Prix total : <?= ($_SESSION['totalPrice'])  ?> </p>