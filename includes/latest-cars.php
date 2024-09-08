<?php

$attributes = get_query_var('attributes');


$args = [

    'post_type' => 'cars',

   //FILTER COLORS, IF PUT 'Red' only the veloz appears because of its color in the ACF Car Details
    'posts_per_page' => 0, 
    //ONLY SHOWS 1 CAR, 0 is infinite
    'tax-query' =>[], //MOVED TO LINE 27
    'meta_query' => [



        ],

];

if( isset( $attributes['price_above'])){
    $array['meta_query'][] = array (
        'key' => 'price',
        'value' => $attributes['price_above'], //change to "price_below" for price_below shortcode
        'type' => 'numeric',
        'compare' => '>=', //change to less then or equal to '<='
    );

}

if( isset( $attributes['price_below'])){
    $array['meta_query'][] = array (
        'key' => 'price',
        'value' => $attributes['price_below'], //change to "price_below" for price_below shortcode
        'type' => 'numeric',
        'compare' => '<=', //change to less then or equal to '<='
    );

}


if( isset( $attributes['color'])){

    $array['meta_query'][] = array (
        'key' => 'color',
        'value' => $attributes['color'], 
        'compare' => '=', 
    );

}


if( isset($attributes['brand'])){

    $args['tax_query'][] = [
        'taxonomy' => 'brands',
        'field' => 'slug',
        'terms' => array( $attributes['brand']),
    ];
}





$query = new WP_Query($args);

?>

<?php if($query->have_posts()):?>

    <?php while($query->have_posts()) : $query->the_post();?>

    <div class="card mb-3">

        <div class="card-body d-flex align-items-center">





                    <img src="<?php the_post_thumbnail_url('blog-small');?>" alt="<?php the_title();?>"
                    class="img-fluid img-thumbnail w-25">
                    <!-- ('blog-large') with Custom image sizes in functions.php did not work that's why I used w-75 -->





            <div class="m-3">
                <a href="<?php the_permalink();?>" style="line-style-type:none; color:black; text-decoration:none;">
                    <h4> <?php the_title();?> </h4>
                </a>

                <?php the_field('engine');?>

            </div>

        </div>

    </div>


    <?php endwhile;?>

<?php endif;?>