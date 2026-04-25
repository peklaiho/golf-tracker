<h1 class="title">Add Course</h1>

<?= $this->Form->create($course) ?>

<div class="field">
    <?= $this->Form->label('name', 'Name', ['class' => 'label']) ?>
    <div class="control">
        <?= $this->Form->text('name', ['class' => 'input']) ?>
    </div>
</div>

<div class="field">
    <label class="label" for="number_of_holes">Number of Holes</label>
    <div class="control">
        <input class="input" name="number_of_holes" type="number" value="18" min="1" max="18" required />
    </div>
</div>

<div class="field">
    <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'button is-primary mr-2']) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
