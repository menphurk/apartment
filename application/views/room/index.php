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
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รหัสห้อง</th>
                                        <th>ชื่อห้อง</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($rooms >= 1){
                                        foreach ($rooms as $key => $room) {
                                        echo "<tr>";
                                            echo "<td>".$room->id."</td>";
                                            echo "<td>".$room->code_place_room."".$room->code_floor_room."</td>";
                                            echo "<td>".$room->name."</td>";
                                            echo "<td>
                                                <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."room/show/".$room->id."'><i class='notika-icon notika-eye'></i></button>
                                                <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."room/edit/".$room->id."'><i class='notika-icon notika-edit'></i></button>
                                                <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."room/delete/".$room->id."'><i class='notika-icon notika-trash'></i></button>
                                            </td>";
                                        echo "</tr>";
                                        }
                                    }else{
                                        echo "";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="pagination-inbox">
                                <ul class="wizard-nav-ac">
                                    <?php echo $links; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>