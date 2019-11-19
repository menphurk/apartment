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
                            <td>ชื่อหอพัก</td>
                            <td><?php echo $dorm[0]->name; ?></td>
                        </tr>
                        <tr>
                            <td>ชื่อ</td>
                            <td><?php echo $dorm[0]->address; ?></td>
                        </tr>
                        <tr>
                            <td>อีเมล์แอดเดรส</td>
                            <td><?php echo $dorm[0]->phone; ?></td>
                        </tr>
                        <tr>
                            <td>รูปภาพหอพัก</td>
                            <td><img src="<?php echo base_url(); ?>upload/dorm/<?php echo $dorm[0]->images; ?>" width="50%" class="img-responsive"></td>
                        </tr>
                    </table>
                    <button class="btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect" onclick="window.location.href='<?php echo base_url(); ?>dorm/edit/<?php echo $dorm[0]->id; ?>'"><i class="notika-icon notika-edit"></i> แก้ไข</button>
                </div>
            </div>
        </div>
    </div>
</div>