<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fabric
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="fabric_details_fabric_multi_select" value="<?=$res['fabric_details_fabric_multi_select']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Color
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="color_set_details_color_family_multi_select">
			<option value="">Select</option>
			<option <?php if($res['color_set_details_color_family_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Black') echo "selected";?>>Black</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Blue') echo "selected";?>>Blue</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Bronze') echo "selected";?>>Bronze</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Brown') echo "selected";?>>Brown</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Copper') echo "selected";?>>Copper</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Dark Green') echo "selected";?>>Dark Green</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Gold') echo "selected";?>>Gold</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Green') echo "selected";?>>Green</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Grey') echo "selected";?>>Grey</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Light Green') echo "selected";?>>Light Green</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Light Blue') echo "selected";?>>Light Blue</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Maroon') echo "selected";?>>Maroon</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Orange') echo "selected";?>>Orange</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Pink') echo "selected";?>>Pink</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Purple') echo "selected";?>>Purple</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Red') echo "selected";?>>Red</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Silver') echo "selected";?>>Silver</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'White') echo "selected";?>>White</option>
			<option  <?php if($res['color_set_details_color_family_multi_select'] == 'Yellow') echo "selected";?>>Yellow</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Prints & Patterns
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="prints_patterns_details_prints_patterns">
			<option value="">Select</option>
			<option <?php if($res['prints_patterns_details_prints_patterns'] == 'Animal') echo "selected";?>>Animal</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Badge') echo "selected";?>>Badge</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Batik Print') echo "selected";?>>Batik Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Block Print') echo "selected";?>>Block Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Cheks') echo "selected";?>>Cheks</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Dotted') echo "selected";?>>Dotted</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Dobby') echo "selected";?>>Dobby</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Floral') echo "selected";?>>Floral</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Geometric') echo "selected";?>>Geometric</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Graphic Print') echo "selected";?>>Graphic Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Lace') echo "selected";?>>Lace</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Plain') echo "selected";?>>Plain</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Printed') echo "selected";?>>Printed</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Self Design') echo "selected";?>>Self Design</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Solid/Plain') echo "selected";?>>Solid/Plain</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Houndstooth') echo "selected";?>>Houndstooth</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Striped') echo "selected";?>>Striped</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Washed') echo "selected";?>>Washed</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Ideal For
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="ideal_specification_ideal_for">
			<option value="">Select</option>
			<option <?php if($res['ideal_specification_ideal_for'] == 'Boy') echo "selected";?>>Boy</option>
			<option  <?php if($res['ideal_specification_ideal_for'] == 'Girl') echo "selected";?>>Girl</option>
			<option  <?php if($res['ideal_specification_ideal_for'] == 'Men') echo "selected";?>>Men</option>
			<option  <?php if($res['ideal_specification_ideal_for'] == 'Unisex') echo "selected";?>>Unisex</option>
			<option  <?php if($res['ideal_specification_ideal_for'] == 'Women') echo "selected";?>>Women</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Wash Care
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="wash_care_detail_wash_care">
			<option value="">Select</option>
			<option <?php if($res['wash_care_detail_wash_care'] == 'Bleach') echo "selected";?>>Bleach</option>
			<option  <?php if($res['wash_care_detail_wash_care'] == 'Dry Clean') echo "selected";?>>Dry Clean</option>
			<option  <?php if($res['wash_care_detail_wash_care'] == 'Drying') echo "selected";?>>Drying</option>
			<option  <?php if($res['wash_care_detail_wash_care'] == 'Hand Wash') echo "selected";?>>Hand Wash</option>
			<option  <?php if($res['wash_care_detail_wash_care'] == 'Iron') echo "selected";?>>Iron</option>
			<option  <?php if($res['wash_care_detail_wash_care'] == 'Machine Wash') echo "selected";?>>Machine Wash</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Occasion
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="occasion_specification_occasion">
			<option value="">Select</option>
			<option <?php if($res['occasion_specification_occasion'] == 'Casual') echo "selected";?>>Casual</option>
			<option  <?php if($res['occasion_specification_occasion'] == 'Formal') echo "selected";?>>Formal</option>
			<option  <?php if($res['occasion_specification_occasion'] == 'Party') echo "selected";?>>Party</option>
			<option  <?php if($res['occasion_specification_occasion'] == 'Semi-formal') echo "selected";?>>Semi-formal</option>
			<option  <?php if($res['occasion_specification_occasion'] == 'Wedding') echo "selected";?>>Wedding</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"> Sleeve Length
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="winter_wear_specifications_sleeve_length">
			<option value="">Select</option>
			<option <?php if($res['winter_wear_specifications_sleeve_length'] == 'Long Sleeve') echo "selected";?>>Long Sleeve</option>
			<option  <?php if($res['winter_wear_specifications_sleeve_length'] == 'Short Sleeve') echo "selected";?>>Short Sleeve</option>
			<option  <?php if($res['winter_wear_specifications_sleeve_length'] == 'Sleeveless') echo "selected";?>>Sleeveless</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model Name
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_model_name" value="<?=$res['key_feature_model_name']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model ID
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_model_id" value="<?=$res['key_feature_model_id']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Part Number
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_part_number" value="<?=$res['key_feature_part_number']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lifestyle
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_lifestyle" value="<?=$res['key_feature_lifestyle']?>">
	</div>
</div>