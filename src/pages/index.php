<?php
session_start();
include "../db/ReviewDbHandler.php";
if (isset($_POST["submit"])) {
  $review = $_POST["text-area"];
  $db = new ReviewDbHandler();
  $db->insertReview($_POST);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guitar lessons</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <?php include "../components/navbar.php"; ?>
  <?php include "../components/main.php"; ?>
  <?php include "../components/pricing.php"; ?>

  <div class="container mt-3" style="min-height:500px">
    <h1>Reviews</h1>

    <?php
    $db = new ReviewDbHandler();
    $result = $db->fetchReviews();

    foreach ($result as $row) {
      $name = $row["name"];
      $review = $row["review"];
      $create_at = $row["created_at"];

      echo "
          <div class='border border-primary rounded mb-3 mt-3'>
            <div class='p-2'>
              <h5>$name</h5> 
              <h6>$create_at</h6> 
              <div class='pt-2 pb-3'>
                $review
              </div>
            </div>
          </div>
        ";
    }
    ?>

    <form action="index.php" method="POST">
      <p><label for="w3review">Write your review!</label></p>
      <textarea id="w3review" rows="4" cols="50" name="text-area"></textarea>
      <br>
      <input class="btn rounded bg-primary text-white" name="submit" type="submit" value="Submit">
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>