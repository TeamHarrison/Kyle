<?php 
$page_title = "Stuff";

require_once('./common/class-project.php');

$projects = Project::Collect();

?>
<?php require_once('header.php'); ?>
<h1>Stuff.</h1>
<p>Over the years I've built a number of things, contributed to a number of projects. Here I hope to chronicle at least the most interesting.</p>
<p></p>
<ul>
<?php foreach($projects as $project): ?>
    <li><a href="/projects/<?=$project->filename;?>"><?=$project->title;?></a> (<?=$project->date->format("F jS, Y");?>)</li>
<?php endforeach; ?>
</ul>
<p>Coming Soon.</p>
<p></p>
<?php require_once('footer.php'); ?>
