<body id="page-<?php echo $page; ?>">
    <header>
        <div class="page-header-top container text-center text-md-start">
            <a href="index.php?p=home"><img src="./images/logo.jpg" alt="StudentEat" /></a>
        </div>
        <nav class="navbar navbar-expand-lg mb-4">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>
                <div class="collapse navbar-collapse" id="navbar">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">

                            <a class="nav-link" href="index.php?p=home">Home</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="index.php?p=categories">Categories</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="index.php?p=account">My Account</a>
                        
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="index.php?p=weather">Weather</a>
                        
                        </li>

                        <?php if (isset($_SESSION['is_loggedin'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=logout">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=login">Login / Register</a>
                            </li>
                        <?php } ?>

                    </ul>

                    <form action="index.php?p=search" method="post" class="d-flex">

                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">

                        <button class="btn btn-outline-dark ms-2" type="submit">Search</button>

                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>