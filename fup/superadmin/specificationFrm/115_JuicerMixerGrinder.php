<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Available
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['warranty_details_warranty_available'] == 'Manufacture Warranty') echo "selected";?>>Manufacture Warranty</option>
			<option  <?php if($res['warranty_details_warranty_available'] == 'Sellar Warranty') echo "selected";?>>Sellar Warranty</option>
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12">No. of Jars
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="mixers_processors_specification_no_of_jars">
			<option value="">Select</option>
			<option <?php if($res['mixers_processors_specification_no_of_jars'] == '1') echo "selected";?>>1</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '2') echo "selected";?>>2</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '3') echo "selected";?>>3</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '4') echo "selected";?>>4</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '5') echo "selected";?>>5</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '6') echo "selected";?>>6</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '7') echo "selected";?>>7</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '8') echo "selected";?>>8</option>
			<option  <?php if($res['mixers_processors_specification_no_of_jars'] == '9') echo "selected";?>>9</option>
		</select>
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Power
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="mixers_processors_specification_power">
			<option value="">Select</option>
			<option <?php if($res['mixers_processors_specification_power'] == '1000') echo "selected";?>>1000</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1100') echo "selected";?>>1100</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1200') echo "selected";?>>1200</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1400') echo "selected";?>>1400</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1500') echo "selected";?>>1500</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1600') echo "selected";?>>1600</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1700') echo "selected";?>>1700</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1800') echo "selected";?>>1800</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '1900') echo "selected";?>>1900</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '2000 & Above') echo "selected";?>>2000 & Above</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '200') echo "selected";?>>200</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '300') echo "selected";?>>300</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '400') echo "selected";?>>400</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '500') echo "selected";?>>500</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '550') echo "selected";?>>5500</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '600') echo "selected";?>>600</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '700') echo "selected";?>>700</option>
			<option  <?php if($res['mixers_processors_specification_power'] == '800') echo "selected";?>>800</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Automatic Shut-Off
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_automatic_shut_off" value="<?=$res['mixers_processors_specification_automatic_shut_off']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Safety Lock Function
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_safety_lock_function" value="<?=$res['mixers_processors_specification_safety_lock_function']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Color
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_color" value="<?=$res['mixers_processors_specification_color']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chutney Jar Capacity
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_chutney_jar_capacity" value="<?=$res['mixers_processors_specification_chutney_jar_capacity']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blender Jar Capacity
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_blender_jar_capacity" value="<?=$res['mixers_processors_specification_blender_jar_capacity']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grinder Jar Capacity
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_grinder_jar_capacity" value="<?=$res['mixers_processors_specification_grinder_jar_capacity']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Juice Extractor Jar
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_juice_extractor_jar" value="<?=$res['mixers_processors_specification_juice_extractor_jar']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dry Grinder Blade
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_dry_grinding_blade" value="<?=$res['mixers_processors_specification_dry_grinding_blade']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. of Speed Setting
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_no_of_speed_settings" value="<?=$res['mixers_processors_specification_no_of_speed_settings']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Voltage
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="mixers_processors_specification_voltage" value="<?=$res['mixers_processors_specification_voltagesss']?>">
	</div>
</div>