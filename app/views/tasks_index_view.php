<form method="POST">
    <input type="submit" name="add" value="+"/>
</form>
<ul>
    <?php foreach($this->tasks as $task): ?>
    <li><?= $task['name'] ?></li>
    <?php endforeach; ?>
</ul>

