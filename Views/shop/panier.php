   <?php
    echo "<pre>";
    var_dump($_SESSION['quantityPayment']);
    echo "</pre>";

    if (!isset($_SESSION['id_utilisateur'])) {
        $_SESSION['id_utilisateur'] = 1;
    }

    ?>

   <?php if (!empty($_SESSION['quantite'])) { ?>
       <p> c'est le panier </p>

       <?php if (isset($_SESSION['flash'])) : ?>
           <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
               <div><?= $message; ?></div>
           <?php endforeach; ?>
       <?php endif; ?>
       <?php if (isset($_SESSION['flash'])) :  ?>
           <?php unset($_SESSION['flash']) ?>
       <?php endif; ?>


       <?php
        //affiche uniquement les articles selectionnés par l'utilisateur
        foreach ($articles as $article) {
            foreach ($_SESSION['quantite'] as $key => $value) {
                if ($article['id_article'] == $key) {
        ?>

                   <form action="" method="post">

                       <p> <?= $article['titre_article'] ?> </p>
                       <input name="id_article" value="<?= $article['id_article'] ?>" type="hidden">
                       <button name="upQuantity" value="1" type="submit"> + </button>


                       <?php if ($_SESSION['quantite'][$article['id_article']] > 0) { ?>
                           <button name="downQuantity" value="1" type="submit"> - </button>
                   </form>
               <?php } ?>
               <p>Nombre : <?= $_SESSION['quantite'][$article['id_article']]  ?></p>


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
            }
        } ?>

   <p> nombre total d'articles : <?php echo $_SESSION['totalQuantity'] ?> </p>

   <p>Prix total : <?= $_SESSION['totalPrice'] ?></p>

   <form action="./commande" method="post">

       <input name="checkout" value="commandé" type="submit">
   </form>

   <?php } else { ?>
       <p>Votre panier est vide.</p>
   <?php
    } ?>