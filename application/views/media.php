
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Content</p>

                                    <?php echo form_open(base_url() . 'workuplaod');?>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="filename" id="form3Example3c" class="form-control" />
                                            <label class="form-label" for="form3Example3c" name="filename">Workname</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example4c" class="form-control" name="authorname"/>
                                            <label class="form-label" for="form3Example4c" name="authorname">authorname</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="file" class="form-control" name="image"/>
                                            <label class="form-label" for="form3Example4cd" name="image">image</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input class="btn btn-primary btn-lg" type="submit" name="add" value="Enter" />
                                    </div>

                                <?php echo form_close(); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>