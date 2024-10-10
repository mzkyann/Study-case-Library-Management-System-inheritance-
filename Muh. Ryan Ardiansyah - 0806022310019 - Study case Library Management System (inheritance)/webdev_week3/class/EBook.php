<?php
class EBook extends Book{
    private $fileSize;

    function __construct($title, $author, $publicationYear, $fileSize){
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
    }
    function getDetails(){
        $result = parent::getDetails()
        .'File Size:</y> '.$this->fileSize.' MB';
        return $result;
    }

    function getFileSize(){
        return $this->fileSize;
    }
}
?>