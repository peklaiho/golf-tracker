<h1 class="title">Players</h1>

<table class="table is-fullwidth">
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
            <td><?= $this->Html->link('Edit', ['action' => 'edit', $player->id], ['class' => 'button is-link is-small']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Add Player', ['action' => 'add'], ['class' => 'button is-primary']) ?>
