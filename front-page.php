<?php get_header();?>

<style>
    

.parallax-body{
    height:auto;
    
}
.parallax-container {
    position: relative; /* Relative positioning for inner elements */
    height: 100vh; /* Full viewport height */
    width: 100%;
    overflow: hidden; /* Hide overflow to prevent scrollbars */
    display: flex; /* Flexbox to center logo */
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    z-index: -1;
}

.parallax-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Home/lambo-home.jpg'); /* Replace with your image path */
    position: absolute; /* Position absolutely within the container */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-attachment: fixed; /* Parallax effect */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent background from repeating */
    background-size: cover; /* Cover the entire container */
    z-index: -1; /* Behind other content */
}

.logo-container {
   /* Positioning to center the logo */
    z-index: 1; /* Ensure it's above the parallax background */
    height:100vh;
    width:100vw;
    display: flex; /* Flexbox to center logo */
    align-items: center; /* Center vertically */
    justify-content: center; 
}

.centered-logo {

    width:30%; /* Adjust size as needed */
    max-width:10000px;
    /* Ensure it doesn’t get too large on larger screens */
    z-index: 1;
}

.home{
    width:100%;
    margin: 50px 0px;
    padding: 0px 40px;
    color: black;
    text-decoration: none;
	font-weight:500;
	font-family: "Oswald", sans-serif;
    text-transform: uppercase;
    text-align:center;
}

.home2{
    width:100%;
    margin-top: 20px;
    padding: 0px 40px;
    color: black;
    text-decoration: none;
	font-weight:500;
	font-family: "Oswald", sans-serif;
    text-transform: uppercase;
    text-align:center;
}

.gallery{
    display:flex;
    flex-direction:row;  /* puts pictures from left to right */
    flex-wrap:wrap;    /* remove spaces between pictures */
    justify-content:center; /* places the pictures to the center */
    align-items:center;
    padding: 20px 10px;
    max-width: 100%;
    margin:0 auto;
    gap:16px;
}

</style>
<!-- <section class="page-wrap">
<div class="container">
    <div class="d-flex justify-content-between">
        -->
    <div class="container parallax-body">
        <div class="parallax-container">
            <div class="parallax-image">
                <!-- Background image set via CSS -->
            </div>
            <div class="logo-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Logo/midnightCustomsLogo.png" alt="logo" class="centered-logo">
            </div>
        </div>

        <?php get_template_part('includes/section','content');?>

        
        <h1 class="home2">Gallery</h1>

        <?php
            $gallery = get_field('gallery');
            if($gallery):?>
            <div class="gallery">   
                    <?php foreach($gallery as $image):?>
                        
                        <a href="<?php echo $image['sizes']['blog-small'];?>">
                            <img src="<?php echo $image['sizes']['blog-small'];?>" class="img-fluid" 
                            style=" width:100%;
                            max-width:350px;
                            height: 300px;
                            object-fit:cover;">
                        </a>
                        
                    <?php endforeach;?>
            </div>
        <?php endif;?>
        


    </div>

    <?php get_footer();?>


    <script>
        window.addEventListener('scroll', function() {
    const parallaxImage = document.querySelector('.parallax-image');
    const scrollPosition = window.scrollY; // Get the current scroll position
    parallaxImage.style.transform = `translateY(${scrollPosition * 0.5}px)`; // Adjust the multiplier to change speed
});

    </script>

        <!-- <h1>< ?php the_title();?></h1>
        < ?php get_search_form();?> -->
    <!-- </div> -->
    <!-- < ?php get_template_part('includes/section','content');?> -->

    <!-- SHORTCODEEEEEEEEEEEEE [latest_cars color="Orange" brand="mitsubishi" price_above="20000"] -->

<!-- 
</div>
</section> -->

