<h1>Add Course</h1>

<?= $this->Form->create($course) ?>

<div>
    <?= $this->Form->label('name') ?>
    <?= $this->Form->text('name') ?>
</div>

<div>
    <label for="number_of_holes">Number of Holes</label>
    <input name="number_of_holes" type="number" value="18" min="1" max="18" required />
</div>

<div>
    <?= $this->Form->submit('Save') ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button']) ?>
</div>

<?= $this->Form->end(); ?>
