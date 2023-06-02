<?php
/**
 * @var $data
 */
?>
<?php $this->view("templates/header", ['title' => 'Profile', 'userData' => $data]) ?>
    <section id="main-content">
        <section class="wrapper">
            <div style="min-height: 300px; max-width: 1000px; margin: auto">
                <div class="col-md-4 mb" style="background: #e5e5e5; padding: 0 0 0.75rem 0; text-align: center; box-shadow: 0px 0px 20px #aaa; border: solid thin #eee">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn">
                        <div  style="background: #262549; color: white; padding: 0.75rem; margin-bottom: 1rem">
                            <h5>MY ACCOUNT</h5>
                        </div>
<!--                        --><?php //show($data)?>
                        <p><img src="<?= ADMIN_ASSETS ?>/img/ui-zac.jpg" class="img-circle" width="80"></p>
                        <p style="color: #211f7f"><b><?=$data['userData']['name']?></b></p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="small mt" style="color: #211f7f">MEMBER SINCE</p>
                                <p style="color: #4c4c54"><?=date("j F Y", strtotime($data['userData']['date']))?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="small mt" style="color: #211f7f">TOTAL SPEND</p>
                                <p style="color: #4c4c54">$ 47,60</p>
                            </div>
                        </div>
                        <div class= "row">
                            <div class="col-md-6">
                                <p class="small mt" style="color: #318448; cursor: pointer; font-size: 1.5rem"><i class="fa fa-edit"> EDIT</i></p>
                            </div>
                            <div class="col-md-6">
                                <p class="small mt" style="color: #f40303; cursor: pointer; font-size: 1.5rem""><i class="fa fa-trash-o"> DELETE</i></p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->
            </div>
        </section>
    </section>
<?php $this->view('templates/footer', ['userData' => $data]); ?>