<?php echo form_open_multipart('upload/do_upload');?>
<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-6 centered">
        <?php echo $error;?>
		<div class="form-group">
            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Content</p>
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" name="filename" id="form3Example3c" class="form-control" />
                    <label class="form-label" for="form3Example3c" name="filename">Filename</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4"> 
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div>
                    <input type="text" name="postTitle" id="form3Example3c" class="form-control" />
                    <label class="form-label" for="form3Example3c" name="postTitle">Title</label>
                </div>
            
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="form3Example4c" class="form-control" name="authorname"/>
                    <label class="form-label" for="form3Example4c" name="authorname">authorname</label>
                </div>
            </div>

            <input type="file" name="userfile" size="20" /> 
        </div>
		<div class="form-group">
            <input type="submit" value="upload" />
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<h3></h3>
<div class="main"> </div>
