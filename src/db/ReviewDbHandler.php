<?php include "DatabaseHandler.php"; ?>

<?php
    class ReviewDbHandler extends DatabaseHandler {

        function __construct($config, $username, $password ){
            parent::__construct($config, $username, $password );
        }
    
        function fetchReviews(){
            $stmt = "SELECT * FROM reviews;"; 
            $result = $this -> queryInsecure($stmt);                    
            return $result->fetchAll();
        }

        function insertReview($formData){
            $review = $formData["text-area"]; 
            $nbrOfStars = $formData["nbrOfStars"]; 
            $userName = $formData["name"]; 
            $stmt = "INSERT INTO `reviews`(`name`, `stars`, `review`) VALUES ('$userName','$nbrOfStars','$review')"; 
            $this -> queryInsecure($stmt);                    
        }
        
    }
?>