<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header'); ?>
  </head>
  <body>
    <div id="wrapper">
      <?php $this->load->view('menu') ?>
      <div id="page-wrapper">
        <div class="container">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <fieldset>
              <legend>Edit Late check out Report</legend>
              <?php if(validation_errors() != false): ?>
              <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
              </div>
              <?php endif ?>
              <form action="" method="POST" id="form-submit" enctype="multipart/form-data" class="form-div span12" accept-charset="utf-8">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin-top:5px;"> Hotel Name </label>
                  <select class="form-control" name="hotel_id" id="from-hotel " sDiscrepancy Reporttyle="width: 30%;" style="height:35px; width: 240px; ">
                    <option data-company="0" value="<?php echo $ch['hotel_id']; ?>"><?php echo $ch['hotel_name']; ?></option>
                    <?php foreach ($hotels as $hotel): ?>
                    <option value="<?php echo $hotel['id'] ?>" <?php echo set_select('hotel_id',$hotel['id'] ); ?>><?php echo $hotel['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label for="from-hotel" class="col-lg-2 col-md-2 col-sm-2 col-xs-2  control-label " style="margin-top:15px;"> Date </label>
                  <div class='input-group date' id='datetimepicker1' style=" width: 240px; margin:10px;">
                    <input type="text" name="date" class="form-control" value="<?php echo $ch['date']; ?>" /> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
                  </div>
                  <table class="table table-striped table-bordered table-condensed" style="width: 1200px;">
                    <thead>
                      <tr>
                        <th colspan="1" style=" text-align: center;">Room </th>
                        <th colspan="1" style=" text-align: center;">C.Out time </th>
                        <th colspan="1" style=" text-align: center;">Company </th>
                        <th colspan="1" style=" text-align: center;">Remarks </th>
                      </tr>
                    </thead>
                    <tbody id="items-container" data-items="1">
                      <?php if ($ch_room) {?>
                      <?php foreach ($ch_room as $room){?>
                        <tr id="item-<?php echo $room['id']?>">
                          <td hidden="">
                            <input class="form-control" name="items[<?php echo $room['id']?>][id]" value="<?php echo $room['id']?>">
                          </td>
                          <td class="centered" style="width: 200px;"> 
                            <input type="text" class="form-control" name="items[<?php echo $room['id']?>][room]" style="width: 200px; height:35px;" value="<?php echo $room['room']?>" /></input>
                          </td>
                          <td class="centered" style="width: 200px;"> 
                            <input type="time" class="form-control" name="items[<?php echo $room['id']?>][out]" style="width: 200px; height:35px;" value="<?php echo $room['out']?>" /></input>
                          </td>
                          <td class="centered" style="width: 200px;"> 
                            <input type="text" class="form-control" name="items[<?php echo $room['id']?>][comp]" style="width: 200px; height:35px;" value="<?php echo $room['comp']?>" /></input>
                          </td>
                          <td class="centered" style="width: 200px;"> 
                            <textarea type="text" class="form-control" name="items[<?php echo $room['id']?>][remarks]" style="width: 200px; height:35px;" /><?php echo $room['remarks']?></textarea>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php }else{ ?>
                <img src="/assets/images/Capture2.png" style="position: absolute; margin-top: 80px; margin-left:220px; ">
                  <?php for ($i=0; $i < 10; $i++) { ?>
                <tr class="item-row">
                  <td class="align-left table-label centered" style="width: 100px;">&nbsp;&nbsp;</td>
                  <td class="align-left table-label centered" style="width: 150px;">&nbsp;&nbsp;</td>
                  <td class="align-left table-label centered" style="width: 150px;">&nbsp;&nbsp;</td>
                  <td class="align-left table-label centered" style="width: 150px;">&nbsp;&nbsp;</td>
                </tr>
                  <?php } ?>
                <?php } ?>
                    </tbody>
                  </table>
                  <script type="text/javascript">
                    document.items = <?php echo json_encode($this->input->post('items')); ?>;
                  </script>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="hidden" name="ch_id" value="<?php echo $ch['id']; ?>" />
                      <label for="offers" class="col-lg-3 col-md-4 col-sm-5 col-xs-5 control-label">Report Files</label>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input id="offers" name="upload" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                      </div>
                      <script>
                      $("#offers").fileinput({
                          uploadUrl: "/late_ch/make_offer/<?php echo $ch['id'] ?>", // server upload action
                          uploadAsync: true,
                          minFileCount: 1,
                          maxFileCount: 5,
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
                              {url: "/late_ch/remove_offer/<?php echo $ch['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                          <?php endforeach; ?>
                          ],
                      });
                      </script>
                  </div> 
                </div>
                <div style="    margin-top: 90px;" class="form-group">
                  <div class="col-lg-offset-3 col-lg-10 col-md-10 col-md-offset-3">
                    <input name="submit" value="Submit" type="submit" class="btn btn-success" />
                    <a href="<?= base_url(); ?>late_ch" class="btn btn-warning">Cancel</a>
                  </div>
                </div>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <script id="item-template" type="text/x-handlebars-template">
        <tr id="item-{{id}}">
          <td class="centered" style="width: 200px;">
            <input type="text" class="form-control" style="height:35px; width: 200px; " name="items[{{id}}][room]" id="item-{{id}}-room" value="{{room}}"/>  
          </td>
          <td class="centered" style="width: 200px;">
            <input type="time" class="form-control" style="height:35px; width: 200px; " name="items[{{id}}][out]" id="item-{{id}}-out" value="{{out}}"/>
          </td>
          <td class="centered" style="width: 200px;">
            <input type="text" class="form-control" style="height:35px; width: 200px; " name="items[{{id}}][comp]" id="item-{{id}}-comp" value="{{comp}}"/>  
          </td>
          <td class="centered" style="width: 200px;">
            <textarea type="text" class="form-control" style="height:35px; width: 200px; " name="items[{{id}}][remarks]" id="item-{{id}}-remarks" value="{{remarks}}"/></textarea>
          </td>
          <td class="centered"  style="textareawidth: 150px;">
            <span data-item-id="{{id}}" class="form-actions btn btn-danger remove-item" style="width: 100px;">Remove</span>
          </td>
        </tr>
    </script>
    <script type="text/javascript">
      $(function(){
        $('#datetimepicker1').datetimepicker({
          viewMode:'days',
          format:'DD/MM/YYYY'
        });
      });
    </script>
  </body>
</html>
