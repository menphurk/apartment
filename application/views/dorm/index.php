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
                                <th>ชือหอพัก</th>
                                <th>รูปหอพัก</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($dorms >= 1) {
                                foreach ($dorms as $key => $dorm) {
                                    echo "<tr>";
                                    echo "<td>" . $dorm->id . "</td>";
                                    echo "<td>" . $dorm->name . "</td>";
                                    echo "<td><img src='" . base_url() . "upload/dorm/" . $dorm->images . "' width='50%' class='img-responsive'></td>";
                                    echo "<td>
                                            <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "dorm/show/" . $dorm->id . "'><i class='notika-icon notika-eye'></i></button>
                                            <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "dorm/edit/" . $dorm->id . "'><i class='notika-icon notika-edit'></i></button>
                                            <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "dorm/delete/" . $dorm->id . "'><i class='notika-icon notika-trash'></i></button>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
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