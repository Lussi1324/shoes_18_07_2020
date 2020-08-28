<?php
require_once dirname(__FILE__).'/../home/header_profile.php';
/** @var \App\Data\MyOfferTempDTO $data */
/** @var array $errors |null */
?>

<main>
  <div class="user-info">
      <div>
          <p>Email: <span><?=$data->getUser()->getEmail();?></span></p>
          <p>My offers:  <span>[<?php echo count($data->getOffers());?>]</span></p>
          <p><a href="logout.php">Logout</a></p>
      </div>

      <div class="shoes">
          <?php foreach ($data->getOffers() as $offer): ?>
        <div class="shoe">

              <img src="<?=$offer->getImage();?>" alt="snimka"/>
             <h3><?=$offer->getName(); ?><a href="view.php?id=<?= $offer->getId();?>"> <span><?= $offer->getPrice();?></span></h3></a>
        </div>
          <?php endforeach; ?>
      </div>

          <p class="total-profit"> Total profit <span>$<?=$data->getTotalPrice();?></span></p>

    </div>

</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';