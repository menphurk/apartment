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
                <?php echo form_open_multipart('dorm/update');
                echo form_hidden('id', $dorm[0]->id);
                ?>
                <div class="bsc-tbl">
                    <div class="form-example-int">
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>ชื่อหอพัก</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="name" id="name" value="<?php echo $dorm[0]->name; ?>" placeholder="ชื่อ">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>ที่อยู่หอพัก</label>
                                <div class="nk-int-st">
                                    <textarea class="form-control input-sm" name="address" id="address" placeholder="ที่อยู่หอพัก"><?php echo $dorm[0]->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>เบอร์โทร</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="phone" id="phone" value="<?php echo $dorm[0]->phone; ?>" placeholder="เบอร์โทร">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-b-15 col-lg-6">
                            <div class="form-group">
                                <label>รูปหอพัก</label>
                                <div class="nk-int-st">
                                    <input type="file" class="form-control input-sm" name="picture" id="picture" value="" placeholder="รูปหอพัก">
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-t-15">
                            <button type="submit" class="btn btn-success notika-btn-success">ปรับปรุง</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>