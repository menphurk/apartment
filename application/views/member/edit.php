<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
                <div class="basic-tb-hd">
                    <h2><?php echo $title; ?></h2>
                </div>
                <?php
                if (validation_errors()) { // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
                    echo   validation_errors();
                    echo "<br>";
                }
                ?>
                <?php echo form_open_multipart('member/update');
                echo form_hidden('id', $member[0]->id);
                ?>
                <div class="bsc-tbl">
                    <div class="form-example-int">
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>คำนำหน้าชื่อ</label>
                                <div class="nk-int-st">
                                    <select class="form-control input-sm" name="title_id" id="title_id">
                                        <?php
                                        foreach ($prefixs as $prefix) {
                                            if ($prefix->id == $member[0]->title_id) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='" . $prefix->id . "' $selected>" . $prefix->name . "</option>";
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
                                    <input type="text" class="form-control input-sm" name="first_name" id="first_name" value="<?php echo $member[0]->first_name; ?>" placeholder="ชื่อ">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="last_name" id="last_name" value="<?php echo $member[0]->last_name; ?>" placeholder="นามสกุล">
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

                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>วันเดือนปีเกิด</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="birthday" id="birthday" value="<?php echo $member[0]->birthday; ?>" placeholder="วันเดือนปีเกิด">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>หมายเลขบัตรประชาชน</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="idcard" id="idcard" value="<?php echo $member[0]->idcard; ?>" placeholder="หมายเลขบัตรประชาชน">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>หมายเลขโทรศัพท์มือถือ</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="phone" id="phone" value="<?php echo $member[0]->phone; ?>" placeholder="หมายเลขโทรศัพท์มือถือ">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>อีเมล์แอดเดรส</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="email" id="email" value="<?php echo $member[0]->email; ?>" placeholder="อีเมล์แอดเดรส">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-12">
                            <div class="form-group">
                                <label>ที่อยู่ตามทะเบียนบ้าน</label>
                                <div class="nk-int-st">
                                    <textarea class="form-control input-sm" placeholder="ที่อยู่ตามทะเบียนบ้าน" name="address" id="address" cols="30" rows="10"><?php echo $member[0]->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label for="">ชื่อสถานที่ทำงาน</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="name_workplace" id="name_workplace" placeholder="ชื่อสถานที่ทำงาน" value="<?php echo $member[0]->name_workplace; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-12">
                            <div class="form-group">
                                <label>ที่อยู่สถานที่ทำงาน</label>
                                <div class="nk-int-st">
                                    <textarea class="form-control input-sm" placeholder="ที่อยู่สถานที่ทำงาน" name="address_workplace" id="address_workplace" cols="30" rows="10"><?php echo $member[0]->address_workplace; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>เบอร์โทรสถานที่ทำงาน</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="phone_workplace" id="phone_workplace" placeholder="เบอร์โทรสถานที่ทำงาน" value="<?php echo $member[0]->phone_workplace; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label for="">รูปภาพของผู้ใช้</label>
                                <div class="nk-int-st">
                                    <input type="file" class="form-control input-sm" name="picture" id="picture" placeholder="รูปประจำตัว">
                                </div>
                            </div>
                        </div>
                        <div class="basic-tb-hd mg-b-15 col-lg-12">
                            <h2>บุคคลที่สามารถติดต่อได้เวลาฉุกเฉิน</h2>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="name_emergency" id="name_emergency" value="<?php echo $member[0]->name_emergency; ?>" placeholder="ชื่อ">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>เบอร์โทร</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="phone_emergency" id="phone_emergency" value="<?php echo $member[0]->phone_emergency; ?>" placeholder="เบอร์โทร">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15 col-lg-6">
                            <button type="submit" class="btn btn-success notika-btn-success">ปรับปรุง</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>