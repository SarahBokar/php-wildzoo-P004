<!-- ⛔ DO NOT MODIFY THIS FILE ⛔-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Welcome to the Wild Zoo</title>
</head>

<body>
    <header>
        <h1>Welcome to the Wild Zoo</h1>
    </header>
    <main>
        <div class="animals">
            <?php foreach ($animals ?? [] as $key => $animal) : ?>
                <article>
                    <?php if (method_exists($animal, 'speak')) : ?>
                        <div class="hello">
                            <?= $animal->speak() ?>
                        </div>
                    <?php endif; ?>
                    <div></div>
                    <img class="animal-img" width="<?= $animal->size ?? $animal->getSize() ?? 100 ?>%" src="assets/images/animals/<?= $animal->name ?? $animal->getName() ?? 'undefined' . $key % 3 ?>.png" alt="">
                    <div class="notice">
                        <div class="title">
                            <h1>
                                <?= $animal->name ?? $animal->getName() ?? 'Undefined animal #' . ($key + 1) ?>
                            </h1>
                        </div>
                        <hr />
                        <ul class="infos">
                            <li class="paw"><?= $animal->pawNumber ?? $animal->getPawNumber() ?? 'undefined' ?></li>
                            <li class="size">
                                <?= $animal->size ?? $animal->getSize() ?? 'undefined' ?>
                            </li>
                            <?php if (isset($animal->carnivorous)) : ?>
                                <li class="<?= $animal->carnivorous ? 'carnivorous' : 'vegetarian' ?>">
                                    <?= $animal->carnivorous ? 'carnivorous' : 'vegetarian' ?>
                                </li>
                            <?php elseif (method_exists($animal, 'isCarnivorous')) : ?>
                                <li class="<?= $animal->isCarnivorous() ? 'carnivorous' : 'vegetarian' ?>">
                                    <?= $animal->isCarnivorous() ? 'carnivorous' : 'vegetarian' ?>
                                </li>
                            <?php else : ?>
                                <li class="vegetarian"> undefined </li>
                            <?php endif; ?>
                            <li class="iucn"><?= $animal->threatenedLevel ?? $animal->getThreatenedLevel() ?></li>
                            <?php if (method_exists($animal, 'isDangerous')) : ?>
                                <li class="<?= $animal->isDangerous() ? 'dangerous' : 'not-dangerous' ?>">
                                    <?= $animal->isDangerous() ? 'Dangerous' : 'Not dangerous' ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>