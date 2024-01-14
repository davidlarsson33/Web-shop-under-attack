<?php include "DatabaseHandler.php"; ?>

<?php
    class ReviewDbHandler extends DatabaseHandler {

        function __construct(){
            parent::__construct();
        }

        function fetchReviews(){
            $stmt = "SELECT * FROM reviews;"; 
            $result = $this -> queryInsecure($stmt);                    
            return $result->fetchAll();
        }

        function insertReview($text){
            $stmt = "SELECT * FROM reviews;"; 
            $result = $this -> queryInsecure($stmt);                    
        }
        
    }
?>