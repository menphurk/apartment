<div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>สร้างผู้เช่า</h2>
                        </div>
                        <?php 
                            if(validation_errors()){ // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
                                echo   validation_errors();
                                echo "<br>";
                            }                        
                        ?>
                        <?php echo form_open_multipart('member/save'); ?>
                        <div class="bsc-tbl">
                            <div class="form-example-int">
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ชื่อผู้ใช้งาน</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="email" id="email" value="<?php echo set_value('email');?>" placeholder="อีเมล์">
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
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="first_name" id="first_name" value="<?php echo set_value('first_name');?>" placeholder="ชื่อ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>นามสกุล</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="last_name" id="last_name" value="<?php echo set_value('last_name');?>" placeholder="นามสกุล">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>วันเดือนปีเกิด</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="birthday" id="birthday" value="<?php echo set_value('birthday'); ?>" placeholder="วันเดือนปีเกิด">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>เพศ</label>
                                        <div class="nk-int-st">
                                            <select class="form-control input-sm" name="gender" id="gender">
                                                <option>--- กรุณาเลือก ---</option>
                                                <option value="male">ชาย</option>
                                                <option value="female">หญิง</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-12">
                                    <div class="form-group">
                                        <label>ที่อยู่</label>
                                        <div class="nk-int-st">
                                            <textarea class="form-control input-sm" placeholder="ที่อยู่" name="address" id="address" cols="30" rows="10"><?php echo set_value('address'); ?></textarea>
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
                                        <label for="">รูปประจำตัว</label>
                                        <div class="nk-int-st">
                                            <input type="file" class="form-control input-sm" name="picture" id="picture" placeholder="รูปประจำตัว">
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