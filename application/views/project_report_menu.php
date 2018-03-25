<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="dates form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="day-picker form-group col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<label for="from" class="date-lbl col-lg-1 col-md-1 col-sm-1 col-xs-1  control-label">From:</label>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<input type="text" class="form-control date" name="from" id="from" data-date-format="YYYY-MM-DD" value="<?php echo set_value('from'); ?>" />
			</div>

			<label for="to" class="date-lbl col-xs-offset-0 col-lg-1 col-md-1 col-sm-1 col-xs-1  control-label">To:</label>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<input type="text" class="form-control date" name="to" id="to" data-date-format="YYYY-MM-DD" value="<?php echo set_value('to'); ?>" />
			</div>
		</div>
		<script type="text/javascript">
		$(function () {
				$('.date').datepicker({
					autoclose: true,
					format: "yyyy-mm",
					viewMode: "months", 
					minViewMode: "months"

				});
				
		});
		</script>
		<br />
		<br />
		<br />
		<label class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label" style="margin-top:5px;"> Projects </label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<select class="form-control" name="project" id="from-hotel " style=" height:38px; width: 240px;">
                      <option data-company="0" value="">Select Project..</option>
                      <?php foreach ($project as $projects): ?>
                      <option value="<?php echo $projects['name'] ?>" <?php echo set_select('project',$projects['name'] ); ?>><?php echo $projects['name'] ?></option>
                      <?php endforeach ?>
                    </select>        
			</div>
	</div>
	
	<div class="noprint form-group">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input name="submit" value="Submit" type="submit" class="btn btn-success" />
	    	<br />
			<br />
			<br />
	    </div>
	</div>

</form>