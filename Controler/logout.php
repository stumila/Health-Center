<?php include_once "../Model/User.php"; ?>
<?php include_once "../Config/database.php"; ?>

<?php 
    $user = new User();
    $user ->logout();
?>