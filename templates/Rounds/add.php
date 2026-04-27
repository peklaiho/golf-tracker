<h1 class="title">Add Round</h1>

<?= $this->Form->create($round) ?>

<div class="field">
    <?= $this->Form->label('player_id', 'Player', ['class' => 'label']) ?>
    <div class="control">
        <div class="select">
            <?= $this->Form->select('player_id', $players) ?>
        </div>
    </div>
</div>

<div class="field">
    <?= $this->Form->label('course_tee_id', 'Course / Tee', ['class' => 'label']) ?>
    <div class="control">
        <div class="select">
            <?= $this->Form->select('course_tee_id', $courseTees) ?>
        </div>
    </div>
</div>

<div class="field">
    <?= $this->Form->label('tee_time', 'Tee time', ['class' => 'label']) ?>
    <div class="control">
        <?= $this->Form->dateTime('tee_time', ['value' => date('Y-m-d 12:00:00'), 'class' => 'input']) ?>
    </div>
</div>

<div class="field">
    <label for="number_of_holes" class="label">Played holes</label>
    <div class="control">
        <input name="number_of_holes" class="input" type="number" min="1" max="18" value="18" />
    </div>
</div>

<div class="field">
    <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'button is-primary mr-2']) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
