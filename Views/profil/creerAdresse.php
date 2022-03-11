<section>
    <img src="../public/img/Icon_Profil-test.png" alt="profil picture">
    <h2>Profil</h2>
    <ul>
        <li><a href="./modifierProfil">Modifier mon profil</a></li>
        <li><a href="./modifierMotdePasse">Modifier mon mot de passe</a></li>
        <li><a href="./adresse">Adresse de livraison</a></li>
        <li><a href="./historiqueCommande">Historique de commande</a></li>
        <li><a href="./deconnexion">Se deconnecter</a></li>
    </ul>
</section>
<article>
    <form action="" method="post">
        <label for="nomAdresse">Nom de l'enregistrement : </label>
        <input type="text" id="nomAdresse" name="nomAdresse" aria-required="true">

        <h2>Destinataire</h2>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" aria-required="true">

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" aria-required="true">

        <h2>Adresse</h2>

        <label for="libelle">Libellé : </label>
        <input type="text" id="libelle" name="libelle" aria-required="true">

        <label for="voieSup">Voie Sup : </label>
        <input type="text" id="voieSup" name="voieSup" aria-required="true">

        <label for="codePostal">Code Postal : </label>
        <input type="number" id="codePostal" name="codePostal" aria-required="true">

        <label for="ville">Ville : </label>
        <input type="text" id="ville" name="ville" aria-required="true">

        <label for="pays">Pays : </label>
        <input type="text" id="pays" name="pays" aria-required="true">

        <label for="telephone">Telephone : </label>
        <input type="number" id="telephone" name="telephone" aria-required="true">


        <input type="submit" name="submit" value="Ajouter">
    </form>
</article>