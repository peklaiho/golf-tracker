<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GolfTracker: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['pico.classless.orange.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>GolfTracker</li>
            </ul>
            <ul>
                <li><?= $this->Html->link('Rounds', ['controller' => 'Rounds', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Courses', ['controller' => 'Courses', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Players', ['controller' => 'Players', 'action' => 'index']) ?></li>
            </ul>
        </nav>
    </header>
    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
    <footer>
    </footer>
</body>
</html>
