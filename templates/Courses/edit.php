<h1>Edit Course</h1>

<?= $this->Form->create($course) ?>

<div>
    <?= $this->Form->label('name') ?>
    <?= $this->Form->text('name') ?>
</div>

<table>
    <thead>
        <tr>
            <th>Hole</th>
            <th>Par</th>
            <th>Hcp</th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th><input name="course_tees[<?= $tee->id ?>][name]" type="text" value="<?= $tee->name ?>" required /></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($course->course_holes as $hole): ?>
            <tr>
                <td><?= $hole->number ?></td>
                <td><input name="course_holes[<?= $hole->id ?>][par]" type="number" min="3" max="5" value="<?= $hole->par ?>" tabindex="<?= $hole->number + 10 ?>" required /></td>
                <td><input name="course_holes[<?= $hole->id ?>][hcp]" type="number" min="1" max="18" value="<?= $hole->hcp ?>" tabindex="<?= $hole->number + 50 ?>" required /></td>
                <?php foreach ($course->course_tees as $teeIndex => $tee): ?>
                    <td><input name="distances[<?= $hole->id ?>][<?= $tee->id ?>]" type="number" min="0" max="700" value="<?= $distances[$hole->id][$tee->id] ?? 0 ?>" tabindex="<?= $hole->number + (100 * ($teeIndex + 1)) ?>" required /></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <?= $this->Html->link('Add Tee', ['action' => 'addTee', $course->id], ['class' => 'button']) ?>
    <?= $this->Form->submit('Save') ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button']) ?>
</div>

<?= $this->Form->end(); ?>
