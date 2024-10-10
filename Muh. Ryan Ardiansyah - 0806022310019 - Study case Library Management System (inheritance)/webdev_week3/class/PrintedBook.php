<?php
class PrintedBook extends Book{
    private $numberOfPages;

    function __construct($title, $author, $publicationYear, $numberOfPages){
        parent::__construct($title, $author, $publicationYear);
        $this->numberOfPages = $numberOfPages;
    }
    function getDetails(){
        $result = parent::getDetails()
        .'Number of Pages:</y> '.$this->numberOfPages.' Pages';
        return $result;
    }

    function getFileSize(){
        return $this->numberOfPages;
    }
}
?>