<?php if( have_posts() ): while( have_posts() ): the_post();?>

    

    <?php the_content();?>

    

    <?php
    $tags = get_the_tags();
    if($tags):
    foreach($tags as $tag):?>

        <a href=" <?php echo get_tag_link($tag->term_id);?>" class="badge bg-success">
            <?php echo $tag->name;?>
        </a>    

    <?php endforeach; endif;?>





    <?php
    $categories = get_the_category();
    foreach($categories as $cat):?>

        <a href=" <?php echo get_category_link($cat->term_id);?>" class="badge bg-primary">
            <?php echo $cat->name;?>
        </a> 

    <?php endforeach;?>



    <?php // comments_template();?>

<?php endwhile; else: endif;?>