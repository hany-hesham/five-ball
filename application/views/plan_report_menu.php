
<form action="" method="POST" id="form-submit" class="form-div span12 noprint" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="dates form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<label for="year" class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label" style="margin-top:5px;">Year</label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<select class="form-control " name="year" id="year" style=" height:38px; width: 240px;">
					<option data-company="0" value="">Select Year..</option>
					<?php foreach ($years as $year): ?>
						
						<option value="<?php echo $year['year'] ?>" <?php echo set_select('year', $year['year']); ?>><?php echo $year['year'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<br>
			<br>
			<br>
			<label class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label" style="margin-top:5px;"> Item </label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<select class="form-control" name="item" id="from-hotel " style=" height:38px; width: 240px;">
                      <option data-company="0" value="">Select item..</option>
                      <?php foreach ($items as $item): ?>
                      <option value="<?php echo $item['name'] ?>" <?php echo set_select('item',$item['name'] ); ?>><?php echo $item['name'] ?></option>
                      <?php endforeach ?>
                    </select>        
			</div>
		</div>

	</div>
	
	<div class="form-group">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input name="submit" value="Submit" type="submit" class="btn btn-success" />
	    	<br>
			<br>
			<br>
	    </div>
	</div>
</form>