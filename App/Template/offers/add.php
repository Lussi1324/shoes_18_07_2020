<?php
require_once dirname(__FILE__).'/../home/header_profile.php';
/** @var array $errors |null */
/** @var \App\Data\BrandDTO[] $data */
?>


<main>
    <h1>Create Offers</h1>
    <?php foreach ($errors as $error): ?>
        <p class="message" style="color: darkred"><?= $error ?></p>
    <?php endforeach; ?>

    <form action="" method="post">
        <div>
            <input type="text" name="name" placeholder="Name..."/>
        </div>
        <div>
            <input type="text" name="price" placeholder="Price..."/>
        </div>
        <div>
            <input type="text" name="image" placeholder="Image url..."/>
        </div>
        <div>
            <textarea name="description" placeholder="Give us some description about this offer..."></textarea>
        </div>
        <div>
            <select name="brand_id" required="required">
                <?php foreach ($data as $brand): ?>
                    <option value="<?=$brand->getId();?>"><?=$brand->getBrand();?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit" name="add">Create</button>
        </div>

    </form>


</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';