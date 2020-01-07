<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
                <div class="basic-tb-hd">
                    <h2><?php echo $title; ?></h2>
                    <p></p>
                </div>
                <?php
                echo $this->session->flashdata('flash_message');
                ?>
                <div class="bsc-tbl">
                    <p><a href="<?php echo base_url(); ?>promise/create" class="btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect">ทำสัญญาเช่า</a></p>
                    <table class="table table-sc-ex">
                        <tbody>
                            <?php
                            if ($rooms >= 1) {
                                echo "<tr>";
                                foreach ($rooms as $key => $room) {
                                    if ($room->status == 0) {
                                        $status = "ว่าง";
                                    } else if ($room->status == 1) {
                                        $status = "จองแล้ว";
                                    }
                                    echo "<td><div class='box'>" . $room->code_place_room . $room->code_floor_room . "<br>" . $room->name . "<br>" . $status . "<br><a href='".base_url(). "room/show/" . $room->id ."' class='btn btn-info primary-icon-notika btn-reco-mg btn-button-mg waves-effect'>ดู</a> <a href='".base_url(). "room/edit/" . $room->id ."' class='btn btn-success notika-btn-success waves-effect'>แก้ไข</a></div></td>";
                                }
                                echo "</tr>";
                            } else {
                                echo "";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
