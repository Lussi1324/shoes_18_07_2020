<?php
require_once dirname(__FILE__).'/../home/header.php';
/** @var array $errors  */
/** @var \App\Data\UserDTO $data */
?>

<main>
    <h1>Login</h1>
    <p class="form-info"> Dont't have account?
        <a href="register.php">Register now</a> and fix that!
    </p>

    <form action="" method="post">
        <div>
            <input type="email" name="email" placeholder="Email"/>

        </div>

        <div>
            <input type="password" name="password" placeholder="Password"/>
        </div>
        <?php foreach ($errors as $error): ?>
            <p class="message" style="color: darkred"><?= $error ?></p>
        <?php endforeach; ?>
        <?php if($data!= ""): ?>
            <p class="message" style="color: darkgreen">
                <?= $data->getFullName()?> welcome to our platform!
            </p>
        <?php endif; ?>
        <div>
            <button type="submit" name="login">Login</button>
        </div>

    </form>
</main>

<?php require_once dirname(__FILE__).'/../home/footer.php';