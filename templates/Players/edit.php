<h1 class="title"><?= $player->isNew() ? 'Add Player' : 'Edit Player' ?></h1>

<?= $this->Form->create($player) ?>

<div class="field">
    <?= $this->Form->label('name', 'Name', ['class' => 'label']) ?>
    <div class="control">
        <?= $this->Form->text('name', ['class' => 'input']) ?>
    </div>
</div>

<div class="field">
    <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'button is-primary mr-2']) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
