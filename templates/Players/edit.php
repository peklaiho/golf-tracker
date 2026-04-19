<h1><?= $player->id ? 'Edit Player' : 'Add Player' ?></h1>

<?= $this->Form->create($player) ?>

<div>
    <?= $this->Form->label('name') ?>
    <?= $this->Form->text('name') ?>
</div>

<div>
    <?= $this->Form->submit('Save') ?>
</div>

<?= $this->Form->end(); ?>
