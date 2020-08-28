<?php
require_once dirname(__FILE__).'/../home/header_profile.php';
/** @var \App\Data\FullOfferDTO[] $data */

/** @var array $errors |null */
?>

    <main>
            <div class="shoes">
                <?php foreach ($data as $offer):?>
                    <div class="shoe">

                        <img src="<?=$offer->getImage();?>" alt="snimka"/>
                        <h3><?=$offer->getName(); ?></h3>
                        <a href="view.php?id=<?= $offer->getId(); ?>">Buy it for $<?= $offer->getPrice();?></a>
                    </div>
                <?php endforeach; ?>
            </div>
    </main>

<?php require_once dirname(__FILE__).'/../home/footer.php';