<html>
    <head>
        <title>User Information</title>
    </head>   
    <body>
        <h2>This is your Information</h2><br/><br?>
        <div class="col-sm">
                <?php echo form_open(base_url() . 'UserInfoControl/showuserinfomation'); ?>
                <h2 class="text-center">Personnel Data</h2>
                <div class="form-group">
                   <p>Username:<?php echo $username?></p>
                </div>
                <div class="form-group">
                    <p>email:<?php echo $email;?></p>
                </div>
                <div>
                   <p>Birthday:<?php echo $Birthday;?></p>
                </div>
                <div>
                  <p>mobileNumber:<?php echo $mobileNumber?></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
    </body> 
</html>