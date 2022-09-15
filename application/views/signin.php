<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'signin/registeration'); ?>
				<h2 class="text-center">Sign in</h2>       
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" required="required" name="username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div class="form-group">
            		<input type="email" class="form-control" placeholder="email" required="required" name="email">
					</div>
					<div>
						<select name = "secretquestion" id="secretquestion">
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
						<div class = "form-outline flex-fill mb-0">
							<input type="text" id="form3Example4cd" class="form-control" name="secretanswer"/>
							<label class="form-label" for="form3Example4cd" name="secretanswer">Please complete your secret question</label>
						</div>
					</div>
					<div class="form-group">
        			</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Sign in</button>
					</div>  
			<?php echo form_close(); ?>
	</div>
</div>
