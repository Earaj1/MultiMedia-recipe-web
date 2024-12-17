<?php
$Category = new Category($Conn);
$categories = $Category->getAllCategories();
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

<body id=”page-categories>
    <div class="container ">
        <h1 class="pb-2">Recipe Categories</h1>
        <div class="row">

            <?php foreach ($categories as $category) { ?>
                <div class="col-md-3">
                    <div class="recipe-card">
                        <div class="recipe-card-image"
                            style="background-image: url('./category-images/<?php echo $category['category_image']; ?>');">
                            <a href="index.php?p=recipes&id=<?php echo $category['category_id']; ?>"></a>
                        </div>
                        <a href="index.php?p=recipes&id=<?php echo $category['category_id']; ?>">
                            <h3><?php echo $category['category_name']; ?></h3>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <script type="text/javascript" src=".\node_modules\jquery\dist\jquery.min.js"></script>
    <script type="text/javascript" src=".\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>