<?php 

class Project {
    public $index = 0;
    public ?\DateTime $date = null;
    public $title = "";
    public $category = "";
    public $file = "";
    public $filename = "";

    public static function Collect() {
        $projects = [];
        $pattern = __DIR__ . "../projects/*.php";
        foreach(glob($pattern) as $file) {
            $project = new Project();
            $project->file = $file;
            $project->filename = basename($file);
            
            $content = file_get_contents($file);
            if (preg_match("/\\\$page_title\s*=\s*['\"](.*?)['\"];/", $content, $matches)) {
                $title = $matches[1];
                $project->title = $title;
            }
            if (preg_match("/\\\$date\s*=\s*['\"](.*?)['\"];/", $content, $matches)) {
                $date = $matches[1];
                $project->date = new \DateTime($date);
            }
            if (preg_match("/\\\$project_category\s*=\s*['\"](.*?)['\"];/", $content, $matches)) {
                $category = $matches[1];
                $project->category = $category;
            }

            if($project->title) {
                $projects[] = $project;
            }
        }

        // sort the posts by date 
        uasort($projects, static function($a, $b) {
            return $a->date > $b->date;
        });

        return $projects;
    }
}