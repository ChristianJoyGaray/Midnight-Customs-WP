<input type="hidden" name="registration" value="<?php the_field('registration');?>"/>

<!-- 
< ?php echo wp_create_nonce('test');?> -->

<form id="enquiry">

    <h2>Send an enquiry about <?php the_title();?></h2>

    

    <div id="success_message" class="alert alert-success" style="display:none;"></div>

    <div class="form-group row">

        <div class="col-lg-6 mb-3">

            <input type="text" name="fname" placeholder="First name" class="form-control" required/>

        </div>

        <div class="col-lg-6 mb-3">

            <input type="text" name="lname" placeholder="Last name" class="form-control" required/>

        </div>

    </div>
    
    <div class="form-group row">

        <div class="col-lg-6 mb-3">

            <input type="email" name="email" placeholder="Email Address" class="form-control" required/>

        </div>

        
        <div class="col-lg-6 mb-3">

            <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required/>

        </div>

    </div>

    <div class="form-group mb-3">

        <textarea name="enquiry" class="form-control" placeholder="Your enquiry" required></textarea>
    </div>

    <div class="form-group d-grid">

        <button type="submit" class="btn btn-success">Send your enquiry</button>
    </div>


</form>

<script>


(function($){



    $('#enquiry').submit( function(event){


        event.preventDefault();

        var endpoint = '<?php echo admin_url('admin-ajax.php');?>';

        var form = $('#enquiry').serialize();

        var formdata = new FormData;

        formdata.append('action','enquiry');
        formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce');?>');
        formdata.append('enquiry', form);

        

        $.ajax(endpoint, {

            type:'POST',
            data:formdata,
            processData: false,
            contentType: false,


            success: function(res){

                    $('#enquiry').fadeOut(200);

                    $('#success_message').text('Thanks for your enquiry.').show();

                    $('#enquiry').trigger('reset');

                    $('#enquiry').fadeIn(500);



            },


            error: function(err)
            {
                alert(err.responseJSON.data);

            }


        })

    })



})(jQuery)


</script>