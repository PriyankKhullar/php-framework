<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<!-- add task form -->
	<form method="POST" action="add-task">
		<label>Tasks</label>
		<input type="text" name="task">
		<input type="submit" name="save" value="Add Task">
	</form>
	
	<!-- task listing -->
	<ul>
		<?php foreach ($tasks as $task) : ?>
			<li>
				<?php if($task->completed) : ?>
					<strike>
				<?php endif; ?>

					<?= $task->descriptions; ?>

				<?php if($task->completed) : ?>
					</strike>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>			
	</ul>
</body>
</html>