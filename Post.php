<?php

class Post{
    private string $author;
    private string $content;
    private string $title;
    private object $date;

    /**
     * Post constructor.
     * @param string $author
     * @param string $content
     * @param string $title
     */
    public function __construct(string $author, string $title, string $content)
    {
        $this->author = $author;
        $this->content = $content;
        $this->title = $title;
        $this->date = new DateTime();
    }

    public function getDate(){
        return $this->date;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }



}