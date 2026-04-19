<h1>Rounds</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
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
            <td><?= $round->id ?></td>
            <td><?= $round->tee_time ?></td>
            <td><?= $round->course_tee_id ?></td>
            <td><?= $round->course_tee_id ?></td>
            <td>par</td>
            <td>strokes</td>
            <td><?= $this->Html->link('edit', ['action' => 'edit', $round->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Round', ['action' => 'add'], ['class' => 'button']) ?>
