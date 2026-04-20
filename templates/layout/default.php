<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        GolfTracker:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">Golf<span>Tracker</span></a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('Rounds', ['controller' => 'Rounds', 'action' => 'index']) ?>
            <?= $this->Html->link('Courses', ['controller' => 'Courses', 'action' => 'index']) ?>
            <?= $this->Html->link('Players', ['controller' => 'Players', 'action' => 'index']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
