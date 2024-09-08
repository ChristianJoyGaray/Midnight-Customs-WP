<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header();?>


<section class="page-wrap">
<div class="container">

    <h1 style=" width:100%;
                margin-top: 20px;
                padding: 0px 40px;
                color: black;
                text-decoration: none;
                font-weight:500;
                font-family: 'Oswald', sans-serif;
                text-transform: uppercase;
                text-align:center;"><?php the_title();?></h1>

    <div class="row">

                
        <?php get_template_part('includes/section','content');?>



        
        <div class="enquire w-100 d-flex justify-content-center align-items-center">
            <?php gravity_form(1,'Enquire about this car', null, false, ['rego' => get_field('registration')], true, 100, true);?>
        </div>








    </div>

    

</div>
</section>

<?php get_footer();?>