<h1>View Round</h1>

<?= $this->Form->create($round) ?>

<div>
    Player: <?= $round->player->name ?>
</div>
<div>
    Course / Tee: <?= $round->course_tee->course->name ?> / <?= $round->course_tee->name ?>
</div>
<div>
    Tee time: <?= $round->tee_time->format('Y-m-d H:i') ?>
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
                <td><?= $hole->strokes ?></td>
                <td><?= match ($hole->fairway_hit) { 0 => 'No', 1 => 'Yes', default => '' } ?></td>
                <td><?= match ($hole->green_in_reg) { 0 => 'No', 1 => 'Yes', default => '' } ?></td>
                <td><?= $hole->putts ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th><?= array_sum(array_map(fn ($a) => $a->course_hole->par, $round->round_holes)) ?></th>
            <th><?= array_sum(array_map(fn ($a) => $a->strokes, $round->round_holes)) ?></th>
            <th><?= array_sum(array_map(fn ($a) => $a->fairway_hit, $round->round_holes)) ?></th>
            <th><?= array_sum(array_map(fn ($a) => $a->green_in_reg, $round->round_holes)) ?></th>
            <th><?= array_sum(array_map(fn ($a) => $a->putts, $round->round_holes)) ?></th>
        </tr>
    </tfoot>
</table>

<div>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button']) ?>
</div>

<?= $this->Form->end(); ?>
