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
          <div class="">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
              <div class="page-header">
                <h1 class="centered">Food & Beverage Order</h1>
              </div>
              <?php if(validation_errors() != false): ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif ?>          
            </div>
            <div class="container">
              <form action="" method="POST" id="form-submit" enctype="multipart/form-data" class="form-div span12" accept-charset="utf-8">
                <?php foreach ($items as $item):?>
                  <?php if(!isset($item['contacts'])): ?>
                    <div class="alert alert-danger">
                      <?php echo "No Data For Such Hotel Room!"; ?>
                    </div>
                  <?php endif ?> 
                <?php endforeach ?>
                <table class="table table-striped table-bordered table-condensed">
                  <tr class="item-row">
                    <td class="align-left table-label">Room</td>
                    <td class="align-left table-label">Name</td>
                    <td class="align-left table-label">Nationality</td>
                    <td class="align-left table-label">No. Pax</td>
                    <td class="align-left table-label">Break Box</td>
                    <td class="align-left table-label">Date and Time</td>
                    <td class="align-left table-label">Lunch Box</td>
                    <td class="align-left table-label">Royal Lunch</td>
                    <td class="align-left table-label">Date and Time</td>
                    <td class="align-left table-label">Late Dinner</td>
                    <td class="align-left table-label">Date and Time</td>
                    <td class="align-left table-label">Cold Cuts</td>
                    <td class="align-left table-label">Date and Time</td>
                  </tr>
                  <?php foreach ($items as $item):?>
                    <?php foreach($item['contacts'] as $contact):?>
                      <tr class="item-row">
                        <td class="align-left table-label" style="display: none">
                          <input class="form-control" name="rooms[<?php echo $item['id']?>][id]" value="<?php echo $item['id']?>">
                        </td>
                        <td class="align-left table-label">
                          <input readonly="" type="text" name="rooms[<?php echo $item['id']?>][room]" class="form-control" value="<?php echo $item['room']; ?>" style="width: 50px;"/>
                        </td>             
                        <td class="align-left table-label">
                          <input readonly="" type="text" name="rooms[<?php echo $item['id']?>][guest]" class="form-control" value="<?php echo $contact['guest_name']; ?>" style="width: 100px;"/>
                        </td>
                        <td class="align-left table-label">
                          <input readonly="" type="text" name="rooms[<?php echo $item['id']?>][nationality]" class="form-control" value="<?php echo $contact['nation']; ?>" style="width: 100px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][pax]" class="form-control" value="" style="width: 50px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][break]" class="form-control" value="" style="width: 80px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <div class='input-group date' id='datetimepicker<?php echo $item['id']; ?>' style="width: 200px;">
                            <input type='text' class="form-control" name="rooms[<?php echo $item['id']?>][date]"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][lunch]" class="form-control" value="" style="width: 80px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][royal]" class="form-control" value="" style="width: 80px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <div class='input-group date' id='datetimepicker<?php echo $item['id']; ?>1' style="width: 200px;">
                            <input type='text' class="form-control" name="rooms[<?php echo $item['id']?>][date1]"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][dinner]" class="form-control" value="" style="width: 80px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <div class='input-group date' id='datetimepicker<?php echo $item['id']; ?>2' style="width: 200px;">
                            <input type='text' class="form-control" name="rooms[<?php echo $item['id']?>][date2]"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                        </td>
                        <td class="align-left table-label">
                          <input type="text" name="rooms[<?php echo $item['id']?>][cold]" class="form-control" value="" style="width: 80px;"/> 
                        </td>
                        <td class="align-left table-label">
                          <div class='input-group date' id='datetimepicker<?php echo $item['id']; ?>2' style="width: 200px;">
                            <input type='text' class="form-control" name="rooms[<?php echo $item['id']?>][date3]"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endforeach ?>
                </table>
                <script type="text/javascript">
                  document.rooms = <?php echo json_encode($this->input->post('rooms')); ?>;
                </script>
                <div class="form-group col-lg-12 col-md-10 col-sm-12 col-xs-12">
                  <input type="hidden" name="fb_id" value="<?php echo $fb['id']; ?>" />
                  <label for="offers" class="col-lg-3 col-md-4 col-sm-5 col-xs-5 control-label">Report Files</label>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input id="offers" name="upload" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
                  </div>
                  <script>
                    $("#offers").fileinput({
                      uploadUrl: "/fb_order/make_offer/<?php echo $fb['id'] ?>", // server upload action
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
                            {url: "/fb_order/remove_offer/<?php echo $fb['id'] ?>/<?php echo $upload['id'] ?>", key: "<?php echo $upload['name']; ?>"},
                        <?php endforeach; ?>
                      ],
                    });
                  </script>
                </div>
                <div style="    margin-top: 90px;" class="form-group">
                  <div class="col-lg-offset-3 col-lg-10 col-md-10 col-md-offset-3">
                    <br>
                    <br>
                    <br>
                    <br>
                    <input name="submit" value="Submit" type="submit" class="btn btn-success" />
                    <a href="<?= base_url(); ?>fb_order" class="btn btn-warning">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php foreach ($items as $item):?>
      <script type="text/javascript">
        $(function () {
          $('#datetimepicker<?php echo $item['id']; ?>').datetimepicker();
        });
      </script>
      <script type="text/javascript">
        $(function () {
          $('#datetimepicker<?php echo $item['id']; ?>1').datetimepicker();
        });
      </script>
      <script type="text/javascript">
        $(function () {
          $('#datetimepicker<?php echo $item['id']; ?>2').datetimepicker();
        });
      </script>
      <script type="text/javascript">
        $(function () {
          $('#datetimepicker<?php echo $item['id']; ?>3').datetimepicker();
        });
      </script>
    <?php endforeach ?>
  </body>
</html>
