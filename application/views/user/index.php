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
                                        <th>ชื่อ</th>
                                        <th>ชื่อผู้ใช้งาน</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $user) {
                                      echo "<tr>";
                                          echo "<td>".$user->id."</td>";
                                          echo "<td>".$user->name."</td>";
                                          echo "<td>".$user->username."</td>";
                                          echo "<td>
                                            <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."user/show/".$user->id."'><i class='notika-icon notika-eye'></i></button>
                                            <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."user/edit/".$user->id."'><i class='notika-icon notika-edit'></i></button>
                                            <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='".base_url()."user/delete/".$user->id."'><i class='notika-icon notika-trash'></i></button>
                                          </td>";
                                      echo "</tr>";
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