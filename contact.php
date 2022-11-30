<?php 
    include("template/front/header.php");
    include("template/front/navbar.php");
    include("config/database.php");
?>
<?php
		 $i=1;
		 $statement = $conn->prepare('SELECT * FROM contact ORDER BY contact_id DESC');
		$statement->execute();
		 $contact = $statement->fetchAll(PDO::FETCH_ASSOC);
		 $sNo  = 1;
		  foreach ($contact as $contact);
		 ?>
<section class="contact">
    <h1 class="heading"> contact <span>me</span> </h1>
    <div class="row">
        <div class="info-container">
            <h1>get in touch</h1>
            <p><?php echo $contact['contact_info']; ?></p>
            <div class="share">
                <a target="_blank" href="https://facebook.com/<?php echo $contact['contact_fb']; ?>"
                    class="fab fa-facebook-f"></a>
                <a target="_blank" href="https://twitter.com/<?php echo $contact['contact_tw']; ?>"
                    class="fab fa-twitter"></a>
                <a target="_blank" href="https://instagram.com/<?php echo $contact['contact_insta']; ?>"
                    class="fab fa-instagram"></a>
                <a target="_blank" href="https://wa.me/<?php echo $contact['contact_wts']; ?>"
                    class="fab fa-whatsapp"></a>
            </div>
        </div>
        <div class="row">
            <div class="info-container">
                <div class="box-container">
                    <h1> contact me </h1>
                    <div class="box">
                        <i class="fas fa-map"></i>
                        <div class="info">
                            <h3>address :</h3>
                            <p><?php echo $contact['contact_address']; ?></p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <h3>email :</h3>
                            <p><?php echo $contact['contact_email']; ?></p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="fas fa-phone"></i>
                        <div class="info">
                            <h3>number :</h3>
                            <p><?php echo $contact['contact_phone']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php include("template/front/footer.php"); ?>