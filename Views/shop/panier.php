   <?php

    if (!isset($_SESSION['fk_id_utilisateur'])) {
        $_SESSION['fk_id_utilisateur'] = 1;
    }



    echo "<br>";
    echo "quantite";
    echo "<br>";
    var_dump($_SESSION['quantite']);
    echo "<br>";

    echo "<br>";

    var_dump($_SESSION['prix']);
    echo "<br>";


    var_dump($_SESSION['singlePrice']);
    ?>


   <p> c'est le panier </p>

   <?php if (isset($_SESSION['flash'])) : ?>
       <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
           <div><?= $message; ?></div>
       <?php endforeach; ?>
   <?php endif; ?>

   <br>
   <?php

    foreach ($articles as $article) { ?>


       <?php
        if (isset($_SESSION['quantite'])) { ?>
           <form action="" method="post">

               <p> <?= $article['titre_article'] ?> </p>
               <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">
               <button name="upQuantity" value="1" type="submit"> + </button>
           <?php } ?>

           <?php if ($_SESSION['quantite'][$article['id_article']] > 0) { ?>
               <button name="downQuantity" value="1" type="submit"> - </button>
           </form>
       <?php } ?>
       <p>Nombre : <?= $_SESSION['quantite'][$article['id_article']]  ?></p>


       <form action="" method="post">
           <button name="add" type="submit"> creer </button>
           <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">
           <input name="prix_article" value="<?= $article['prix_article'] ?>" type="hidden">

       </form>

       <?php if (isset($_SESSION['quantite'][$article['id_article']])) { ?>

           <form action="" method="post">
               <button name="deleteProduct" type="submit"> supprimer article </button>
               <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">
           </form>

       <?php } ?>

       <p>prix : <?php if (isset($_SESSION['singlePrice'][$article['id_article']])) {
                        echo $_SESSION['singlePrice'][$article['id_article']];
                    }  ?></p>


   <?php }
    $resultat = 0;
    foreach ($_SESSION['quantite'] as $quantite) {
        $resultat = $resultat + $quantite;
    }
    ?>

   <p> nombre total d'articles : <?= $resultat ?> </p>

   <p>Prix total : <?php echo $_SESSION['totalPrice']  ?> </p>

   <form action="./commande/<?= $_SESSION['fk_id_utilisateur'] ?>" method="post">
       <input name="fk_id_utilisateur" value="$_SESSION['fk_id_utilisateur']" type="hidden">
       <input name="checkout" value="commandé" type="submit">
   </form>