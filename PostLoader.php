<?php

class PostLoader{
    private array $allPosts;

    /**
     * PostLoader constructor.
     * @param $file
     */
    public function __construct(string $file)
    {
        $data = file_get_contents($file);
        $wtf = unserialize($data);
        if(!$wtf){
            $this->allPosts = [];
        } else {
            $this->allPosts = $wtf;
        }
    }
    public function convertToString(array $posts) : string {
        return serialize($posts);
    }
    public function addPost(Post $post) : void {
        $this->allPosts[] = $post;
    }
    public function getPosts() : array {
        return $this->allPosts;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }
}