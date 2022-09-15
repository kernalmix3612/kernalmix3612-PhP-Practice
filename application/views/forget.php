<head>
    <style>
body{
    margin-top:20px;
    background-color: #f2f3f8;
}
.card {
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e5e9f2;
    border-radius: .2rem;
}
</style>
</head>


<body>
<div class="container h-100">
    		<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <?php echo form_open(base_url().'Forget/updatepassword'); ?>
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Reset password</h1>
							<p class="lead">
								1.Answer your secret question 2.Reset password
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>

                <div class="secretquestion">
                    <select name="secretquestion" id="secretquestion">
                      <option value="">Please choose one</option>
                      <option value="rigion">1.Where are you from?</option>
                      <option value="game">2.What is your favorite game?</option>
                      <option value="pokemon">3.Which pokemon do you like?</option>
                      <option value="university">4.Your university name.</option>
                      <option value="song">5.Your favourite song.</option>
                      <option value="singer">6.Your favourite singer.</option>
                    </select>
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example4cd" class="form-control" name="secretanswer"/>
                      <label class="form-label" for="form3Example4cd" name="secretanswer">Please answer your secret question</label>
                    </div>
                </div>

                                        <div class="form-group">
											<label>username</label>
											<input class="form-control form-control-lg" type="text" placeholder="Enter your username" name = "username">
										</div>
										<div class="form-group">
											<label>new password</label>
											<input class="form-control form-control-lg" type="text" placeholder="Enter your password" name = "password">
										</div>

										<div class="text-center mt-3">
											
											<button type="submit" class="btn btn-lg btn-primary" action="https://infs3202-3f694f0e.uqcloud.net/demo/Forget/updatepassword" method="post">Reset password</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php echo form_close(); ?>
</body>