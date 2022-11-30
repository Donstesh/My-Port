<?php 
    ob_start();
    if(!session_start()){
      session_start();
    }
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

<section class="about">

    <h1 class="heading"> about <span>me</span> </h1>

    <div class="row">

        <div class="info-container">

            <h1>personal info</h1>

            <div class="box-container">

                <div class="box">
                    <h3> <span>name : </span> <?php echo $about['about_name']; ?> </h3>
                    <h3> <span>age : </span> <?php echo $about['about_age']; ?> </h3>
                    <h3> <span>email : </span> <?php echo $about['about_email']; ?> </h3>
                    <h3> <span>address : </span><?php echo $about['about_address']; ?> </h3>
                </div>

                <div class="box">
                    <h3> <span>freelance : </span> <?php echo $about['about_free']; ?> </h3>
                    <h3> <span>skill : </span> <?php echo $about['about_skill']; ?> </h3>
                    <h3> <span>experience : </span> <?php echo $about['about_exp']; ?> </h3>
                    <h3> <span>language : </span> <?php echo $about['about_lang']; ?></h3>
                </div>
            </div>

            <a target="_blank" href="https://<?php echo $about['about_button']; ?>" class="btn"> download CV <i
                    class="fas fa-download"></i> </a>

        </div>
        <div class="count-container">
            <div class="box">
                <h3><?php echo $about['about_exp_yrs'];?>+</h3>
                <p>years of experience</p>
            </div>

            <div class="box">
                <h3><?php echo $about['about_happy']; ?>+</h3>
                <p>happy clients</p>
            </div>

            <div class="box">
                <h3><?php echo $about['about_project']; ?>+</h3>
                <p>project completed</p>
            </div>

            <div class="box">
                <h3><?php echo $about['about_awards']; ?>+</h3>
                <p>awards won</p>
            </div>
        </div>
    </div>
</section>

<section class="skills">
    <h1 class="heading"> <span>my</span> skills </h1>
    <div class="box-container">
        <div class="box">
            <img src="storage/skills/icon-1.png">
            <h3>html</h3>
        </div>
        <div class="box">
            <img src="storage/skills/icon-2.png">
            <h3>css</h3>
        </div>
        <div class="box">
            <img src="storage/skills/icon-3.png">
            <h3>javascript</h3>
        </div>
        <div class="box">
            <img src="storage/skills/icon-4.png">
            <h3>sass</h3>
        </div>
        <div class="box">
            <img src="storage/skills/icon-5.png">
            <h3>jquery</h3>
        </div>
        <div class="box">
            <img src="storage/skills/icon-6.png">
            <h3>react.js</h3>
        </div>
    </div>

</section>

<section class="education">
    <h1 class="heading"> <span>my</span> education </h1>
    <div class="box-container">
        <?php
$a=1;
$stmt = $conn->prepare(
     "SELECT * FROM education");
$stmt->execute();
$education = $stmt->fetchAll();
foreach($education as $row) 
{  	    
?>
        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span><?php echo $row['education_year']; ?></span>
            <h3><?php echo $row['education_title']; ?></h3>
            <p><?php echo $row['education_desc']; ?></p>
        </div>
        <?php } ?>
    </div>
</section>

<?php include("template/front/navbar.php"); ?>