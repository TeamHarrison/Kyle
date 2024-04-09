<?php 
$page_title = "Articles";

require_once('./common/class-post.php');

$posts = Post::Collect();

?>

<?php require_once('header.php'); ?>

<h1>Articles.</h1>

<p>I sometimes write posts, here they are</p>

<ul>
<?php foreach($posts as $post): ?>
    <li><a href="/posts/<?=$post->filename;?>"><?=$post->title;?></a> (<?=$post->date->format("F jS, Y");?>)</li>
<?php endforeach; ?>
</ul>

<?php require_once('footer.php'); ?>
