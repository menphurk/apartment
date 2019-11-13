<div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2><?php echo $title; ?></h2>
                        </div>
                        <?php 
                            if(validation_errors()){ // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
                                echo   validation_errors();
                                echo "<br>";
                            }                        
                        ?>
                        <?php echo form_open_multipart('user/save'); ?>
                        <div class="bsc-tbl">
                            <div class="form-example-int">
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>คำนำหน้าชื่อ</label>
                                        <div class="nk-int-st">
                                            <select class="form-control input-sm" name="title_id" id="title_id">
                                                <option></option>
                                                <?php
                                                foreach ($prefixs as $prefix) {
                                                    echo "<option value='".$prefix->id."'>".$prefix->name."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="name" id="name" value="<?php echo set_value('name');?>" placeholder="ชื่อ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>อีเมล์แอดเดรส</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="email" id="email" value="<?php echo set_value('email');?>" placeholder="อีเมล์">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label for="">เบอร์โทรศัพท์</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ชื่อผู้ใช้งาน</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="username" id="username" value="<?php echo set_value('username');?>" placeholder="ชื่อผู้ใช้งาน">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>รหัสผ่าน</label>
                                        <div class="nk-int-st">
                                            <input type="password" class="form-control input-sm" name="password" id="password" value="" placeholder="รหัสผ่าน">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-example-int mg-t-15">
                                    <button type="submit" class="btn btn-success notika-btn-success">บันทึก</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>