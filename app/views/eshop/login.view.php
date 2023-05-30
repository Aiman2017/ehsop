<?php $this->view("templates/header", ['title' => 'Login', $data])?>

<section id="form" style="margin-top: 5px"><!--form-->
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="post">
                            <?php if (!empty($_SESSION['error']['err'])):?>
                                <div class="btn btn-warning btn-lg btn-block">
                                    <?php checkError('err')?>
                                </div>
                            <?php endif;?>
							<input type="text" name="email" placeholder="Email Address" value="<?=$data['email'] ?? ''?>" />
							<span><?php checkError('validEmail')?></span>
							<input type="text" name="password" placeholder="Password" />
							<span><?php checkError('validPassword')?></span>

							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
                        <br>
                            <a href="<?=ROOT?>signup">Dont have an account? Signup here</a>
					</div><!--/login form-->
				</div>
			</div>
	</section><!--/form-->
	
	
<?php $this->view('templates/footer')?>