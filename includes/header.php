<!DOCTYPE html>
<html>

<head>
    <title>My blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <div class="container">

        <header>
            <h1>My blog</h1>
        </header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php if (Auth::isLoggedIn()) : ?>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/admin/">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout.php">Log out</a>
                            </li>

                        <?php else : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/login.php">Log in</a>
                            </li>

                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact.php">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main>