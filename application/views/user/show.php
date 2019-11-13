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
                            <td>ชื่อผู้ใช้งาน</td>
                            <td><?php echo $user[0]->username;?></td>
                        </tr>
                        <tr>
                            <td>ชื่อ</td>
                            <td><?php echo $user[0]->name; ?></td>
                        </tr>
                        <tr>
                            <td>อีเมล์แอดเดรส</td>
                            <td><?php echo $user[0]->email; ?></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรศัพท์</td>
                            <td><?php echo $user[0]->phone; ?></td>
                        </tr>
                    </table>
                    <button class="btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect" onclick="window.location.href='<?php echo base_url();?>user/edit/<?php echo $user[0]->id;?>'"><i class="notika-icon notika-edit"></i> แก้ไข</button>
                </div>
            </div>
        </div>
    </div>
</div>