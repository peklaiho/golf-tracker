<h1>Players</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Rounds</th>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($players as $player): ?>
        <tr>
            <td><?= $player->id ?></td>
            <td><?= $player->name ?></td>
            <td>0</td>
            <td><?= $this->Html->link('edit', ['action' => 'edit', $player->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Player', ['action' => 'add'], ['class' => 'button']) ?>
