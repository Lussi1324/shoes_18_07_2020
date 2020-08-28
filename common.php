<?php

session_start();
spl_autoload_register();

$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$userRepository = new \App\Repository\UserRepository($db, $dataBinder);
$encryptionService = new \App\Service\Encryption\ArgonEncryptionService();
$userService = new \App\Service\UserService($userRepository, $encryptionService);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder, $userService);


$brandRepository = new \App\Repository\BrandRepository($db);
$brandService = new \App\Service\BrandService($brandRepository);

$offerRepository = new \App\Repository\OfferRepository($db,$dataBinder);
$offerService = new \App\Service\OfferService($offerRepository,$userService);

$offerHttpHandler = new \App\Http\OfferHttpHandler($template, $dataBinder, $brandService, $offerService,$userService);