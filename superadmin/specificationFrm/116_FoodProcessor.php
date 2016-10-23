<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Available
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['warranty_details_warranty_available'] == 'Manufecture Warranty') echo "selected";?>>Manufecture Warranty</option>
			<option  <?php if($res['warranty_details_warranty_available'] == 'Sellar Warranty') echo "selected";?>>Sellar Warranty</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Power Comsumption Range
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="power_details_power_consumption_range">
			<option value="">Select</option>
			<option <?php if($res['power_details_power_consumption_range'] == '1001 Watts & Above') echo "selected";?>>1001 Watts & Above</option>
			<option  <?php if($res['power_details_power_consumption_range'] == '250W Voltage') echo "selected";?>>250W Voltage</option>
			<option  <?php if($res['power_details_power_consumption_range'] == '400 Watts & Below') echo "selected";?>>400 Watts & Below</option>
			<option  <?php if($res['power_details_power_consumption_range'] == '401-600 Watts') echo "selected";?>>401-600 Watts</option>
			<option  <?php if($res['power_details_power_consumption_range'] == '50 Watts & Below') echo "selected";?>>50 Watts & Below</option>
			<option  <?php if($res['power_details_power_consumption_range'] == '601-800 Watts') echo "selected";?>>601-800 Watts</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Warranty Duration
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="warranty_details_duration" value="<?=$res['warranty_details_duration']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model Number
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="model_model_number" value="<?=$res['model_model_number']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Blade Type
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="blade_features_blade_type">
			<option value="">Select</option>
			<option <?php if($res['blade_features_blade_type'] == 'Detachable') echo "selected";?>>Detachable</option>
			<option  <?php if($res['blade_features_blade_type'] == 'Fixed') echo "selected";?>>Fixed</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chutney JAr
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="jar_features_chutney_jar" value="<?=$res['jar_features_chutney_jar']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grinding JAr
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="jar_features_wet_grinding_jar" value="<?=$res['jar_features_wet_grinding_jar']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Speed Setting
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="general_details_speed_settings" value="<?=$res['general_details_speed_settings']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Features
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="additional_features_features" value="<?=$res['additional_features_featuresssss']?>">
	</div>
</div>