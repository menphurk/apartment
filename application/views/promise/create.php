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

						<div class="cmp-tb-hd">
							<h2>ผู้เช่า</h2>
						</div>

                        <div class="form-example-int col-lg-12">
                            <div class="form-group">
                                <label>ชื่อ - นามสกุล</label>
                                <div class="nk-int-st">
                                    <select class="form-control input-sm" name="member_id" id="member_id">
                                        <option value="">---</option>
                                        <?php
                                        foreach ($members as $member) {
                                            echo "<option value='" . $member->id . "'>" . $member->first_name ."&nbsp;&nbsp;". $member->last_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
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
