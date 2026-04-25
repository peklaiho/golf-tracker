<h1 class="title">Edit Round</h1>

<?= $this->Form->create($round) ?>

<table class="table">
    <tbody>
        <tr>
            <th>Player</th>
            <td><?= $round->player->name ?></td>
        </tr>
        <tr>
            <th>Course / Tee</th>
            <td><?= $round->course_tee->course->name ?> / <?= $round->course_tee->name ?></td>
        </tr>
        <tr>
            <th>Date and Time</th>
            <td><?= $this->Form->dateTime('tee_time', ['value' => $round->tee_time, 'class' => 'input']) ?></td>
        </tr>
        <tr>
            <th>Note</th>
            <td><?= $this->Form->textarea('note', ['class' => 'input']) ?></td>
        </tr>
    </tbody>
</table>

<table class="table is-fullwidth">
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
                <td><input class="input" name="round_holes[<?= $hole->id ?>][strokes]" type="number" min="0" max="20" value="<?= $hole->strokes ?>" tabindex="<?= $hole->course_hole->number + 10 ?>" required /></td>
                <td>
                    <div class="radios">
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="1" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === 1) ? 'checked' : '' ?> required />
                            <span>Yes</span>
                        </label>
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="0" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === 0) ? 'checked' : '' ?> required />
                            <span>No</span>
                        </label>
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][fairway_hit]" type="radio" value="null" tabindex="<?= $hole->course_hole->number + 50 ?>" <?= ($hole->fairway_hit === null) ? 'checked' : '' ?> required />
                            <span>Not set</span>
                        </label>
                    </div>
                </td>
                <td>
                    <div class="radios">
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="1" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === 1) ? 'checked' : '' ?> required />
                            <span>Yes</span>
                        </label>
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="0" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === 0) ? 'checked' : '' ?> required />
                            <span>No</span>
                        </label>
                        <label class="radio">
                            <input name="round_holes[<?= $hole->id ?>][green_in_reg]" type="radio" value="null" tabindex="<?= $hole->course_hole->number + 100 ?>" <?= ($hole->green_in_reg === null) ? 'checked' : '' ?> required />
                            <span>Not set</span>
                        </label>
                    </div>
                </td>
                <td>
                    <input class="input" name="round_holes[<?= $hole->id ?>][putts]" type="number" min="0" max="9" value="<?= $hole->putts ?>" tabindex="<?= $hole->course_hole->number + 200 ?>" />
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="field">
    <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'button is-primary mr-2']) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
