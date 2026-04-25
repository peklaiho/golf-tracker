<h1 class="title">Rounds</h1>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Date</th>
            <th>Player</th>
            <th>Course</th>
            <th>Tee</th>
            <th>Par</th>
            <th>Strokes</th>
            <th>Note</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rounds as $round): ?>
        <tr>
            <td><?= $this->Html->link($round->tee_time->format('Y-m-d H:i'), ['action' => 'view', $round->id]) ?></td>
            <td><?= $round->player->name ?></td>
            <td><?= $round->course_tee->course->name ?></td>
            <td><?= $round->course_tee->name ?></td>
            <td><?= array_sum(array_column(array_column($round->round_holes, 'course_hole'), 'par')) ?></td>
            <td><?= array_sum(array_column($round->round_holes, 'strokes')) ?></td>
            <td><?= $round->note ?></td>
            <td><?= $this->Html->link('Edit', ['action' => 'edit', $round->id], ['class' => 'button is-link is-small']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Round', ['action' => 'add'], ['class' => 'button is-primary']) ?>
