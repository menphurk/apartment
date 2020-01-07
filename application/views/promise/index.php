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
                                <th>ชื่อ-นามสกุล</th>
                                <th>ห้อง</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($promises >= 1) {
                                foreach ($promises as $key => $promise) {
                                    echo "<tr>";
                                    echo "<td>" . $promise->id . "</td>";
                                    echo "<td>" . $promise->titlename . $promise->first_name . " " . $promise->last_name . "</td>";
                                    echo "<td>" . $promise->roomname . "</td>";
                                    echo "<td>
                                            <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "promise/show/" . $promise->id . "'><i class='notika-icon notika-eye'></i></button>
                                            <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "promise/edit/" . $promise->id . "'><i class='notika-icon notika-edit'></i></button>
                                            <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "promise/delete/" . $promise->id . "'><i class='notika-icon notika-trash'></i></button>
                                            <button class='btn btn-success notika-btn-success waves-effect' onclick=window.location.href='#'><i class='notika-icon notika-form'></i> ดูใบแจ้งหนี้</button>
                                          </td>";
                                    echo "</tr>";
                                }
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