<h1><?= $course->name ?></h1>

<table>
    <thead>
        <tr>
            <th>Hole</th>
            <th>Par</th>
            <th>Hcp</th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th>Tee: <?= $tee->name ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($course->course_holes as $hole): ?>
            <tr>
                <td><?= $hole->number ?></td>
                <td><?= $hole->par ?></td>
                <td><?= $hole->hcp ?></td>
                <?php foreach ($course->course_tees as $tee): ?>
                    <td><?= $distances[$hole->id][$tee->id] ?? '' ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th><?= array_sum(array_map(fn ($a) => $a->par, $course->course_holes)) ?></th>
            <th></th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th>
                    <?php
                        $totalDistance = 0;
                        foreach ($distances as $dist) {
                            foreach ($dist as $teeId => $value) {
                                if ($tee->id == $teeId) {
                                    $totalDistance += $value;
                                }
                            }
                        }
                        echo $totalDistance;
                    ?>
                </th>
            <?php endforeach; ?>
        </tr>
    </tfoot>
</table>

<?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button']) ?>
