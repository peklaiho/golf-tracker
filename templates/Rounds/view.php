<h1 class="title"><?= $round->course_tee->course->name ?></h1>

<?= $this->Form->create($round) ?>

<table class="table">
    <tbody>
        <tr>
            <th>Date</th>
            <td><?= $round->tee_time->format('Y-m-d H:i') ?></td>
        </tr>
        <tr>
            <th>Player</th>
            <td><?= $round->player->name ?></td>
        </tr>
        <tr>
            <th>Tee</th>
            <td><?= $round->course_tee->name ?></td>
        </tr>
        <?php if ($round->note): ?>
            <tr>
                <th>Note</th>
                <td><?= $round->note ?></td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Hole</th>
            <th class="has-text-right">Par</th>
            <th class="has-text-right">Strokes</th>
            <th class="has-text-right">Fairway Hit</th>
            <th class="has-text-right">Green in Reg.</th>
            <th class="has-text-right">Putts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($round->round_holes as $hole): ?>
            <tr>
                <th><?= $hole->course_hole->number ?></th>
                <td class="has-text-right"><?= $hole->course_hole->par ?></td>
                <td class="has-text-right"><?= $hole->strokes ?></td>
                <td class="has-text-right"><?= match ($hole->fairway_hit) { 0 => 'No', 1 => 'Yes', default => '' } ?></td>
                <td class="has-text-right"><?= match ($hole->green_in_reg) { 0 => 'No', 1 => 'Yes', default => '' } ?></td>
                <td class="has-text-right"><?= $hole->putts ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->course_hole->par, $round->round_holes)) ?></th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->strokes, $round->round_holes)) ?></th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->fairway_hit, $round->round_holes)) ?></th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->green_in_reg, $round->round_holes)) ?></th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->putts, $round->round_holes)) ?></th>
        </tr>
    </tfoot>
</table>

<div class="field">
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
</div>

<?= $this->Form->end(); ?>
