<?php
class ReviewFormValidator
{
    private $errors = [];
    public function validateFormData($formData)
    {
        $review = $formData["text-area"];
        $nbrOfStars = $formData["nbrOfStars"];

        $this->validateNbrOfStars($nbrOfStars);
        $this->validateReview($review);
        return $this->errors;
    }

    private function validateNbrOfStars($nbrOfStars)
    {
        if (empty($nbrOfStars)) {
            $this->appendToError("stars", "You must provide at least one star");
        }
    }
    private function validateReview($review)
    {
        if (empty($review)) {
            $this->appendToError("review", "Review cannot be left empty");
        }

        if (strlen($review) >= 500) {
            $this->appendToError("review", "Review is too long. A maximum of 500 characters is allowed");
        }
    }

    private function appendToError($key, $value)
    {
        if ($this->errors[$key] != null) {
            $this->errors[$key] = $this->errors[$key] . "<br />" . $value;
        } else {
            $this->errors[$key] = $value;
        }
    }
}

?>