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
    <h1>Update Profile Photo</h1>
    <?php
    if (isset($_FILES['photo'])) {
        $allowed_mime = array('image/gif', 'image/jpeg', 'image/png');
        $max_file_size = 5 * 1024 * 1024; // 5MB
        if (!in_array($_FILES['photo']['type'], $allowed_mime)) {
            echo '<div class="alert alert-danger" role="alert">Only GIF, JPEG and PNG files are allowed.</div>';
        } elseif ($_FILES['photo']['size'] > $max_file_size) {
            echo '<div class="alert alert-danger" role="alert">File is too large. Maximum size allowed is 5MB.</div>';
        } else {
            $random = substr(str_shuffle(MD5(microtime())), 0, 10);
            $new_filename = $random . $_FILES['photo']['name'];
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . '/../user-images/' . $new_filename)) {
                $User = new User($Conn);
                $User->updateUserProfile($new_filename);
                echo '<div class="alert alert-success" role="alert">Profile photo updated.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Only GIF, JPEG and PNG files are allowed.</div>';
            }
        }
    }
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file" name="photo">
        </div>
        <button type="submit" class="btn btn-studenteat">Update Profile Photo</button>
    </form>
</div>

<script type="text/javascript" src=".\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>