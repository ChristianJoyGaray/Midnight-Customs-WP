<?php

/* 
Template Name: Car Search 
*/


$is_search = count($_GET);

$brands = get_terms([

        'taxonomy' => 'brands',
        'hide_empty' => false

]);



if($is_search){
    $query = search_query();
}
?>





<?php get_header();?>

<!-- 
<pre>

    < ?php print_r($brands);?>
    PRINT THE DETAILS ABOUT CARS (name and slug)
</pre> -->



<section class="page-wrap">

    <div class="container" style="padding-top:5rem; z-index:0; position:relative;">

        <div class="card" style="z-index:1; position:relative;">

            <div class="card-body" style="z-index:2; position:relative;">
                <form action="<?php echo home_url('/car-search');?>">
                    
                    <div class="form-group" style="z-index:3; position:relative;">
                        <label class="mt-1 mb-1 fw-bold">Search</label>
                        <input 
                        type="text" 
                        name="keyword" 
                        placeholder="Type a keyword..." 
                        class="form-control" 
                        value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "";?>"
                        />
                    </div>


                    <div class="form-group">        
                        <label class="mt-1 mb-1 fw-bold">Brand</label>
                        <select name="brand" class="form-select" style="z-index:3; position:relative;">

                        <option value="">Choose a brand</option>

                        <?php foreach($brands as $brand):?>



                            <option 
                            
                                <?php if( isset($_GET['brand']) && ($_GET['brand'] == $brand->slug) ):?>
                                    selected
                                <?php endif;?>
                                
                                
                                value="<?php echo $brand->slug;?>">
                                <?php echo $brand->name;?>
                            </option>

                     
                        <?php endforeach;?>


                        </select>
                    </div>


                    


                    <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>From price:</label>
                                    <select name="price_above" class="form-control">
                                        <?php for($i=0; $i < 210000; $i+=10000):?>
                                            <option 


                                            <?php if( isset($_GET['price_above']) && ($_GET['price_above'] == $i) ):?>
                                                    selected
                                                <?php endif;?>
                                            
                                            
                                            value="<?php echo $i;?>">




                                                <?php echo '$' . number_format($i);?>
                                            </option>
                                        <?php endfor;?>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                        <label>To price:</label>
                                    <select name="price_below" class="form-control">
                                        <?php for($i=0; $i < 210000; $i+=10000):?>
                                            <option 
                                            
                                            
                                            <?php if( isset($_GET['price_below']) && ($_GET['price_below'] == $i) ):?>
                                                    selected
                                            <?php endif;?>
                                            
                                            <?php if($i == 200000):?> 
                                                selected
                                            <?php endif;?>
                                            
                                            value="<?php echo $i;?>">
                                                <?php echo '$' . number_format($i);?>
                                            </option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                    </div>





                    <button type="submit" class="btn btn-success mt-2 mb-2 d-flex justify-content-center w-100">Search</button>

                    <a href="<?php echo home_url('/car-search');?>" class="btn btn-primary mb-2">Reset search</a>

                </form>



                <?php if($is_search):?>
                <?php if($query->have_posts()):?>

                    <?php while($query->have_posts()) : $query->the_post();?>

                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-center">
                            <img 
                            src="<?php the_post_thumbnail_url('blog-small');?>" 
                            alt="<?php the_title();?>"
                            class="img-fluid img-thumbnail w-25">
                            <!-- ('blog-large') with Custom image sizes in functions.php did not work that's why I used w-75 -->

                            <div class="m-3">
                                <a 
                                href="<?php the_permalink();?>" 
                                style="
                                    line-style-type:none; 
                                    color:black; 
                                    text-decoration:none;">
                                    <h4> <?php the_title();?> </h4>
                                    <?php echo '$' . get_field('price');?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php endwhile;?>




                    <div class="pagination">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'current'      => max( 1, get_query_var( 'paged' ) ),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Prev', 'text-domain' ) ),
                                'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ) );
                        ?>
                    </div>


                    <?php wp_reset_postdata();?>


                <?php else:?>
                    <div class="alert alert-danger mt-1">
                        There are no results.
                    </div>
                <?php endif;?>
                <?php endif;?>



            </div>
        </div>
    </div>
</section>

<?php get_footer();?>