<h1>Add Round</h1>

<?= $this->Form->create($round) ?>

<div>
    <?= $this->Form->label('player_id', 'Player') ?>
    <?= $this->Form->select('player_id', $players) ?>
</div>

<div>
    <?= $this->Form->label('course_tee_id', 'Course / Tee') ?>
    <?= $this->Form->select('course_tee_id', $courseTees) ?>
</div>

<div>
    <?= $this->Form->label('tee_time', 'Tee time') ?>
    <?= $this->Form->dateTime('tee_time', ['value' => date('Y-m-d 12:00:00')]) ?>
</div>

<div>
    <?= $this->Form->submit('Save') ?>
</div>

<?= $this->Form->end(); ?>
