<h1>page accueil</h1>


<p> Main accueil</p>

<?php foreach ($find as $value) { ?>

    <a href="./exempleid/<?= $value['id_article'] ?>"> lien."<?= $value['id_article'] ?>"
    </a>

<?php } ?>