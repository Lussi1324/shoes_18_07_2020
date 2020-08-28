<?php
require_once dirname(__FILE__).'/../home/header_profile.php';
/** @var \App\Data\FullOfferDTO $data */
/** @var array $errors |null */

?>

<main>
    <div class="offer-details">
        <h1><?=$data->getName();?></h1>
                <div class="info">
                    <img src="<?=$data->getImage();?>" />
                    <div class="description"><?=$data->getDescription();?>
                        <br><br>
                        <p class="price">$ <?=$data->getPrice();?></p>

                    </div>
                </div>
        <div class="actions">
            <a href='edit.php?id=<?=$data->getId();?>'>Edit</a>
            <a href='delete.php?id=<?=$data->getId();?>'>Delete</a>
        </div>

   </div>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';