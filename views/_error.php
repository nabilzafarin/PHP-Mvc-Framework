<?php
/**
 * User: GulaHack
 * Date: 19/7/2026
 * Time: 12:34 PM
 */

/* SUBTOPIC-2: CREATE PROTECTED ROUTES -- (rename file from _404 to _error.php) */
/** @var \Exception $exception */

// SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (set the title at here or inside AuthController.php for each method example: profile() {...here...})
 /** @var \App\core\View $this */
 $this->title = 'Error Page';

?>

<center>
    <br>
    <!-- <h1>404 - Page Not Found</h1> -->

    <!-- SUBTOPIC-2: CREATE PROTECTED ROUTES -- (error message will be dynamic) -->
    <h1><?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?></h1> 
</center>