  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $room[0]->name;?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <?php if($room[0]->image == null){?>
                <img src="<?php echo base_url();?>/assets/frontend/img/property-1.jpg" alt="">
              <?php }else{ ?>
                <img src="<?php echo base_url();?>/upload/room/<?php echo $room[0]->image;?>" alt="">
              <?php } ?>
            </div>

          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">$</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c"><?php echo $room[0]->price;?></h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">ลักษณะห้อง</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>ประเภทห้อง:</strong>
                      <span>1134</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>จำนวนคน/ห้อง:</strong>
                      <span><?php echo $room[0]->num_people;?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">รายละเอียดห้อง</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  <?php echo $room[0]->description;?>
                </p>
              </div>
              <hr>
              <div class="amenities-list color-text-a text-center">
                <a href="" class="btn btn-a">จองห้องนี้</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--/ Property Single End /-->