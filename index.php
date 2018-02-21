<!DOCTYPE html>
<?php require_once 'php/db.php'; $todo = new db; $todo = $todo->getTasks(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>To-do</title>
		<!-- <style type="text/css" src="css/style.css"></style> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>

	<div class="container">
		<div class="row">
			<?php foreach ($todo as $task): ?>
				<div class="col-4 p-1">
					<div class="card text-center <?php if ($task->status == 'complete'){echo('border-success');}?>">

						<div class="card-header <?php if ($task->status == 'complete'){echo('bg-success');}?>"><h4 class="card-title"><?= ucwords($task->name) ?></h4></div>

						<div class="card-body" style="min-height: 150px;">
							<p class="card-text h5"><?= $task->description ?></p>
						</div>

						<div class="card-footer bg-transparent p-2">
							<?php if ($task->status == 'complete'){
							echo('<form action="php/todo.php" method="POST" class="d-inline"><button class="btn btn-outline-secondary" type="submit" value="' . $task->id . '" name="incomplete">Mark Incomplete</button></form>');}
							elseif ($task->status == 'incomplete'){
							echo('<form action="php/todo.php" method="POST" class="d-inline"><button class="btn btn-outline-success" type="submit" value="' . $task->id . '" name="complete">Mark Complete</button></form>');}
							?>
							<form action="php/todo.php" method="POST" class="d-inline"><button class="btn btn-sm btn-outline-danger ml-3" type="submit" value="<?= $task->id ?>" name="delete" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button></form>
						</div>

					</div>
				</div>
			<?php endforeach ?>
		
		</div>
		<div class="row justify-content-center">
			<div class="col-6">
			<form action="php/todo.php" method="POST">
				<div class="form-group">
					Task:
					<input type="text" name="name" class="form-control">
					Description:
					<textarea name="description" class="form-control" rows="3"></textarea><button type="submit" class="btn btn-lg btn-primary form-control">Add</button>
				</div>
			</form>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	function autorun()
	{

	}
	if (document.addEventListener) document.addEventListener("DOMContentLoaded", autorun, false);
	else if (document.attachEvent) document.attachEvent("onreadystatechange", autorun);
	else window.onload = autorun;
		</script>
	</body>
</html>