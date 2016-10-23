<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Available
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['warranty_details_warranty_available'] == 'Manufacture Warranty') echo "selected";?>>Manufacture Warranty</option>
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
		<select class="form-control" name="electric_cooker_specifications_power_consumption">
			<option value="">Select</option>
			<option <?php if($res['electric_cooker_specifications_power_consumption'] == '350 W') echo "selected";?>>350 W</option>
			<option  <?php if($res['electric_cooker_specifications_power_consumption'] == '550 W') echo "selected";?>>550 W</option>
			<option  <?php if($res['electric_cooker_specifications_power_consumption'] == '551 W $ Above') echo "selected";?>>551 W $ Above</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Capicity Range
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="electric_cooker_specifications_capacity_range">
			<option value="">Select</option>
			<option <?php if($res['electric_cooker_specifications_capacity_range'] == '1 Ltr & Below') echo "selected";?>>1 Ltr & Below</option>
			<option  <?php if($res['electric_cooker_specifications_capacity_range'] == '1.1 - 2 Ltr') echo "selected";?>>1.1 - 2 Ltr</option>
			<option  <?php if($res['electric_cooker_specifications_capacity_range'] == '2.1 - 3 Ltr') echo "selected";?>>2.1 - 3 Ltr</option>
			<option  <?php if($res['electric_cooker_specifications_capacity_range'] == '3.1 - 4 Ltr') echo "selected";?>>3.1 - 4 Ltr</option>
			<option  <?php if($res['electric_cooker_specifications_capacity_range'] == '4.1 Ltr & Above') echo "selected";?>>4.1 Ltr & Above</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Electric Cooker Type
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="electric_cooker_specifications_type">
			<option value="">Select</option>
			<option <?php if($res['electric_cooker_specifications_type'] == 'Electric Cooker') echo "selected";?>>Electric Cooker</option>
			<option  <?php if($res['electric_cooker_specifications_type'] == 'Food Steamer') echo "selected";?>>Food Steamer</option>
			<option  <?php if($res['electric_cooker_specifications_type'] == 'Rice Cooker') echo "selected";?>>Rice Cooker</option>
			<option  <?php if($res['electric_cooker_specifications_type'] == 'Slow Cooker') echo "selected";?>>Slow Cooker</option>
			<option  <?php if($res['electric_cooker_specifications_type'] == 'Travel Cooker') echo "selected";?>>Travel Cooker</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Electric Cooker Function
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="electric_cooker_specifications_functions" value="<?=$res['electric_cooker_specifications_functions']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Cooker Capacity in Cups
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="electric_cooker_specifications_cooking_capacity_in_cups">
			<option value="">Select</option>
			<option <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '1-10 Cups') echo "selected";?>>1-10 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '1-15 Cups') echo "selected";?>>1-15 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '1-5.5 Cups') echo "selected";?>>1-5.5 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '10 Cups') echo "selected";?>>10 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '15 Cups') echo "selected";?>>15 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '3 Cups') echo "selected";?>>3 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '4 Cups') echo "selected";?>>4 Cups</option>
			<option  <?php if($res['electric_cooker_specifications_cooking_capacity_in_cups'] == '6 Cups') echo "selected";?>>6 Cups</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Electric Cooker Weight
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="electric_cooker_specifications_weight" value="<?=$res['electric_cooker_specifications_weight']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Electric Cooker Voltage
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="electric_cooker_specifications_voltage" value="<?=$res['electric_cooker_specifications_voltage']?>">
	</div>
</div>