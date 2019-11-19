<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="normal-table-list">
                <div class="basic-tb-hd">
                    <h2><?php echo $title; ?></h2>
                </div>
                <div class="bsc-tbl">
                    <table class="table table-sc-ex">
                        <tr>
                            <td colspan="2" align="center">
                                <?php if ($member[0]->image_profile != 'picture') { ?>
                                    <img src="<?php echo base_url(); ?>upload/member/<?php echo $member[0]->image_profile; ?>" width="120">
                                <?php } else { ?>

                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>ชื่อ - นามสกุล</td>
                            <td><?php echo $member[0]->titlename; ?><?php echo $member[0]->first_name; ?><?php echo $member[0]->last_name; ?></td>
                        </tr>
                        <tr>
                            <td>เพศ</td>
                            <td>
                                <?php if ($member[0]->gender == "male") { ?>
                                    ชาย
                                <?php } else if ($member[0]->gender == "female") { ?>
                                    หญิง
                                <?php } ?>
                        </tr>
                        <tr>
                            <td>หมายเลขบัตรประชาชน</td>
                            <td><?php echo $member[0]->idcard; ?></td>
                        </tr>
                        <tr>
                            <td>หมายเลขโทรศัพท์มือถือ</td>
                            <td><?php echo $member[0]->phone; ?></td>
                        </tr>
                        <tr>
                            <td>อีเมล์แอดเดรส</td>
                            <td><?php echo $member[0]->email; ?></td>
                        </tr>
                        <tr>
                            <td>ที่อยู่ตามทะเบียนบ้าน</td>
                            <td><?php echo $member[0]->address; ?></td>
                        </tr>
                        <tr>
                            <td>ชื่อสถานที่ทำงาน</td>
                            <td><?php echo $member[0]->name_workplace; ?></td>
                        </tr>
                        <tr>
                            <td>ที่อยู่สถานที่ทำงาน</td>
                            <td><?php echo $member[0]->address_workplace; ?></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรสถานที่ทำงาน</td>
                            <td><?php echo $member[0]->phone_workplace; ?></td>
                        </tr>
                        <tr>
                            <td>ชื่อที่สามารถติดต่อได้เวลาฉุกเฉิน</td>
                            <td><?php echo $member[0]->name_emergency; ?></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรบุคคลที่สามารถติดต่อได้เวลาฉุกเฉิน</td>
                            <td><?php echo $member[0]->phone_emergency; ?></td>
                        </tr>
                    </table>
                    <button class="btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect" onclick="window.location.href='<?php echo base_url(); ?>member/edit/<?php echo $member[0]->id; ?>'"><i class="notika-icon notika-edit"></i> แก้ไข</button>
                </div>
            </div>
        </div>
    </div>
</div>