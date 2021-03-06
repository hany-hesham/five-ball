<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 non-printable">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			<label for="from" class="date-lbl col-lg-1 col-md-1 col-sm-1 col-xs-1  control-label">Treatment:</label>
			<select class="form-control chooosen" name="treatment" id="treatment" data-placeholder="Treatment ...">
              	<option></option>
              	<?php foreach ($treatments as $treatment): ?>
                	<option value="<?php echo $treatment['id'] ?>"<?php echo set_select('treatment',$treatment['id'] ); ?>><?php echo $treatment['name'] ?></option>
              	<?php endforeach ?>
            </select>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<div class="dates form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 non-printable">
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
					format: "yyyy-mm-dd",
					viewMode: "days", 
					minViewMode: "days"
				});
			});
		</script>
	</div>	
	<div class="noprint form-group non-printable">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input style="margin: 30px;" name="submit" value="Submit" type="submit" class="btn btn-success" />
	    </div>
	</div>
</form>