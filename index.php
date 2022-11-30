<?php 
    include("template/front/header.php");
    include("template/front/navbar.php");
    include("config/database.php");
    ?>
<?php
	   $i=1;
	    $statement = $conn->prepare('SELECT * FROM about ORDER BY about_id DESC');
		 $statement->execute();
		 $about = $statement->fetchAll(PDO::FETCH_ASSOC);
		 $sNo  = 1;
		 foreach ($about as $about); 
	 ?>
<section class="home">
 <div class="image">
        <img src="storage/home/<?php echo $about['about_photo']; ?>" alt="">
    </div>
    <div class="content">
        <h3>hi, i am <?php echo $about['about_name']; ?> </h3>
        <span> <?php echo $about['about_title']; ?></span>
        <p><?php echo $about['about_desc']; ?></p>
        <a href="tel:<?php echo $about['about_hire']; ?>" class="btn"> Hire Me <i class="fas fa-phone"></i> </a>
    </div>
</section>

<?php include("template/front/navbar.php"); ?>