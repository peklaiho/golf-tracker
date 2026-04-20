<h1>Rounds</h1>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Player</th>
            <th>Course</th>
            <th>Tee</th>
            <th>Par</th>
            <th>Strokes</th>
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
            <td><?= $this->Html->link('edit', ['action' => 'edit', $round->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Round', ['action' => 'add'], ['class' => 'button']) ?>
