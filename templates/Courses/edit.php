<h1 class="title">Edit Course</h1>

<?= $this->Form->create($course) ?>

<div class="field">
    <?= $this->Form->label('name', 'Name', ['class' => 'label']) ?>
    <div class="control">
        <?= $this->Form->text('name', ['class' => 'input']) ?>
    </div>
</div>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Hole</th>
            <th>Par</th>
            <th>Hcp</th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th><input class="input" name="course_tees[<?= $tee->id ?>][name]" type="text" value="<?= $tee->name ?>" required /></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($course->course_holes as $hole): ?>
            <tr>
                <th><?= $hole->number ?></th>
                <td><input class="input" name="course_holes[<?= $hole->id ?>][par]" type="number" min="3" max="5" value="<?= $hole->par ?>" tabindex="<?= $hole->number + 10 ?>" required /></td>
                <td><input class="input" name="course_holes[<?= $hole->id ?>][hcp]" type="number" min="1" max="18" value="<?= $hole->hcp ?>" tabindex="<?= $hole->number + 50 ?>" required /></td>
                <?php foreach ($course->course_tees as $teeIndex => $tee): ?>
                    <td><input class="input" name="distances[<?= $hole->id ?>][<?= $tee->id ?>]" type="number" min="0" max="700" value="<?= $distances[$hole->id][$tee->id] ?? 0 ?>" tabindex="<?= $hole->number + (100 * ($teeIndex + 1)) ?>" required /></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="field">
    <?= $this->Html->link('Add Tee', ['action' => 'addTee', $course->id], ['class' => 'button is-warning mr-2']) ?>
    <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'button is-primary mr-2']) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
