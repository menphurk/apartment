<div class="form-example-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-example-wrap">
                    <div class="cmp-tb-hd">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <?php
                    if (validation_errors()) { // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
                        echo   validation_errors();
                        echo "<br>";
                    }
                    ?>
                    <?php echo form_open('promise/save'); ?>
                    <div class="form-example-wrap">
                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>วันที่เข้าอยู่</label>
                                <div class="nk-int-st">
                                    <input type="date" class="form-control input-sm" placeholder="วันที่เข้าอยู่" value="<?php echo set_value('start_pro'); ?>" name="start_pro">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>วันที่สิ้นสุด</label>
                                <div class="nk-int-st">
                                    <input type="date" class="form-control input-sm" placeholder="วันที่สิ้นสุด" value="<?php echo set_value('end_pro'); ?>" name="end_pro">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>ห้อง</label>
                                <div class="nk-int-st">
                                    <select class="form-control input-sm" name="room_id">
                                        <?php
                                        foreach ($rooms as $room) {
                                            echo "<option value='" . $room->id . "'>" . $room->name . "&nbsp;(" . $room->code_place_room . $room->code_floor_room . ")</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>เงินประกัน</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="เงินประกัน" value="<?php echo set_value('recognizance'); ?>" name="recognizance">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>คำนำหน้าชื่อ</label>
                                <div class="nk-int-st">
                                    <select class="form-control input-sm" name="title_id" id="title_id">
                                        <option value="">---</option>
                                        <?php
                                        foreach ($prefixs as $prefix) {
                                            echo "<option value='" . $prefix->id . "'>" . $prefix->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="ชื่อ" value="<?php echo set_value('first_name'); ?>" name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="นามสกุล" value="<?php echo set_value('last_name'); ?>" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int col-lg-6"></div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>เบอร์โทรติดต่อสะดวก</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="เบอร์โทรติดต่อสะดวก" value="<?php echo set_value('phone'); ?>" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int col-lg-12">
                            <div class="form-group">
                                <label>ที่อยู่ที่ติดต่อสะดวก</label>
                                <div class="nk-int-st">
                                    <textarea class="form-control input-sm" placeholder="ที่อยู่ที่ติดต่อสะดวก" name="address" cols="10" rows="8"><?php echo set_value('address'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="cmp-tb-hd">
                            <h2>ผู้ติดต่อในกรณีฉุกเฉิน</h2>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="ชื่อ" name="firstname_emergency" value="<?php echo set_value('name_emergency'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="นามสกุล" name="lastname_emergency" value="<?php echo set_value('phone_emergency'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์ติดต่อ</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" placeholder="เบอร์โทรศัพท์ติดต่อ" name="phone_emergency" value="<?php echo set_value('phone_emergency'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int col-lg-6">
                            <div class="form-group">
                                <label>ความสัมพันธ์</label>
                                <select class="form-control input-sm" name="relationship_emergency">
                                    <option value="">---</option>
                                    <option value="father">พ่อ</option>
                                    <option value="mather">แม่</option>
                                    <option value="uncle">ลุง</option>
                                    <option value="friend">เพื่อน/เพื่อนสนิท</option>
                                    <option value="girlfriend">แฟน/คนรัก</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-example-int">
                            <button class="btn btn-success notika-btn-success" type="submit">บันทึก</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>