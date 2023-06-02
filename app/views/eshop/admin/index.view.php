<?php
/**
 * @var $data
 */
?>
<?php $this->view('admin/templates/header',  ['title' => 'admin']);?>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<?php $this->view('admin/templates/sidebar',  ['title' => 'admin', 'userData' => $data]);?>

      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Blank Page</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<p>Place your content here.</p>
          		</div>
          	</div>

<!--          --><?php //show($data)?>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php $this->view('admin/templates/footer');?>