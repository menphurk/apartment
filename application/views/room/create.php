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
                        <?php echo form_open_multipart('room/save'); ?>
                        <div class="bsc-tbl">
                            <div class="form-example-int">
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ชื่อห้อง</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="name" id="name" value="<?php echo set_value('name');?>" placeholder="ชื่อห้องพัก">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ประเภทห้อง</label>
                                        <div class="nk-int-st">
                                            <select class="form-control input-sm" name="type_room_id" id="type_room_id">
                                                <option></option>
                                                <?php
                                                foreach ($typerooms as $typeroom) {
                                                    echo "<option value='".$typeroom->id."'>".$typeroom->name."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>ราคาห้อง</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="price" id="price" value="<?php echo set_value('price');?>" placeholder="ราคาห้อง">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label for="">รหัสอาคารห้องพัก</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="code_place_room" id="code_place_room" value="<?php echo set_value('code_place_room');?>" placeholder="รหัสอาคารห้องพัก">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>รหัสชั้นห้องพัก</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="code_floor_room" id="code_floor_room" value="<?php echo set_value('code_floor_room');?>" placeholder="รหัสชั้นห้องพัก">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-6">
                                    <div class="form-group">
                                        <label>จำนวนคน</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="num_people" id="num_people" value="<?php echo set_value('num_people');?>" placeholder="จำนวนคน">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-b-15 col-lg-12">
                                    <div class="form-group">
                                        <label>รูปห้อง</label>
                                        <div class="nk-int-st">
                                            <input type="file" class="form-control input-sm" name="picture" id="picture" value="<?php echo set_value('picture');?>" placeholder="รหัสชั้นห้องพัก">
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