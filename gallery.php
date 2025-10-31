<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="gallery.css">
    <?php include "partials/header.php"; ?>
</head>

<body>

    <?php
    include "partials/navbar.php";

    ?>

    <section data-aos="fade-up" data-aos-duration="1000" class="hero hero-cover">
        <div class="hero-content col-lg-6">


            <h1>Gallery</h1>
            
        
        </div>
        <!-- <div class="carousel-indicators">
            <span class="indicator activated" data-slide-to="0"></span>
            <span class="indicator" data-slide-to="1"></span>
            <span class="indicator" data-slide-to="2"></span>
        </div> -->

    </section>

    <section>
        <div class="row px-4 ">
            <?php 
            include "admin/conn.php";
                $sql = "SELECT * FROM gallery_category";
                   $stmt = $pdo->query($sql);
                   $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

                   if ($images) {
                     foreach ($images as $image) {
            ?>
                 <div class="col-lg-4 mt-3 col-md-6 gallery-img-cover" data-aos="fade-up" data-aos-duration="500">
                <a class="cat-link" href="gallery_cat.php?cat=<?= $image['category_name']; ?>">
                    <img class="w-100 rounded" src="img/gallery/<?= $image['category_image']; ?>" alt="team cover images">
                    <h3 class="px-5 hallow py-3 cat-title rounded"><?= $image['category_name']; ?></h3>
                </a>

            </div>        
            <?php         }
                   }
            ?>
           

          



        </div>
    </section>

    <!-- <section class="ftco-section ftco-gallery">
    	<div class="container">
        <div class="mb-4">
          <h2 >Medical Outreach</h2>
          <small><span><i class="icon-map-o"></i> Oko Primary Health Center, Benin City</span> <br> <span class="mr-2"><i class="icon-clock-o"></i> Dec. 2, 2023</span></small>
        </div>
      
	    	<div class="d-md-flex">
		    	<a href="img/IMG_2158.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(img/IMG_2158.jpg);">
		    		<div class="icon d-flex justify-content-center align-items-center">
		    			<span class="icon-search"></span>
		    		</div>
		    	</a>
		    	<a href="img/IMG_2158.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(img/IMG_2158.jpg);">
		    		<div class="icon d-flex justify-content-center align-items-center">
		    			<span class="icon-search"></span>
		    		</div>
		    	</a>
		    	<a href="img/IMG_2158.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(img/IMG_2158.jpg);">
		    		<div class="icon d-flex justify-content-center align-items-center">
		    			<span class="icon-search"></span>
		    		</div>
		    	</a>
				<a href="img/IMG_2158.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(img/IMG_2158.jpg);">
		    		<div class="icon d-flex justify-content-center align-items-center">
		    			<span class="icon-search"></span>
		    		</div>
		    	</a>
		 
	    	</div>

		    

		    
				
		    </div>



			
	    </div>
    </section> -->


    <?php include "partials/footer.php"; ?>

    <script src="js/gallery.js"></script>
</body>

</html>