<?php require_once ('cus_header.php') ?>
<?php require_once ('top.php') ?>
<?php require_once ('customer_side_bar.php') ?>


<?php echo form_open('Customer/EditRegDetails');?>

<div class="container" >

    <div id="the-massage"> </div>

        <div class="container">
            <div class="col-md-10" style="padding-left: 120px">
                <h1>Your Details</h1>
            </div>
            <div class="col-md-10" style="padding-left: 120px">
                <div class="container" style="padding-top: 10px">

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_id" style="color: grey">Your ID</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_id" value="<?php foreach ($customer as $cus) {?><?php echo $cus->customer_id; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="name" style="color: grey">Name</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_name" value="<?php foreach ($customer as $cus) {?><?php echo $cus->customer_name; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_nic" style="color: grey">NIC</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_nic" value="<?php foreach ($customer as $cus) {?><?php echo $cus->nic; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_address" style="color: grey">Customer Address</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_address" value="<?php foreach ($customer as $cus) {?><?php echo $cus->address; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_fixed_phone" style="color: grey">Phone Number (Fixed)</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_fixed_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_fixed_phone; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_mobile_phone" style="color: grey">Phone Number (Mobile)</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_mobile_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_mobile_phone; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="email" style="color: grey">Email</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="email" value="<?php foreach ($customer as $cus) {?><?php echo $cus->email; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_com_name" style="color: grey">Company Name</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_com_name" value="<?php foreach ($customer as $cus) {?><?php echo $cus->company_name; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_com_address" style="color: grey">Company Address</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_com_address" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_com_address; ?><?php }?>" required>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-2">
                            <label for="cus_com_phone" style="color: grey">Company Phone</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cus_com_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_com_phone; ?><?php }?>" required>
                        </div>
                    </div>

                    <br>
                    <div class="col-md-6">
                        <div class="row text-center" style="padding-top: 8px">
                            <button type="submit" class="btn btn-success" >Update Details</button>
                        </div>
                    </div>

                </div>
            </div>
            </div>--
        </div>
</div>

<?php echo form_close();?>

<!--<script>

    $('#form-edit').submit(function(e){
        e.preventDefault();
        //alert('submit');

        var me= $(this);

        $.ajax ({
            url : me.attr('action'),
            type : 'post',
            data : me.serialize(),
            dataType : 'json',
            success : function (response) {
                if(response.success == true){
                    //alert('success');
                    //show success massage
                    //remove error class
                    $('#the-massage').append('<div class= "alert alert-success" >'+
                        '<span class="glyphicon glyphicon-ok "></span>'+
                        'Register Successful' + '</div>');

                    $('.form-group').removeClass('has-error')
                        .removeClass('has-success');

                    $('.text-danger').remove();

                    //reset form
                    me[0].reset();

                    //close the massage after seconds
                    $('.alert-success').delay(500).show(10,function(){
                        $(this).delay(3000).hide(10,function(){
                            $(this).remove();
                        });
                    })
                }
                else{
                    //alert('failed');
                    $.each(response.massages, function(key,value){
                        var element = $("#"+ key);

                        element.closest('div.form-group')
                            .removeClass('has-error')
                            .addClass(value.length > 0 ? 'has-error':'has-success')
                            .find('.text-danger')
                            .remove();

                        element.after(value);
                    });
                }
            }
        });

    });


</script>-->