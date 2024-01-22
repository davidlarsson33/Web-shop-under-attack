<?php include "DatabaseHandler.php"; ?>

<?php
class ReviewDbHandler
{
    private DatabaseHandler $db;
    function __construct($config, $username, $password)
    {
        $this->db = DatabaseHandler::getInstance($config, $username, $password);
    }

    function fetchReviews()
    {
        $stmt = "SELECT * FROM reviews;";
        $result = $this->db->queryInsecure($stmt);
        return $result->fetchAll();
    }

    function insertReview($formData)
    {
        $review = $formData["text-area"];
        $nbrOfStars = $formData["nbrOfStars"];
        $userName = $formData["name"];
        $stmt = "INSERT INTO `reviews`(`name`, `stars`, `review`) VALUES ('$userName','$nbrOfStars','$review')";
        $this->db->queryInsecure($stmt);
    }

}
?>