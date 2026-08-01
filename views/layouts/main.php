<?php
/**
 * User: GulaHack
 * Date: 19/7/2026
 * Time: 12:34 PM
 */

use App\core\Application;

/** @var \App\models\User|null $user */
$user = Application::$app->user;

// Testing the Session user
// echo '<pre>';
// var_dump(Application::$app->user);
// echo '</pre>';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS (LTR) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (Focus on implement title for every pages) -->
    <title><?php echo $this->title;?></title>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/contact">Contact us</a>
                </li>
            </ul>
            <!-- Only user null will see -->
            <?php if (Application::isGuest()): ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/logout">Welcome <?php echo $user->getDisplayName() //Application::$app->user->getDisplayName() ?>
                    (Logout)
                </a>
                </li>
            </ul>
            <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Add the alert for after register... -->
         <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        {{content}}
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>