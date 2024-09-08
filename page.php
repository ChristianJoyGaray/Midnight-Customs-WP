<?php get_header();?>


<style>
    .community{
        transform: rotate(90deg);
        width:70%;
        z-index:-999;
        position: relative !important;
    }

    .team{
        text-align: center; 
        width: 100%; 
        margin-top: 20px; 
        padding: 0px 40px; 
        color: black; 
        text-decoration: none; 
        font-weight: 400; 
        font-family: 'Oswald', sans-serif; 
        font-size: 1.3rem;
        
    }

    .teambullet li{
        list-style-type: none;
    }
</style>

<section class="page-wrap">
<div class="container">


    <section class="row">

        <!-- <div class="col-lg-3">

            < ?php if(is_active_sidebar('page-sidebar')):?>

            < ?php dynamic_sidebar('page-sidebar');?>

            < ?php endif;?>

        </div> -->


            <div> <!-- class="col-lg-9" -->
            <h1 style=" width:100%;
                margin-top: 20px;
                padding: 0px 40px;
                color: black;
                text-decoration: none;
                font-weight:500;
                font-family: 'Oswald', sans-serif;
                text-transform: uppercase;
                text-align:center;">
                <?php the_title();?>
            </h1>
                <div style="display:block; justify-content:center; align-items:center;">
                    <?php if(has_post_thumbnail()):?>
                        <div class="d-flex justify-content-center">
                            <img src="<?php the_post_thumbnail_url('blog-small');?>" alt="< ?php the_title();?>"
                            class="img-fluid img-thumbnail">
                            <!-- ('blog-large') with Custom image sizes in functions.php did not work that's why I used w-75 -->
                        </div>

                    <?php endif;?>



                    <?php get_template_part('includes/section','content');?>
                </div>
        </div>


    </section>

</div>
</section>

<?php get_footer();?>