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
                            <p>จองห้องพัก</p>
                            <table class="table table-sc-ex">
                                <tbody>
                                    <?php
                                    if($rooms >= 1){
                                        echo "<tr>";
                                        foreach ($rooms as $key => $room) {
                                            if($room->status == 0){
                                                $status = "ว่าง";
                                            }else if($room->status == 1){
                                                $status = "จองแล้ว";
                                            }
                                        echo "<td><div class='box'>".$room->code_place_room.$room->code_floor_room."<br>".$room->name."<br>".$status."</div></td>";
                                        }
                                        echo "</tr>";
                                    }else{
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