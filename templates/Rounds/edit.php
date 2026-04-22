<h1>Edit Round</h1>

<?= $this->Form->create($round) ?>

<div>
    Player: <?= $round->player->name ?>
</div>
<div>
    Course / Tee: <?= $round->course_tee->course->name ?> / <?= $round->course_tee->name ?>
</div>

<div>
    <?= $this->Form->label('tee_time', 'Tee time') ?>
    <?= $this->Form->dateTime('tee_time', ['value' => $round->tee_time]) ?>
</div>

<div>
    <?= $this->Form->label('note') ?>
    <?= $this->Form->textarea('note') ?>
</div>

<table>
    <thead>
        <tr>
            <th>Hole</th>
            <th>Par</th>
            <th>Strokes</th>
            <th>Fairway Hit</th>
            <th>Green in Reg.</th>
            <th>Putts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($round->round_holes as $hole): ?>
            <tr>
                <th><?= $hole->course_hole->number ?></th>
                <td><?= $hole->course_hole->par ?></td>
                <td><input name="round_holes[<?= $hole->id ?>][strokes]" type="number" min="0" max="20" value="<?= $hole->strokes ?>" tabindex="<?= $hole->course_hole->number + 10 ?>" required /></td>
                <td>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="1" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === 1) ? 'checked' : '' ?> required />
                        <span>Yes</span>
                    </label>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="0" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === 0) ? 'checked' : '' ?> required />
                        <span>No</span>
                    </label>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="null" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === null) ? 'checked' : '' ?> required />
                        <span>Not set</span>
                    </label>
                </td>
                <td>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="1" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === 1) ? 'checked' : '' ?> required />
                        <span>Yes</span>
                    </label>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="0" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === 0) ? 'checked' : '' ?> required />
                        <span>No</span>
                    </label>
                    <label style="display: inline">
                        <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="null" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === null) ? 'checked' : '' ?> required />
                        <span>Not set</span>
                    </label>
                </td>
                <td>
                    <input name="round_holes[<?= $hole->id ?>][putts]" type="number" min="0" max="9" value="<?= $hole->putts ?>" tabindex="<?= $hole->course_hole->number + 200 ?>" />
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <?= $this->Form->submit('Save') ?>
    <?= $this->Html->link('Back', ['action' => 'index']) ?>
</div>

<?= $this->Form->end(); ?>
