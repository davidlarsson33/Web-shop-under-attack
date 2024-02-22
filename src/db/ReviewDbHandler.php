<?php
class ReviewDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }
    function fetchReviews()
    {
        $stmt = "SELECT * FROM reviews;";
        $result = $this->db->query($stmt);
        return $result->fetchAll();
    }

    function insertReview($formData)
    {
        $review = $formData["text-area"];
        $nbrOfStars = $formData["nbrOfStars"];
        $userName = $formData["name"];
        $stmt = "INSERT INTO `reviews`(`name`, `stars`, `review`) VALUES (?,?,?)";
        $this->db->query($stmt, $userName, $nbrOfStars, $review);
    }
}