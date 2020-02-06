<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                <form action="<?php echo base_url();?>check_login" method="post">
                <?php 
                echo $this->session->flashdata('flash_message');
                if(validation_errors()){ // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
                    echo   validation_errors();
                    echo "<br>";
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    </div>
                </div>
                <div class="fm-checkbox">
                    
                </div>
                <button type="submit" class="btn btn-success notika-btn-success waves-effect">Login</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Login Register area End-->
