<?php
/**
 * @var $data
 */
?>
<?php $this->view("templates/header", ['title' => 'Signup', $data])?>
    <section id="form" style="margin-top: 5px"><!--form-->
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">

                    <?php if (!empty($_SESSION['error']['checkEmail'])):?>
                        <div class="btn btn-warning btn-lg btn-block">
                            <?php checkError('checkEmail')?>
                        </div>
                    <?php endif;?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST">
                            <input type="text" placeholder="Name" name="name" value="<?= $data['name'] ?? ''?>"/>
                            <span style="color: red"><?php checkError('validUsername')?></span>
                            <input type="text" placeholder="Email Address" name="email" value="<?=$data['email']  ?? ''?>"/>
                            <span style="color: red"><?php checkError('validEmail')?></span>
                            <input type="password" placeholder="Password" name="password"/>
                            <span style="color: red"><?php checkError('validPassword')?></span>
                            <input type="password" placeholder="retypePassword" name="retypePassword"/>
                            <span style="color: red"><?php checkError('retypePassword')?></span>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                        <br>

                        <a style="margin-top: 4px" href="<?=ROOT?>login">Login here</a>
                    </div><!--/sign up form-->
                </div>
            </div>
    </section><!--/form-->


<?php $this->view('templates/footer')?>