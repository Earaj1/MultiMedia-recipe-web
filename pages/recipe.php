<?php
$Recipe = new Recipe($Conn);
$recipe_data = $Recipe->getRecipe($_GET['id']);
if ($_POST['rating']) {
    $Review = new Review($Conn);
    $Review->createReview([
        "recipe_id" => (int) $_GET['id'],
        "review_rating" => $_POST['rating']
    ]);
}
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css">

    <title>Quick and affordable student recipes – StudentEat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

</head>

<body id="page-recipe">
    <div class="container">
        <h1 class="mb-4 pb-2"><?php echo $recipe_data['recipe_name']; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <?php if (!empty($recipe_data['images'])) { ?>
                    <div class="row">
                        <?php foreach ($recipe_data['images'] as $image) { ?>
                            <div class="col-md-4">
                                <div class="recipe-image mb-4"
                                    style="background-image: url('./recipe-images/<?php echo $image['recipe_image']; ?>'); height: 150px; background-size: cover; background-position: center;">
                                    <a href="./recipe-images/<?php echo $image['recipe_image']; ?>"
                                        data-lightbox="recipe-imgs"></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <p><?php echo $recipe_data['recipe_instructions']; ?></p>
                <ul class="recipe-features">
                    <li>
                        <?php
                        $Review = new Review($Conn);
                        $avg_rating = $Review->calculateRating($_GET['id']);

                        // Use a fallback value if 'avg_rating' is null or not numeric
                        $rating_value = $avg_rating['avg_rating'] ?? 0; // Default to 0 if not set
                        $rating_value = is_numeric($rating_value) ? round($rating_value, 1) : 0; // Validate it's numeric
                        
                        ?>
                    <li><i class="fas fa-star-half-alt"></i> <?php echo $rating_value; ?> Stars</li>
                    </li>

                    <li><i class="far fa-clock"></i> <?php echo $recipe_data['recipe_time']; ?></li>
                    <li><i class="fas fa-users"></i> <?php echo $recipe_data['recipe_servings']; ?> Servings</li>
                    <li><i class="fas fa-dollar-sign"></i> <?php echo $recipe_data['recipe_price']; ?></li>
                    <li><i class="fas fa-tags"></i> <?php echo $recipe_data['recipe_tags']; ?></li>
                </ul>
                <?php
                $Favourite = new Favourite($Conn);
                $is_fav = $Favourite->isFavourite($_GET['id']);
                if ($is_fav) {
                    ?>
                    <button id="removeFav" type="button" class="btn btn-primary mb-3" data-recipeid="<?php echo
                        $_GET['id']; ?>">Remove from favourites</button>
                    <?php
                } else {
                    ?>
                    <button id="addFav" type="button" class="btn btn-primary mb-3" data-recipeid="<?php echo
                        $_GET['id']; ?>">Add to favourites</button>
                    <?php
                }
                ?>
            </div>
        </div>
        <h2>Leave a review</h2>
        <?php
        if (!$_SESSION['is_loggedin']) {
            ?>
            <p>Unfortunately, only registered users can leave a review.</p>
            <?php
        } else {
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select class="form-control" id="rating" name="rating">
                        <option value="1">1 Star (Very bad)</option>
                        <option value="2">2 Star (Bad)</option>
                        <option value="3">3 Star (Okay)</option>
                        <option value="4">4 Star (Good)</option>
                        <option value="5">5 Star (Very Good)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
        }
        ?>
    </div>


    <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>

</body>

</html>