<h1 class="title">Courses</h1>

<table class="table is-fullwidth">
    <thead>
        <tr>
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
            <td><?= $this->Html->link($course->name, ['action' => 'view', $course->id]) ?></td>
            <td><?= array_sum(array_map(fn ($a) => $a->par, $course->course_holes)) ?></td>
            <td><?= array_sum(array_map(fn ($a) => count($a->rounds), $course->course_tees)) ?></td>
            <td>
                <table class="table">
                    <tbody>
                        <?php foreach ($course->course_tees as $tee): ?>
                            <tr>
                                <th><?= $tee->name ?></th>
                                <td class="has-text-right"><?= $distances[$tee->id] ?? '' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </td>
            <td><?= $this->Html->link('Edit', ['action' => 'edit', $course->id], ['class' => 'button is-link is-small']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Course', ['action' => 'add'], ['class' => 'button is-primary']) ?>
