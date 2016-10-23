<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Detail
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['warranty_details_warranty_available'] == 'Manufacturer Warranty') echo "selected";?>>Manufacturer Warranty</option>
			<option  <?php if($res['warranty_details_warranty_available'] == 'Seller Warranty') echo "selected";?>>Seller Warranty</option>
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Power Consumption
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="specification_of_air_fryers_deep_fryers_power_consumption">
			<option value="">Select</option>
			<option <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1000') echo "selected";?>>1000</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1200') echo "selected";?>>1200</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1400') echo "selected";?>>1400</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1500') echo "selected";?>>1500</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1600') echo "selected";?>>1600</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1700') echo "selected";?>>1700</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1800') echo "selected";?>>1800</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '1900') echo "selected";?>>1900</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '2000') echo "selected";?>>2000</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '700') echo "selected";?>>700</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '800') echo "selected";?>>800</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_power_consumption'] == '900') echo "selected";?>>900</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Fryers Type
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['specification_of_air_fryers_deep_fryers_type'] == 'Air Fryer') echo "selected";?>>Air Fryer</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_type'] == 'Deep Fryer') echo "selected";?>>Deep Fryer</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Fryers Color
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="specification_of_air_fryers_deep_fryers_color">
			<option value="">Select</option>
			<option <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Black') echo "selected";?>>Black</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Blue') echo "selected";?>>Blue</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Cherry') echo "selected";?>>Cherry</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Grey') echo "selected";?>>Grey</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Maroon') echo "selected";?>>Maroon</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Orange') echo "selected";?>>Orange</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Red') echo "selected";?>>Red</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Silver') echo "selected";?>>Silver</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'White') echo "selected";?>>White</option>
			<option  <?php if($res['specification_of_air_fryers_deep_fryers_color'] == 'Yellow') echo "selected";?>>Yellow</option>
		</select>
	</div>
</div>
