<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 non-printable">
	    <div class="col-lg-offset-3 col-lg-3 col-md-6 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
           	<select class="form-control chooosen" name="status[]" id="states" multiple="multiple" data-placeholder="Signature ..." style="width: 250px; height:33px;">
             	<?php foreach ($states as $state): ?>
               		<option value="<?php echo $state['id'] ?>"><?php echo $state['name'] ?></option>
             	<?php endforeach ?>
           	</select>
		</div>
	</div>
	<br>
	<br>
	<div class="noprint form-group">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input style="margin: 30px;" name="submit" value="Submit" type="submit" class="btn btn-success" />
	    </div>
	</div>
</form>