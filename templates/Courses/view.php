<h1 class="title"><?= $course->name ?></h1>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Hole</th>
            <th class="has-text-right">Par</th>
            <th class="has-text-right">Hcp</th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th class="has-text-right">Tee: <?= $tee->name ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($course->course_holes as $hole): ?>
            <tr>
                <th><?= $hole->number ?></th>
                <td class="has-text-right"><?= $hole->par ?></td>
                <td class="has-text-right"><?= $hole->hcp ?></td>
                <?php foreach ($course->course_tees as $tee): ?>
                    <td class="has-text-right"><?= $distances[$hole->id][$tee->id] ?? '' ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th class="has-text-right"><?= array_sum(array_map(fn ($a) => $a->par, $course->course_holes)) ?></th>
            <th></th>
            <?php foreach ($course->course_tees as $tee): ?>
                <th class="has-text-right">
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

<?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button is-link']) ?>
