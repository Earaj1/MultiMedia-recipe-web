<?php
$Recipe = new Recipe($Conn);
$recipe_data = $Recipe->getRecipe($_GET['id']);
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
                    <li><i class="far fa-clock"></i> <?php echo $recipe_data['recipe_time']; ?></li>
                    <li><i class="fas fa-users"></i> <?php echo $recipe_data['recipe_servings']; ?> Servings</li>
                    <li><i class="fas fa-dollar-sign"></i> <?php echo $recipe_data['recipe_price']; ?></li>
                    <li><i class="fas fa-tags"></i> <?php echo $recipe_data['recipe_tags']; ?></li>
                </ul>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>

</body>

</html>