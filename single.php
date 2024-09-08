<?php get_header();?>

<section class="page-wrap">
<div class="container">

    



    <h1><?php the_title();?></h1>

    <p><?php echo get_the_date('m/d/y');?> <?php echo get_the_time();?></p>

    <?php if(has_post_thumbnail()):?>
        <div class="d-flex justify-content-center">
            <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>"
            class="img-fluid mb-3 img-thumbnail w-75">
            <!-- ('blog-large') with Custom image sizes in functions.php did not work that's why I used w-75 -->
        </div>

    
    
    <?php endif;?>



    <?php get_template_part('includes/section','blogcontent');?>

    <?php wp_link_pages();?>

</div>
</section>

<?php get_footer();?>