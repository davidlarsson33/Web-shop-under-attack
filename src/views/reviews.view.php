<?php include base_path("src/views/partials/navbar.view.php"); ?>

<style>
  .stars {
    display: inline-block;
    font-size: 30px;
    cursor: pointer;
  }

  .stars::before {
    content: '\2605';
    color: #ccc;
  }

  .selected::before {
    color: orange;
  }
</style>

<div class="container mt-3 p-5" style="min-height:500px">
  <h1>Reviews</h1>

  <?php

  $result = $db->fetchReviews();

  foreach ($result as $row) {
    $name = $row["name"];
    $review = $row["review"];
    $create_at = $row["created_at"];
    $stars = $row["stars"];
    ?>

    <div class='border border-black rounded mb-3 mt-3' style='background-color:#DFDFDF; width:50%; max-width:400px;'>
      <div class='p-2'>
        <h5>
          <?= $name ?>
        </h5>
        <h6 class='text-muted'>
          <?= $create_at ?>
        </h6>
        <?php for ($x = 0; $x < $stars; $x++) { ?>
          <img src="/assets/star.png" alt="" width="20px">
        <?php } ?>
        <div class='pt-2 pb-3'>
          <?= $review ?>
        </div>
      </div>
    </div>

  <?php } ?>

  <?php if (Session::has("user")) { ?>
    <form action="/reviews" method="POST">
      <p><label for="w3review">Write your review!</label></p>

      <div class="stars" onclick="setRating(1)"></div>
      <div class="stars" onclick="setRating(2)"></div>
      <div class="stars" onclick="setRating(3)"></div>
      <div class="stars" onclick="setRating(4)"></div>
      <div class="stars" onclick="setRating(5)"></div>

      <br>

      <textarea class="mb-2" id="w3review" rows="4" cols="50" name="text-area" required></textarea>
      <br>

      <input id="nbrOfStars" name="nbrOfStars" type="hidden" value="0">
      <input name="name" type="hidden" value="<?= Session::get("user", "") ?>">

      <script>
        let selectedStars = 0;

        function setRating(stars) {
          selectedStars = stars;

          document.getElementById('nbrOfStars').value = selectedStars;

          document.querySelectorAll('.stars').forEach((star, index) => {
            star.classList.remove('selected');

            if (index < selectedStars) {
              star.classList.add('selected');
            }
          });
        }
      </script>

      <?php if($errors ?? false) foreach ($errors as $error) { ?>
        <div class="text-danger">
          <?= $error ?>
        </div>
      <?php } ?>


      <input class="btn rounded bg-primary text-white " name="submit" type="submit" value="Submit">
    </form>

  <?php } else { ?>
    <h2>You must log in in order to write reviews!</h2>
  <?php } ?>
  
</div>

<?php include base_path("src/views/partials/footer.view.php"); ?>