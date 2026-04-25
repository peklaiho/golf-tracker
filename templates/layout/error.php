<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GolfTracker: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bulma']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header class="container mb-4 mt-4">
        <nav class="level">
            <ul class="level-left">
                <li class="title">GolfTracker</li>
            </ul>
            <ul class="level-right">
                <li><?= $this->Html->link('Rounds', ['controller' => 'Rounds', 'action' => 'index'], ['class' => 'button is-rounded']) ?></li>
                <li><?= $this->Html->link('Courses', ['controller' => 'Courses', 'action' => 'index'], ['class' => 'button is-rounded']) ?></li>
                <li><?= $this->Html->link('Players', ['controller' => 'Players', 'action' => 'index'], ['class' => 'button is-rounded']) ?></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
    </main>
    <footer class="container">
    </footer>
</body>
</html>
