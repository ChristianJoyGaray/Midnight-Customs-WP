<?php get_header();?>

<style>
			.enquire .gform_footer .gform_button{
    width: 100% !important;
    background: green !important; 
    display: block !important;
    color: white !important;
    padding: 10px !important;
}		
</style>

<section class="page-wrap d-flex justify-content-center align-items-center">
<div class="container ">

    



    <h1><?php the_title();?></h1>

    <?php if(has_post_thumbnail()):?>


        <div class="gallery">
            <a href="<?php the_post_thumbnail_url('blog-large');?>">

                <div class="d-flex justify-content-center">
                    <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>"
                    class="img-fluid mb-3 img-thumbnail w-75">
                    <!-- ('blog-large') with Custom image sizes in functions.php did not work that's why I used w-75 -->
                </div>

            </a>
        </div>
    
    <?php endif;?>



    <div class="row">

        <div class="col-lg-6 ">

                <?php get_template_part('includes/section','cars');?>

                <?php wp_link_pages();?>

        </div>

        <div class="col-lg-6">

                <ul>

                    
                    <li>Price: $ <?php echo number_format(get_field('price'));?>
                    
                    </li>
                
                    <li>Color: <?php the_field('color');?>
                
                    </li>
                
            
                    <li>Engine: <?php the_field('engine');?>
                
                    </li>


                    <li>Seating Capacity: <?php the_field('seating_capacity');?>
                
                    </li>

                    <li>Registration: <?php the_field('registration');?>
                
                    </li>






                </ul>


            <h3>Features</h3>
            <ul>
                <?php if(have_rows('features')):?>
                <?php while(have_rows('features')): the_row();
                
                
                $feature = get_sub_field('feature');
                
                ?>
                    <li>

                    <?php echo $feature;?>

                    </li>
                    <?php endwhile;?>
                <?php endif;?>
            </ul>


            <?php
            $gallery = get_field('gallery');
            if($gallery):?>
            <div class="gallery">   
                    <?php foreach($gallery as $image):?>
                        
                        <a href="<?php echo $image['sizes']['blog-small'];?>">
                            <img src="<?php echo $image['sizes']['blog-small'];?>" class="img-fluid w-50">
                        </a>
                        
                    <?php endforeach;?>
                </div>
            <?php endif;?>


        </div>

    </div>



    <!-- <div class="enquire w-100 d-flex justify-content-center align-items-center">-->
    <!-- <  ?   php gravity_form(1,'Enquire about this car', null, false, ['rego' => get_field('registration')], true, 100, true);?> -->
    <!--</div> -->

    <!-- uncomment to show the enquiry gravity form plugin -->

    <?php get_template_part('includes/form','enquiry');?>

</div>
</section>

<?php get_footer();?>


<!-- 
<?php if(get_post_meta($post->ID, 'Engine', true)):?>
    <?php endif;?> -->