<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title() ?></title>

    <meta name="robots" content="noindex, nofollow">

    <?php if ($_ENV['VITE_ENV_MODE'] === "dev"): ?>
        <!-- Include Vite dev server for HMR -->
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/assets/js/main.js" defer></script>
    <?php elseif ($_ENV['VITE_ENV_MODE'] === "host"): ?>
        <!-- Include Vite dev server for HMR -->
        <script type="module" src="http://<?= $_ENV['VITE_LOCAL_IP'] ?>:3000/@vite/client"></script>
        <script type="module" src="http://<?= $_ENV['VITE_LOCAL_IP'] ?>:3000/assets/js/main.js" defer></script>
    <?php else: ?>
        <!-- Include the production build files -->
        <link rel="stylesheet" href="<?= AssetHelper::hashedAssetURL("css") ?>">
        <script src="<?= AssetHelper::hashedAssetURL("js") ?>" type="module" defer></script>
    <?php endif; ?>
    
</head>

<body>
    