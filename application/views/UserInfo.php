
<html>
    <head>
        <title>User Information</title>
    </head>   
    <body>
        <h2>Update your Information</h2><br/><br?>
        <div class="col-sm">
                <?php echo form_open(base_url() . 'UserInfoControl/updatePersonalinfo'); ?>
                <h2 class="text-center">Personnel Data</h2>
                <div class="form-group">
                    <input type="text" readonly class="form-control" placeholder="username" value=<?php echo $username; ?> name = "username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="email" value=<?php echo $email; ?> name = "email">
                </div>
                <div>
                   <input type="text" class="form-control" placeholder="Birthday" value=<?php echo $Birthday; ?> name = "Birthday">
                </div>
                <div>
                   <input type="text" class="form-control" placeholder="mobileNumber" value=<?php echo $mobileNumber; ?> name = "mobileNumber">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
    </body> 
</html>