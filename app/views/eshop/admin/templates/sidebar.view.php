<?php
/**
 * @var $userData
 */
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="<?= ADMIN_ASSETS?>/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?=$userData['userData']['name']?></h5>

            <li class="mt">
                <a href="<?=ROOT?>admin">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li >
                <a href="<?=ROOT?>">
                    <i class="fa fa-shopping-cart"></i>
                    <span >SHOP SITE</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="general.html">General</a></li>
                    <li><a  href="buttons.html">Buttons</a></li>
                    <li><a  href="panels.html">Panels</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>