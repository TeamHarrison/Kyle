<?php 
$page_title = "Articles";

class Post {
    public $index = 0;
    public ?\DateTime $date = null;
    public $title = "";
    public $file = "";
    public $filename = "";
}

$posts = [];

$pattern = __DIR__ . "/posts/*.php";
foreach(glob($pattern) as $file) {
    $post = new Post();
    $post->file = $file;
    $post->filename = basename($file);
    
    $content = file_get_contents($file);
    if (preg_match("/\\\$page_title\s*=\s*['\"](.*?)['\"];/", $content, $matches)) {
        $title = $matches[1];
        $post->title = $title;
    }
    if (preg_match("/\\\$date\s*=\s*['\"](.*?)['\"];/", $content, $matches)) {
        $date = $matches[1];
        $post->date = new \DateTime(strtotime($date));
    }

    if($post->title) {
        $posts[] = $post;
    }

}

// sort the posts by date 
uasort($posts, static function($a, $b) {
    return $a->date > $b->date;
});


?>

<?php require_once('header.php'); ?>

<h1>Articles.</h1>

<p>I sometimes write posts, here they are</p>

<ul>
<?php foreach($posts as $post): ?>
    <li><a href="/posts/<?=$post->filename;?>"><?=$post->title;?></a></li>
<?php endforeach; ?>
</ul>

<?php require_once('footer.php'); ?>
