<?php
/**
 
Register block categories.*/
function cjoy_block_module_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                "slug" => "cjoy-modules",
                "title" => __( "cjoy Modules", "cjoy" ),
                "icon"  => null
            )
        )
    );
}
add_filter( "block_categories", "cjoy_block_module_category", 10, 2 );







function cjoy_register_blocks() {
    if ( ! function_exists("acf_register_block") ) return;

    $allowed_post_types = array("post", "page", "module", "projects");

 acf_register_block(array (
        "name"            => "text",
        "title"            => __( "Text", "mytheme" ),
        "render_template"    => "template-parts/blocks/text.php",
        "category"        => "cjoy-modules",
        "icon"            => "groups",
        "mode"            => "pressthis",
        "post_types"    => $allowed_post_types,
        "keywords"        => array("text")
    ));

}


add_action("acf/init", "cjoy_register_blocks" );





// function rohde_restrict_blocks($allowed_blocks) {
//     $allowed_blocks = array (
//         "acf/text",
      

     
//     );

//     return $allowed_blocks;
// }

// add_filter("allowed_block_types", "rohde_restrict_blocks");