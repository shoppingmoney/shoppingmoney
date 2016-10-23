<input type="hidden" name="specification_product" value="set">
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Binding
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="books_specification_binding">
			<option value="">Select</option>
			<option <?php if($res['books_specification_binding'] == 'Boxed') echo "selected";?>>Boxed</option>
			<option  <?php if($res['books_specification_binding'] == 'Center Stitch') echo "selected";?>>Center Stitch</option>
			<option  <?php if($res['books_specification_binding'] == 'Hard Cover') echo "selected";?>>Hard Cover</option>
			<option  <?php if($res['books_specification_binding'] == 'Leather') echo "selected";?>>Leather</option>
			<option  <?php if($res['books_specification_binding'] == 'Paper Back') echo "selected";?>>Paper Back</option>
			<option  <?php if($res['books_specification_binding'] == 'Spiral') echo "selected";?>>Spiral</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Publisher
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="books_specification_publisher" value="<?=$res['books_specification_publisher']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Width
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="what_is_in_the_box_product_width" value="<?=$res['what_is_in_the_box_product_width']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Language
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select class="form-control" name="books_specification_language">
			<option value="">Select</option>
			<option <?php if($res['books_specification_language'] == 'English') echo "selected";?>>English</option>
			<option  <?php if($res['books_specification_language'] == 'Bengali') echo "selected";?>>Bengali</option>
			<option  <?php if($res['books_specification_language'] == 'Bengali-English') echo "selected";?>>Bengali-English</option>
			<option  <?php if($res['books_specification_language'] == 'Bhojpuri') echo "selected";?>>Bhojpuri</option>
			<option  <?php if($res['books_specification_language'] == 'English-French') echo "selected";?>>English-French</option>
			<option  <?php if($res['books_specification_language'] == 'English-Hindi') echo "selected";?>>English-Hindi</option>
			<option  <?php if($res['books_specification_language'] == 'English-Italian') echo "selected";?>>English-Italian</option>
			<option  <?php if($res['books_specification_language'] == 'French') echo "selected";?>>French</option>
			<option  <?php if($res['books_specification_language'] == 'German') echo "selected";?>>German</option>
			<option  <?php if($res['books_specification_language'] == 'Hindi') echo "selected";?>>Hindi</option>
			<option  <?php if($res['books_specification_language'] == 'Marathi') echo "selected";?>>Marathi</option>
			<option  <?php if($res['books_specification_language'] == 'Panjabi') echo "selected";?>>Panjabi</option>
			<option  <?php if($res['books_specification_language'] == 'Spanish') echo "selected";?>>Spanish</option>
			<option  <?php if($res['books_specification_language'] == 'Tamil') echo "selected";?>>Tamil</option>
			<option  <?php if($res['books_specification_language'] == 'Urdu') echo "selected";?>>Urdu</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Manual
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="what_is_in_the_box_manual" value="<?=$res['what_is_in_the_box_manual']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Number of Pages
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="books_specification_number_of_pages" value="<?=$res['books_specification_number_of_pages']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Publication Year
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="books_specification_publication_year" value="<?=$res['books_specification_publication_year']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Edition
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="books_specification_edition" value="<?=$res['books_specification_edition']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Weight
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="what_is_in_the_box_product_weight" value="<?=$res['what_is_in_the_box_product_weight']?>">
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Series
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="key_feature_series" value="<?=$res['key_feature_series']?>">
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
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Depth
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input class="form-control col-md-7 col-xs-12" type="text" name="what_is_in_the_box_product_depth" value="<?=$res['what_is_in_the_box_product_depth']?>">
	</div>
</div>