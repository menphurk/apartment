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
                            <td>รหัสห้อง</td>
                            <td><?php echo $room[0]->code_place_room;?><?php echo $room[0]->code_floor_room;?></td>
                        </tr>
                        <tr>
                            <td>ชื่อห้อง</td>
                            <td><?php echo $room[0]->name; ?></td>
                        </tr>
                        <tr>
                            <td>ราคาห้อง</td>
                            <td><?php echo $room[0]->price; ?></td>
                        </tr>
                        <tr>
                            <td>จำนวนคน/ห้อง</td>
                            <td><?php echo $room[0]->num_people; ?></td>
                        </tr>
                    </table>
                    <button class="btn btn-success notika-btn-success waves-effect" onclick="window.location.href='<?php echo base_url();?>room/edit/<?php echo $room[0]->id;?>'"><i class="notika-icon notika-edit"></i> แก้ไข</button>
                </div>
            </div>
        </div>
    </div>
</div>
