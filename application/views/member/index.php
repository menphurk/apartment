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
                                <th>หมายเลขบัตรประชาชน</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($members >= 1) {
                                foreach ($members as $key => $member) {
                                    echo "<tr>";
                                    echo "<td>" . $member->id . "</td>";
                                    echo "<td>" . $member->titlename . $member->first_name . " " . $member->last_name . "</td>";
                                    echo "<td>" . $member->idcard . "</td>";
                                    echo "<td>
                                            <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "member/show/" . $member->id . "'><i class='notika-icon notika-eye'></i></button>
                                            <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "member/edit/" . $member->id . "'><i class='notika-icon notika-edit'></i></button>
                                            <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "member/delete/" . $member->id . "'><i class='notika-icon notika-trash'></i></button>
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