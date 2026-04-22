<h1>Players</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Rounds</th>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($players as $player): ?>
        <tr>
            <td><?= $player->name ?></td>
            <td><?= count($player->rounds) ?></td>
            <td><?= $this->Html->link('edit', ['action' => 'edit', $player->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Player', ['action' => 'add']) ?>
