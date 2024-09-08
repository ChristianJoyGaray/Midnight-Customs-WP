<form  method="get" class="searchinput d-flex justify-content-center align-items-center">
    <!-- root for website "/" -->



        <label for="search"></label>

        <input type="hidden" name="cat,brands" value="5,10,11,12" />
        <!-- the "5" is from the ID of the 
         blogs not recipes("10"), which can be 
         located at the bottom left of the browser 
         when a link is hovered by the cursor -->


        <input type="text" name="s" id="search" value="<?php the_search_query();?>" required placeholder="Search content..."/>
        <!-- name is "s" bc that's how wordpress knows that we are doing a search request -->

        <button type="submit">Search</button>


</form>

