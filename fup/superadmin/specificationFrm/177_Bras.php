<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Fabric $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="warranty_details_warranty_available">
			<option value="">Select</option>
			<option <?php if($res['bra_details_fabric_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Cotton') echo "selected";?>>Cotton</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Lace') echo "selected";?>>Lace</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Lycra') echo "selected";?>>Lycra</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Model') echo "selected";?>>Model</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Net') echo "selected";?>>Net</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Nylon') echo "selected";?>>Nylon</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Polyester') echo "selected";?>>Polyester</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Silicon') echo "selected";?>>Silicon</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Ryon') echo "selected";?>>Ryon</option>
			<option  <?php if($res['bra_details_fabric_multi_select'] == 'Synthetic') echo "selected";?>>Synthetic</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Color Family $Multi-Select
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Style
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="bra_style_style">
			<option value="">Select</option>
			<option <?php if($res['bra_style_style'] == 'Bralette') echo "selected";?>>Bralette</option>
			<option  <?php if($res['bra_style_style'] == 'Crossback') echo "selected";?>>Crossback</option>
			<option  <?php if($res['bra_style_style'] == 'Front Open') echo "selected";?>>Front Open</option>
			<option  <?php if($res['bra_style_style'] == 'Minimizer') echo "selected";?>>Minimizer</option>
			<option  <?php if($res['bra_style_style'] == 'Nursing') echo "selected";?>>Nursing</option>
			<option  <?php if($res['bra_style_style'] == 'Padded') echo "selected";?>>Padded</option>
			<option  <?php if($res['bra_style_style'] == 'Push-up') echo "selected";?>>Push-up</option>
			<option  <?php if($res['bra_style_style'] == 'Sports') echo "selected";?>>Sports</option>
			<option  <?php if($res['bra_style_style'] == 'Strepless') echo "selected";?>>Strepless</option>
			<option  <?php if($res['bra_style_style'] == 'Tube') echo "selected";?>>Tube</option>
			<option  <?php if($res['bra_style_style'] == 'Stick-on') echo "selected";?>>Stick-on</option>
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
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Batik Print') echo "selected";?>>Black Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Block Print') echo "selected";?>>Block Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Cheks') echo "selected";?>>Cheks</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Dobby') echo "selected";?>>Dobby</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Dotted') echo "selected";?>>Dotted</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Floral') echo "selected";?>>Floral</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Geometric') echo "selected";?>>Geometric</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Graphic Print') echo "selected";?>>Graphic Print</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Lace') echo "selected";?>>Lace</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Plain') echo "selected";?>>Plain</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Printed') echo "selected";?>>Printed</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Self Design') echo "selected";?>>Self Design</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Solid/Plain') echo "selected";?>>Solid/Plain</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Hondstooth') echo "selected";?>>Hondstooth</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Striped') echo "selected";?>>Striped</option>
			<option  <?php if($res['prints_patterns_details_prints_patterns'] == 'Washed') echo "selected";?>>Washed</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Straps
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="bra_details_straps">
			<option value="">Select</option>
			<option <?php if($res['bra_details_straps'] == 'Crossback') echo "selected";?>>Crossback</option>
			<option  <?php if($res['bra_details_straps'] == 'Multiway') echo "selected";?>>Multiway</option>
			<option  <?php if($res['bra_details_straps'] == 'Regular') echo "selected";?>>Regular</option>
			<option  <?php if($res['bra_details_straps'] == 'Srapless') echo "selected";?>>Srapless</option>
		</select>
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model ID
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_model_id" value="<?=$res['key_feature_model_id']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lifestyle
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_lifestyle" value="<?=$res['key_feature_lifestyle']?>">
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Series
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_series" value="<?=$res['key_feature_series']?>">
	</div>
</div>