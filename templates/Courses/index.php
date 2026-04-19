<h1>Courses</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Par</th>
            <th>Rounds</th>
            <th>Tees</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?= $course->id ?></td>
            <td><?= $this->Html->link($course->name, ['action' => 'view', $course->id]) ?></td>
            <td><?= array_sum(array_map(fn ($a) => $a->par, $course->course_holes)) ?></td>
            <td>0</td>
            <td>
                <?php foreach ($course->course_tees as $tee): ?>
                <div>
                    <span><?= $tee->name ?></span>:
                    <span><?= $distances[$tee->id] ?? '' ?></span>
                </div>
                <?php endforeach; ?>
            </td>
            <td><?= $this->Html->link('edit', ['action' => 'edit', $course->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Course', ['action' => 'add'], ['class' => 'button']) ?>
