<?php  
    class Book{
        private $title;
        private $author;
        private $publicationYear;
        
        function __construct($title, $author, $publicationYear){
            $this->title = $title;
            $this->author = $author;
            $this->publicationYear = $publicationYear;
        }

        function getDetails(){
            $result = '<y style="color: #e81e61">Title:</y> '.$this->title.', '
            .'<y style="color: #5295f2">Author:</y> '.$this->author.', '
            .'<y style="color: #4cb054">Year:</y> '.$this->publicationYear.', <y style="color: #e81e61">';
            return $result;
        }

        function getTitle(){
            return $this->title;
        }

        function getAuthor(){
            return $this->author;
        }

        function getPublicationYear(){
            return $this->publicationYear;
        }
    }
?>