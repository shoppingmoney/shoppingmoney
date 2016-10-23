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
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['details_of_roti_makers_power_consumption'] == '800') echo "selected";?>>800</option>
			<option  <?php if($res['details_of_roti_makers_power_consumption'] == '900') echo "selected";?>>900</option>
			<option  <?php if($res['details_of_roti_makers_power_consumption'] == '950') echo "selected";?>>950</option>
			<option  <?php if($res['details_of_roti_makers_power_consumption'] == '1000') echo "selected";?>>1000</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Type
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['details_of_roti_makers_type'] == 'Chapati Maker') echo "selected";?>>Chapati Maker</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Dosa Maker') echo "selected";?>>Dosa Maker</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Dough Maker') echo "selected";?>>Dough Maker</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Electric Grill') echo "selected";?>>Electric Grill</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Electric Pan') echo "selected";?>>Electric Pan</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Electric Tandoor') echo "selected";?>>Electric Tandoor</option>
			<option  <?php if($res['details_of_roti_makers_type'] == 'Food Maker') echo "selected";?>>Food Maker</option>
		</select>
	</div>
</div>