<?php
require_once dirname(__FILE__).'/../home/header_profile.php';
/** @var array $errors |null */
/** @var \App\Data\OfferDTO $data */

?>
    <main>
        <h1>Edit Offer</h1>
        <?php foreach ($errors as $error): ?>
            <p class="message" style="color: darkred"><?= $error ?></p>
        <?php endforeach; ?>

        <form action="" method="post">
            <div>
                <input type="text" name="name" placeholder="Name..." value="<?=$data->getName();?>"/>
            </div>
            <div>
                <input type="text" name="price" placeholder="Price..." value="<?=$data->getPrice();?>"/>
            </div>
            <div>
                <input type="text" name="image" placeholder="Image url..." value="<?=$data->getImage();?>"/>
            </div>
            <div>
                <textarea name="description" placeholder="Give us some description about this offer..."><?=$data->getDescription();?></textarea>
            </div>
            <div>
                <select name="brand_id">
                    <?php foreach ($data->getBrands()as $brand):?>
                        <option <?= $brand->getId()== $data->getBrandId()? 'selected = "selected"' : ''?> value="<?=$brand->getId();?>"><?=$brand->getBrand();?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit" name="edit">Edit</button>
            </div>

        </form>


    </main>

<?php require_once dirname(__FILE__).'/../home/footer.php';
