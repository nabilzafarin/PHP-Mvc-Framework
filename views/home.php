<?php
/** @var string $name */

// SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (set the title at here or inside AuthController.php for each method example: profile() {...here...})
 /** @var \App\core\View $this */
 $this->title = 'Home';
?>

<h1>Home</h1>
<h3>Welcome <?php echo $name ?></h3>