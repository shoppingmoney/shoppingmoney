<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Duration $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="watch_specification_warranty_duration_multi_select">
			<option value="">Select</option>
			<option <?php if($res['watch_specification_warranty_duration_multi_select'] == '12 months') echo "selected";?>>12 months</option>
			<option  <?php if($res['watch_specification_warranty_duration_multi_select'] == '24 months and above') echo "selected";?>>24 months and above</option>
			<option  <?php if($res['watch_specification_warranty_duration_multi_select'] == '6 months') echo "selected";?>>6 months</option>
			<option  <?php if($res['watch_specification_warranty_duration_multi_select'] == 'NA') echo "selected";?>>NA</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty Type $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="watch_specification_warranty_type_multi_select">
			<option value="">Select</option>
			<option <?php if($res['watch_specification_warranty_type_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['watch_specification_warranty_type_multi_select'] == 'Manufacturer Warranty') echo "selected";?>>Manufacturer Warranty</option>
			<option  <?php if($res['watch_specification_warranty_type_multi_select'] == 'No Warranty') echo "selected";?>>No Warranty</option>
			<option  <?php if($res['watch_specification_warranty_type_multi_select'] == 'Seller Warranty') echo "selected";?>>Seller Warranty</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Dial Shape $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="body_features_dial_shape_multi_select">
			<option value="">Select</option>
			<option <?php if($res['body_features_dial_shape_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['body_features_dial_shape_multi_select'] == 'Oval') echo "selected";?>>Oval</option>
			<option  <?php if($res['body_features_dial_shape_multi_select'] == 'Rectangle') echo "selected";?>>Rectangle</option>
			<option  <?php if($res['body_features_dial_shape_multi_select'] == 'Round') echo "selected";?>>Round</option>
			<option  <?php if($res['body_features_dial_shape_multi_select'] == 'Square') echo "selected";?>>Square</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Dial Color $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="body_features_dial_color_multi_select">
			<option value="">Select</option>
			<option <?php if($res['body_features_dial_color_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Black') echo "selected";?>>Black</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Blue') echo "selected";?>>Blue</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Brown') echo "selected";?>>Brown</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Gold') echo "selected";?>>Gold</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Green') echo "selected";?>>Green</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Grey') echo "selected";?>>Grey</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Maroon') echo "selected";?>>Maroon</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Orange') echo "selected";?>>Orange</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Pink') echo "selected";?>>Pink</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Purpple') echo "selected";?>>Purpple</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Red') echo "selected";?>>Red</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Silver') echo "selected";?>>Silver</option>
			<option  <?php if($res['body_features_dial_color_multi_select'] == 'Yellow') echo "selected";?>>Yellow</option>
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Display $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="watch_specification_display_multi_select">
			<option value="">Select</option>
			<option <?php if($res['watch_specification_display_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['watch_specification_display_multi_select'] == 'Analog') echo "selected";?>>Analog</option>
			<option  <?php if($res['watch_specification_display_multi_select'] == 'Analog-Digital') echo "selected";?>>Analog-Digital</option>
			<option  <?php if($res['watch_specification_display_multi_select'] == 'Chornograph') echo "selected";?>>Chornograph</option>
			<option  <?php if($res['watch_specification_display_multi_select'] == 'Digital') echo "selected";?>>Digital</option>
			<option  <?php if($res['watch_specification_display_multi_select'] == 'Multi-function') echo "selected";?>>Multi-function</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Ideal For $Multi-Select
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="ideal_specification_ideal_for_multi_select">
			<option value="">Select</option>
			<option <?php if($res['ideal_specification_ideal_for_multi_select'] == 'All') echo "selected";?>>All</option>
			<option  <?php if($res['ideal_specification_ideal_for_multi_select'] == 'Boy') echo "selected";?>>Boy</option>
			<option  <?php if($res['ideal_specification_ideal_for_multi_select'] == 'Girl') echo "selected";?>>Girl</option>
			<option  <?php if($res['ideal_specification_ideal_for_multi_select'] == 'Men') echo "selected";?>>Men</option>
			<option  <?php if($res['ideal_specification_ideal_for_multi_select'] == 'Unisex') echo "selected";?>>Unisex</option>
			<option  <?php if($res['ideal_specification_ideal_for_multi_select'] == 'Women') echo "selected";?>>Women</option>
		</select>
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
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_model_name" value="<?=$res['key_feature_model_name']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Series
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_series" value="<?=$res['key_feature_series']?>">
	</div>
</div>