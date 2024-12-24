<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css">

    <title>Quick and affordable student recipes – StudentEat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

</head>

<div class="container">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>Welcome to your account. From here you can view the recipes added to your favourites list.</p>
    <?php
    if ($_SESSION['user_data']['user_image']) {
        echo '<img class="mb-3" style="max-width: 100px;" src="./user-images/' . $_SESSION['user_data']['user_image'] . '" />';
    }
    ?>
    <p><a class="btn btn-studenteat" href="index.php?p=editprofileimage">Edit Profile Image</a></p>
    <h2>My Favourites</h2>
    <ul class="user-favs">
        <?php
        $Favourite = new Favourite($Conn);
        $user_favs = $Favourite->getAllFavouritesForUser();
        if ($user_favs) {
            foreach ($user_favs as $fav) {
                echo '<li><a href="index.php?p=recipe&id=' . $fav['recipe_id'] . '">' . $fav['recipe_name'] . '</a></li>';
            }
        }
        ?>
    </ul>
</div>

<script type="text/javascript" src=".\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>