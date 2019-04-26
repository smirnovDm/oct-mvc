
<input type="button" name="add" value="+"/>

<ul>
    <?php foreach($this->tasks as $task): ?>
    <li id="<?= $task['id'] ?>"><?= $task['name'] ?> <i class="fas fa-edit" id="<?= $task['id'] ?>"></i> <i class="fas fa-trash-alt" id="<?= $task['id'] ?>"></i></li>
    <?php endforeach; ?>
</ul>

