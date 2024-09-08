<style>
    
.social-icons a{
    text-decoration: none;
    margin-right: 1rem;
    font-size:2rem;
    
}

.social-icons{
    margin-bottom:20px;
}
</style>



<footer>

    <div class="container" style="
    display:flex; 
    justify-content:center; 
    align-items:center;
    flex-direction:column;">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                //'menu' => 'Top Bar'
                'menu_class' => 'footer-bar'
            )
        );?>

        <h1 style="
    width:100%;
    margin-top: 50px;
    margin-bottom: 20px;
    padding: 0px 40px;
    color: black;
    text-decoration: none;
	font-weight:500;
	font-family:'Oswald', sans-serif;
    text-transform: uppercase;
    text-align:center;
">MIDNIGHT CUSTOMS</h1>

        <div class="social-icons">
            <a href="https://www.facebook.com/lifeguruuu" target="_blank" id="profile-link">
                <i class="fa-brands fa-facebook" style="color: black;"></i>
            </a>
            <a href="https://github.com/ChristianJoyGaray" target="_blank" id="profile-link">
                <i class="fa-brands fa-github" style="color: black;"></i>
            </a>
            <a href="https://www.linkedin.com/in/christian-garay-41a80b211/" target="_blank" id="profile-link">
                <i class="fa-brands fa-linkedin" style="color: black;"></i>
            </a>
            <a href="mailto:christianjoygaray123@gmail.com" target="_blank" id="profile-link">
                <i class="fa-solid fa-at" style="color: black;"></i>
            </a>
            <a href="tel:+63 999-361-1198" target="_blank" id="profile-link">
                <i class="fa-solid fa-phone" style="color: black;""></i>
            </a> 
        </div>  
    </div>

</footer>




<?php wp_footer();?>
</body>
</html>