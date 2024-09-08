<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midnight Customs</title>

    <?php wp_head();?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97a0b5ecb4.js" crossorigin="anonymous"></script>

</head>
<body>

<header style="z-index:99;">

    <div class="container nav">
        <img src="<?php echo get_template_directory_uri(); ?>/images/Logo/midnightCustomsLogoB.png" alt="logo" 
        style="width: 4%; 
        position: absolute; 
        left: 0;
        ">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                //'menu' => 'Top Bar'
                'menu_class' => 'top-bar'
            )
        );?>
    </div>

</header>


<!-- <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
<div class="container"> -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
    <span class="navbar-toggler-icon"></span>
</button>
    <a class="navbar-brand" href="#">Navbar</a>
        < ?php
        wp_nav_menu( array(
            'theme_location'    => 'top-menu',
            'depth'             => 3,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?> -->
<!--    </div>
</nav> -->