<?php
         session_start(); 
         if (!isset($_SESSION["loggedin-user"])) {
              header("Location: login.php"); 
         }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | PHP Tutorials  </title>
</head>
<body>
    <h1>
    Hello 
    <?php echo $_SESSION["loggedin-user"]; ?>   
    Welcome to PHP Tutorials</h1>
    <hr>
    <?php include 'menu.html' ?>
    <hr>
    <h2>Contact Us</h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam quae fuga error sint accusamus dolores aspernatur autem magnam, officiis libero eius iusto laudantium architecto vero sequi eum nobis labore eaque aperiam illum illo voluptatem sit necessitatibus. Quo laudantium modi commodi accusamus voluptatem maiores cum iusto odit, distinctio odio assumenda eum laborum neque fugiat fuga enim sit. Delectus, voluptates animi. Atque debitis ducimus magni nemo quisquam commodi quia voluptate amet. Fugiat numquam explicabo recusandae, aperiam fugit eius cupiditate quisquam tenetur dicta ex, quod sit eum suscipit dolorum quas corporis nesciunt, ut nisi temporibus. Rerum nesciunt similique voluptatibus itaque? Autem molestias tenetur sint voluptas? Quas obcaecati aliquam laboriosam expedita et unde assumenda non consequuntur commodi inventore beatae praesentium, ipsam in voluptatem excepturi vitae modi nam, iusto labore molestiae! Tenetur quidem veniam harum nostrum porro quaerat fuga deleniti nam alias culpa. Dolore, possimus labore earum culpa consequatur ullam eos quisquam consectetur commodi, saepe unde eaque maxime neque non quidem soluta doloribus voluptatibus aliquid amet quod? Vel quam aspernatur fugit iste. Impedit pariatur perspiciatis dicta asperiores cumque, ullam facere magnam error quidem, ad nihil ducimus? Tenetur ab necessitatibus doloribus vero iure omnis animi. Error impedit officiis explicabo corporis temporibus magnam qui quas modi natus!
</p>
<br><br><br><br>
<div >
    <hr>
    <?php include 'footer.html' ?> 
    <hr>
</div>        
</body>
</html>