<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>web site</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="../../js/tasks.js" type="text/javascript"></script>
	<link href="css/question.css" rel="stylesheet"/>
   
    </head>
    
    <body>
	<h1>My site</h1>
	<nav>
	    <ul>
		<li><a href="/">Home</a></li>
		<li><a href="/tasks">Tasks</a></li>
		<li><a href="/questions">Questions</a></li>
		<li><a href="#">TODO</a></li>
	    </ul>
	</nav>
	<main>
	    <?php include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $content_view . '.php'; ?>
	</main>
    </body>
</html>

