<h1><?= $player->isNew() ? 'Add Player' : 'Edit Player' ?></h1>

<?= $this->Form->create($player) ?>

<div>
    <?= $this->Form->label('name') ?>
    <?= $this->Form->text('name') ?>
</div>

<div>
    <?= $this->Form->submit('Save') ?>
    <?= $this->Html->link('Back', ['action' => 'index']) ?>
</div>

<?= $this->Form->end(); ?>
