<?php

namespace App\Controllers\Components;

use App\Controllers\ProductController;
use Database\DBConnection;
use App\Models\Product;


class CardCompenent extends Product
{



    public function getDataByid($id_article)
    {
        return $this->getProductForCardbyID($id_article);
    }

    public function printCard(array $dataProduct)
    {
        $ProductControl= new ProductController();
        $likes = $ProductControl->getLike($dataProduct['id_article']);
        if(isset($i))
        {
            $id = 'id="card'.$i.'"';
        }
        else{
            $id = '';
        }
    ?>
        <a href="/boutique-en-ligne/produit/<?=$dataProduct['id_article']?>">
        <section class="card">
            <img <?=$id?> class="card__picture" src="/boutique-en-ligne/public/assets/pictures/pictures_product/<?=$dataProduct['image_article']?>" alt="">
            <?php if(isset($dataProduct['SPÉCIFICITÉ']) && in_array('Biologique',$dataProduct['SPÉCIFICITÉ'])==true):?>
                <img class="card__logoAb" src="/boutique-en-ligne/public/assets/pictures/pictures_product/kawa_logo_ab.png" alt="">
            <?php endif;?>
            <?php if($dataProduct['sku']==0):?>
                <img class="card__logonostock" src="/boutique-en-ligne/public/assets/pictures/pictures_product/kawa_vigne_nostock.png" alt="">
            <?php endif;?>
            <div class="card__info">
            <H4 class="card__like"><i class="fa-solid fa-thumbs-up"> </i><?=$likes?></H4>
                <div class="card__info__titre">
                <h3><?=$dataProduct['titre_article']?></h3>
                <h4><?=$dataProduct['prix_article']?>€</h4>
                </div>
                <p><?=$dataProduct['presentation_article']?></p>
                <?php if($dataProduct['sku']!==0):?>
                    <form action="" method="post">
                    <label for="addBasket"></label>
                    <input type="hidden" name="id_article" value="<?=$dataProduct['id_article']?>"></input>
                    <input type="hidden" name="prix_article" value="<?=$dataProduct['prix_article']?>"></input>
                    <button type="submit" id="addBasket" name="add" value="AJOUTER AU PANIER >"><i class="nav__icon fa-solid fa-cart-shopping"></i></button>
                    </form>
                <?php endif;?>
            </div>
        </section>
        </a>
    <?php
    }
}