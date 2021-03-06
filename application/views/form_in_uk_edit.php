<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header'); ?>
  </head>
  <body>
    <div id="wrapper">
      <?php $this->load->view('menu') ?>
      <div id="page-wrapper">
        <div class="a4wrapper">
          <div class="a4page" style="margin-bottom: 20px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
              <?php if(validation_errors() != false): ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif ?>
              <div class="page-header">
                <h3>Edit In House Incident Report-UK Form</h3>
              </div>
            </div>
            <form action="" method="POST" id="form-submit" enctype="multipart/form-data" class="form-div span12" accept-charset="utf-8">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">SUNRISE To Complete</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Hotel Name </label>
                  <select class="form-control" name="hotel_id" id="from-hotel " style="width: 30%;">
                    <option data-company="0" value="<?php echo $form['hotel_id']; ?>"><?php echo $form['hotel_name']; ?></option>
                    <?php foreach ($hotels as $hotel): ?>
                    <option value="<?php echo $hotel['id'] ?>" <?php echo set_select('hotel_id',$hotel['id'] ); ?>><?php echo $hotel['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-type" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width:200px;">Name of IRF</label>
                  <input type="text" name="irf" class="form-control" value="<?php echo $form['irf']; ?>" style=" height:38px; width: 30%;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Name of Guest </label>
                  <input type="text" name="guest" class="form-control" value="<?php echo $form['guest']; ?>" style=" height:38px; width: 30%; margin:5px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-type" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width:200px;">Booking Referance</label>
                  <input type="text" name="referance" value="<?php echo $form['referance']; ?>" class="form-control" style=" height:38px; width: 30%;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Room number </label>
                  <input type="text" name="room" class="form-control" value="<?php echo $form['room']; ?>" style=" height:38px; width: 30%; margin:5px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> UK contact details for guest - address </label>
                  <input type="text" name="address" class="form-control" value="<?php echo $form['address']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Personal Comment</label>
                  <textarea type="text" name="comment" class="form-control" style=" width: 600px; height:100px;"/><?php echo $form['comment']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Postcode </label>
                  <input type="text" name="postcode" class="form-control" value="<?php echo $form['postcode']; ?>" style=" height:38px; width: 30%; margin:5px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Email address </label>
                  <input type="text" name="email" class="form-control" value="<?php echo $form['email']; ?>" style=" height:38px; width: 30%;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Date of Arrival </label>
                  <div class='input-group date' id='datetimepicker' style="width: 30%; margin:5px;">
                    <input type="text" name="arrival" class="form-control" value="<?php echo $form['arrival']; ?>" /> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                  </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Date of Departure </label>
                  <div class='input-group date' id='datetimepicker1' style=" width: 30%; margin:5px;">
                    <input type="text" name="departure" class="form-control" value="<?php echo $form['departure']; ?>" /> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                  </div> 
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Tour Operator </label>
                  <select class="form-control" name="operator_id" id="from-hotel " style="width: 30%;">
                    <option data-company="0" value="<?php echo $form['operator_id']; ?>"><?php echo $form['operator_name']; ?></option>
                    <?php foreach ($operators as $operator): ?>
                      <option value="<?php echo $operator['id'] ?>" <?php echo set_select('operator_id',$operator['id'] ); ?>><?php echo $operator['name'] ?></option>
                    <?php endforeach ?>
                  </select>                  
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Type </label>
                  <select id="select_get_type" name="type" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['type']; ?>"><?php echo $form['type']; ?></option>
                    <option value="Other">Other</option>
                    <option value="Illness">Illness</option>
                    <option value="Accident">Accident</option>
                    <option value="Assault">Assault</option>
                    <option value="Inappropriate Behaviour Of Guests">Inappropriate Behaviour Of Guests </option>
                    <option value="Inappropriate Behaviour Of Staff">Inappropriate Behaviour Of Staff</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">UK Contact Details For Guest</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Address </label>
                  <input type="text" name="address1" class="form-control" value="<?php echo $form['address1']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Telephone </label>
                  <input type="text" name="telephone" class="form-control" value="<?php echo $form['telephone']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Email </label>
                  <input type="text" name="email1" class="form-control" value="<?php echo $form['email1']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Date and Time of Delivery </label>
                  <div class='input-group date' id='datetimepicker2' style="width: 30%; margin:5px;">
                    <input type='text' class="form-control" name="reporting" value="<?php echo $form['reporting']; ?>" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Who the incident was reported to (position, name) </label>
                  <input type="text" name="reported" class="form-control" value="<?php echo $form['reported']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Is this an accident, illness, assault, loss of valuables, quality issues or others or multiple issues?</label>
                  <select id="select_get_type" name="accident" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['accident']; ?>"><?php echo $form['accident']; ?></option>
                    <option value="Accident">Accident</option>
                    <option value="Illness">Illness</option>
                    <option value="Assault">Assault</option>
                    <option value="Loss of Valuables">Loss of Valuables</option>
                    <option value="Quality Issues">Quality Issues</option>
                    <option value="Other">Other</option>
                    <option value="Multiple Issues">Multiple Issues</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Comment</label>
                  <textarea type="text" name="comment1" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['comment1']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Number of party affected </label>
                  <input type="text" name="affected" class="form-control" value="<?php echo $form['affected']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Names of all party affected</label>
                  <textarea type="text" name="names" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['names']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Date and Time of incident/start of illness </label>
                  <div class='input-group date' id='datetimepicker3' style=" width: 30%; margin:5px;">
                    <input type="text" name="date" class="form-control" value="<?php echo $form['date']; ?>" /> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                  </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Illness symptoms reported</label>
                  <textarea type="text" name="symptoms" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['symptoms']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Has the guest/s visited the Dr/hospital</label>
                  <select id="select_get_type" name="visited" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['visited']; ?>"><?php echo $form['visited']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Name of guest/s who received treatment</label>
                  <textarea type="text" name="treatment" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['treatment']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers" name="upload" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers").fileinput({
                      uploadUrl: "/form/make_offer_in_uk/<?php echo $form['id'] ?>/1",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads as $upload): ?>
                          {url: "/form/remove_offer_in_uk/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">What medication/treatment was received</label>
                  <textarea type="text" name="medication" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['medication']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> If hospitalized, detail duration </label>
                  <input type="text" name="duration" class="form-control" value="<?php echo $form['duration']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Location of accident </label>
                  <input type="text" name="location" class="form-control" value="<?php echo $form['location']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Cause of accident as stated by guest</label>
                  <textarea type="text" name="cause" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['cause']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Cause of accident as stated by any witness</label>
                  <textarea type="text" name="witness" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['witness']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Cause of accident as per the hotel investigation</label>
                  <textarea type="text" name="investigation" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['investigation']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;">Reason of complaints (not accident related)</label>
                  <textarea type="text" name="not_related" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['not_related']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Injury sustained </label>
                  <input type="text" name="injury" class="form-control" value="<?php echo $form['injury']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Is CCTV available</label>
                  <select id="select_get_type" name="cctv" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['cctv']; ?>"><?php echo $form['cctv']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id1" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers1" name="upload1" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers1").fileinput({
                      uploadUrl: "/form/make_offer_in_uk1/<?php echo $form['id'] ?>/2",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads1 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads1 as $upload): ?>
                          {url: "/form/remove_offer_in_uk1/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Have photographs been taken of the accident are</label>
                  <select id="select_get_type" name="photographs" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['photographs']; ?>"><?php echo $form['photographs']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id2" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers2" name="upload2" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers2").fileinput({
                      uploadUrl: "/form/make_offer_in_uk2/<?php echo $form['id'] ?>/3",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads2 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads2 as $upload): ?>
                          {url: "/form/remove_offer_in_uk2/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">If yes, please detail date and time photographs taken</label>
                  <textarea type="text" name="detail" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['detail']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Please detail actions taken by the hotel to satisfy the guest</label>
                  <textarea type="text" name="action" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['action']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Please detail actions taken by the hotel to fix and prevent in the future the cause of incident</label>
                  <textarea type="text" name="prevent" class="form-control" style=" width: 600px; height:100px;"><?php echo $form['prevent']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Is Guest Report available?</label>
                  <select id="select_get_type" name="report" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['report']; ?>"><?php echo $form['report']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id3" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers3" name="upload3" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers3").fileinput({
                      uploadUrl: "/form/make_offer_in_uk3/<?php echo $form['id'] ?>/4",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads3 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads3 as $upload): ?>
                          {url: "/form/remove_offer_in_uk3/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Are Witness Reports available?</label>
                  <select id="select_get_type" name="reports" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['reports']; ?>"><?php echo $form['reports']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id4" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers4" name="upload4" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers4").fileinput({
                      uploadUrl: "/form/make_offer_in_uk4/<?php echo $form['id'] ?>/5", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads4 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads4 as $upload): ?>
                          {url: "/form/remove_offer_in_uk4/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Is Indemnity Report available (not TC guests)</label>
                  <select id="select_get_type" name="indemnity" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['indemnity']; ?>"><?php echo $form['indemnity']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id5" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers5" name="upload5" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers5").fileinput({
                      uploadUrl: "/form/make_offer_in_uk5/<?php echo $form['id'] ?>/6", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads5 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads5 as $upload): ?>
                          {url: "/form/remove_offer_in_uk5/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div> 
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">Dealing With TO</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Had a TO / TL been informed?</label>
                  <select id="select_get_type" name="informed" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['informed']; ?>"><?php echo $form['informed']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">TO / TL comments</label>
                  <textarea type="text" name="comments" class="form-control" style=" width: 600px; height: 100px; margin:10px;"><?php echo $form['comments']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Had been added by TL to the Matsoft system</label>
                  <select id="select_get_type" name="added" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['added']; ?>"><?php echo $form['added']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Compensation had been given to the guest in house and had been mentioned in the Matsoft system by TL</label>
                  <textarea type="text" name="compensation" class="form-control" style=" width: 600px; height: 100px; margin:10px;"><?php echo $form['compensation']; ?></textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Value of compensation (in L.E) </label>
                  <input type="number" class="form-control" name="value" value="<?php echo $form['value']; ?>"  style="width: 30%; margin-top: 7px"/></input> 
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Had the compensation been accepted by guest</label>
                  <select id="select_get_type" name="accepted" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['accepted']; ?>"><?php echo $form['accepted']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label " style="margin:5px; width: 200px;"> Confirmed by TL given compensation in house which had been added to Matsoft system </label>
                  <input type="text" name="given" class="form-control" value="<?php echo $form['given']; ?>" style=" height:38px; width: 30%; margin: 15px;"/>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Follow Up with the guests (date and comments)</label>
                  <textarea type="text" name="follow" class="form-control" style=" width: 600px; height: 100px"><?php echo $form['follow']; ?></textarea>
                </div>    
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">Dealing With Insurance</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Had the insurance been informed (for accidents / illness only)</label>
                  <select id="state" name="insurance" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%;">
                    <option value="<?php echo $form['insurance']; ?>"><?php echo $form['insurance']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div id='informed' style="display: <?php echo ($form['insurance'] != "Yes")? "none":"block";?>">
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Date the Insurance been informed by the hotel </label>
                    <div class='input-group date' id='datetimepicker4' style="width: 30%;">
                      <input type="text" name="informed1" class="form-control" value="<?php echo $form['informed1']; ?>" /> 
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                    </div>
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Date the Insurance been responded to the hotel and the comments </label>
                    <div class='input-group date' id='datetimepicker5' style="width: 30%;">
                      <input type="text" name="responded" class="form-control" value="<?php echo $form['responded']; ?>" /> 
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">Additional Documents Available</h5>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Are Witness Reports available?</label>
                  <select id="select_get_type" name="witness1" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['witness1']; ?>"><?php echo $form['witness1']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id6" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers6" name="upload6" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers6").fileinput({
                      uploadUrl: "/form/make_offer_in_uk6/<?php echo $form['id'] ?>/7",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads6 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads6 as $upload): ?>
                          {url: "/form/remove_offer_in_uk6/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div> 
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Tour Operator Paperwork</label>
                  <select id="select_get_type" name="paperwork" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['paperwork']; ?>"><?php echo $form['paperwork']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id7" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers7" name="upload7" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers7").fileinput({
                      uploadUrl: "/form/make_offer_in_uk7/<?php echo $form['id'] ?>/8", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads7 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads7 as $upload): ?>
                          {url: "/form/remove_offer_in_uk7/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div> 
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Cristal Audit</label>
                  <select id="select_get_type" name="cristal" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['cristal']; ?>"><?php echo $form['cristal']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id8" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers8" name="upload8" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers8").fileinput({
                      uploadUrl: "/form/make_offer_in_uk8/<?php echo $form['id'] ?>/9", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads8 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads8 as $upload): ?>
                          {url: "/form/remove_offer_in_uk8/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;">Tour Operator Audit (any audits the TO has completed)</label>
                  <select id="select_get_type" name="audits" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['audits']; ?>"><?php echo $form['audits']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id9" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers9" name="upload9" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers9").fileinput({
                      uploadUrl: "/form/make_offer_in_uk9/<?php echo $form['id'] ?>/10", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads9 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads9 as $upload): ?>
                          {url: "/form/remove_offer_in_uk9/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Cleaning logs available for date/location of the accident</label>
                  <select id="select_get_type" name="logs" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['logs']; ?>"><?php echo $form['logs']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id10" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers10" name="upload10" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers10").fileinput({
                      uploadUrl: "/form/make_offer_in_uk10/<?php echo $form['id'] ?>/11", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads10 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads10 as $upload): ?>
                          {url: "/form/remove_offer_in_uk10/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Maintenance Logs for location of the accident</label>
                  <select id="select_get_type" name="maintenance" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['maintenance']; ?>"><?php echo $form['maintenance']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id11" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers11" name="upload11" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers11").fileinput({
                      uploadUrl: "/form/make_offer_in_uk11/<?php echo $form['id'] ?>/12",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads11 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads11 as $upload): ?>
                          {url: "/form/remove_offer_in_uk11/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div> 
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Any other documents (e.g. Courtesy calls, GSC, GCF, restaurant questionnaire records)</label>
                  <select id="select_get_type" name="documents" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['documents']; ?>"><?php echo $form['documents']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id12" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers12" name="upload12" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers12").fileinput({
                      uploadUrl: "/form/make_offer_in_uk12/<?php echo $form['id'] ?>/13", 
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads12 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads12 as $upload): ?>
                          {url: "/form/remove_offer_in_uk12/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color: #5CB1D4">
                <h5 class="text-center" style="color: #FFFFFF;">Welfare Service (CCRM To Complete)</h5>
              </div>  
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Any other documents</label>
                  <select id="select_get_type" name="other" for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label form-control" style="width: 30%; margin-top: 18px;">
                    <option value="<?php echo $form['other']; ?>"><?php echo $form['other']; ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="In progress">In progress</option>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="fm_id13" value="<?php echo $form['id']; ?>" />
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin:5px; width: 200px;"> Upload</label> 
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers13" name="upload13" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers13").fileinput({
                      uploadUrl: "/form/make_offer_in_uk13/<?php echo $form['id'] ?>/14",
                      uploadAsync: true,
                      minFileCount: 1,
                      maxFileCount: 100,
                      overwriteInitial: false,
                      initialPreview: [
                        <?php foreach($uploads13 as $upload): ?>
                          "<div class='file-preview-text'>" +
                          "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                          "<a href='/assets/uploads/files/<?php echo $upload['name'] ?>'><?php echo $upload['name'] ?></a>" + "</div>",
                        <?php endforeach ?>
                      ],
                      initialPreviewConfig: [
                        <?php foreach($uploads13 as $upload): ?>
                          {url: "/form/remove_offer_in_uk13/<?php echo $form['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
              </div>
              <div style="    margin-top: 90px;" class="form-group">
                <div class="col-lg-offset-3 col-lg-10 col-md-10 col-md-offset-3">
                  <input name="submit" value="Confirm" type="submit" class="btn btn-success" />
                  <a href="<?= base_url(); ?>form/view_in_uk/<?php echo $form['id']; ?>" class="btn btn-warning">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY'
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker1').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY'
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker2').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY hh:mm a'
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker3').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY hh:mm a'
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker4').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY'
        });
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker5').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY'
        });
      });
    </script>
    <script type="text/javascript">
      var input = document.getElementById('state');
      var select = document.getElementById('informed');
      input.addEventListener('click', function () {
        if (input.value == 'Yes') {
          select.style.display = 'block';
        } else {
          select.style.display = 'none';
        }
      });
    </script> 
  </body>
</html>