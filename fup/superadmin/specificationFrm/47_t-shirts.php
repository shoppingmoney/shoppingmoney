<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Select color 
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="color_set_details_color_family_multi_select">
			<option value="">Select</option>
			<option <?php if($res['color_set_details_color_family_multi_select'] == 'Red') echo "selected";?> value="Blue">Red</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Blue') echo "selected";?> value="Blue">Blue</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Print & Pattern
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="	prints_patterns_details_prints_patterns">
			<option value="">Select</option>
			<option <?php if($res['prints_patterns_details_prints_patterns'] == 'Animal') echo "selected";?>>Animal</option>
			<option <?php if($res['prints_patterns_details_prints_patterns'] == 'Badge') echo "selected";?>>Badge</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Neckline
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="neckline_details_neckline">
			<option value="">Select</option>
			<option <?php if($res['neckline_details_neckline'] == 'Henley') echo "selected";?>>Henley</option>
			<option <?php if($res['neckline_details_neckline'] == 'High Neck') echo "selected";?>>High Neck</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Sleeve Length 
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="mens_specification_sleeve_length">
			<option value="">Select</option>
			<option <?php if($res['mens_specification_sleeve_length'] == 'Half Sleeve') echo "selected";?>>Half Sleeve</option>
			<option <?php if($res['mens_specification_sleeve_length'] == 'Long Sleeve') echo "selected";?>>Long Sleeve</option>
			<option <?php if($res['mens_specification_sleeve_length'] == 'Sleeveless') echo "selected";?>>Sleeveless</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"> Occassion 
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="occasion_specification_occasion">
			<option value="">Select</option>
			<option <?php if($res['occasion_specification_occasion'] == 'Active Wear') echo "selected";?>>Active Wear</option>
			<option <?php if($res['occasion_specification_occasion'] == 'Casual') echo "selected";?>>Casual</option>
			<option <?php if($res['occasion_specification_occasion'] == 'Party') echo "selected";?>>Party</option>
			<option <?php if($res['occasion_specification_occasion'] == 'Regular') echo "selected";?>>Regular</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"> Wash Care 
		
		<span class="required">*</span>
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="wash_care_detail_wash_care">
			<option value="">Select</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Hand Wash') echo "selected";?>>Hand Wash</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Machine Wash') echo "selected";?>>Machine Wash</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Dry Clean') echo "selected";?>>Dry Clean</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Iron') echo "selected";?>>Iron</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Bleach') echo "selected";?>>Bleach</option>
		</select>
	</div>
</div>
													