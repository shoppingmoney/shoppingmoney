<style>
#box{width:200px;height:80px;background:red;}

[type=radio]:checked ~ label {
    background: none;
    border-bottom: 1px solid white;
    z-index: 2;
}


dt {
  font-weight: bold;
}

dl {
  margin-bottom: 50px;
}

#bug:target {
  outline: 4px solid #ccc;
}

/**
 * tab panel widget
 */
.tabPanel-widget {
  position: relative;  /* containing block for headings (top:0) */
  background:none;
}

/**
 * because labels come first in source order - we use z-index to move them in front of the headings
 */
.tabPanel-widget > label {
  position: absolute;
  z-index: 1;
}

/**
 * labels and headings must share same values so grouping declarations in this rule prevents async edits (risk of breakage)
 * line-height == height -> vertical centering
 * the width dictates the offset for all headings but the first one: left offset = width * number of previous heading(s)
 * note that width and offset of label/heading pair can be customized if necessary
 */

.tabPanel-widget > label,
.tabPanel-widget > h2 {
  font-size: 1.1em;
  width: 9em;
  height: 2em;
  line-height: 2em;
}

/**
 * position:relative is for the markers (the down arrow in tabs)
 */
.tabPanel-widget > h2 {
  position: relative;
  margin: 0;
  text-align: center;
  background: #999;
  color: #fff;
}

.tabPanel-widget > label {
  border-right: 1px solid #fff;  
}

/**
 * all first level labels and headings after the very first ones 
 */
.tabPanel-widget input,
.tabPanel-widget > label ~ label,
.tabPanel-widget > h2 ~ h2 {
  position: absolute;
  top: 0;
}


/**
 * We target all the label/heading pairs
 * we increment the :nth-child() params by 4 as well as the left value (according to "tab" width)
 */

.tabPanel-widget label:nth-child(1),
.tabPanel-widget h2:nth-child(3) {
  left: 0em;
}

.tabPanel-widget label:nth-child(5),
.tabPanel-widget h2:nth-child(7) {
  left: 9em;
}

.tabPanel-widget label:nth-child(9),
.tabPanel-widget h2:nth-child(11) {
  left: 18em;
}

/**
 * we visually hide all the panels
 * https://developer.yahoo.com/blogs/ydn/clip-hidden-content-better-accessibility-53456.html
 */
.tabPanel-widget input + h2 + div {
  position: absolute !important;
  clip: rect(1px, 1px, 1px, 1px);
  padding:0 !important;
  border:0 !important;
  height: 1px !important; 
  width: 1px !important; 
  overflow: hidden;
}
/**
 * we reveal a panel depending on which control is selected 
 */
.tabPanel-widget input:checked + h2 + div {
  position: static !important;
  padding: 1em !important;
  height: auto !important; 
  width: auto !important; 
}

/**
 * shows a hand cursor only to pointing device users
 */
.tabPanel-widget label:hover {
  cursor: pointer;
}

.tabPanel-widget > div {
  background: #f0f0f0;
  padding: 1em;
}

/**
 * we hide radio buttons and also remove them from the flow
 */
.tabPanel-widget input[name="tabs"] {
  opacity: 0;
  position: absolute;
}


/** 
 * this is to style the tabs when they get focus (visual cue)
 */

.tabPanel-widget input[name="tabs"]:focus + h2 {
  outline: 1px dotted #000;
  outline-offset: 10px;
}


/**
 * reset of the above within the tab panel (for pointing-device users)
 */
.tabPanel-widget:hover h2 {
  outline: none !important;
}

/**
 * visual cue of the selection
 */
.tabPanel-widget input[name="tabs"]:checked + h2 {
  background: #26acce;
}

/**
 * the marker for tabs (down arrow)
 */
.tabPanel-widget input[name="tabs"]:checked + h2:after {
  content: '';
  margin: auto;
  position: absolute;
  bottom: -10px;
  left: 0;
  right: 0;
  width: 0;
  height: 0;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid #26acce;
}

/**
 * Make it plain/simple below 45em (stack everything)
 */
@media screen and (max-width: 45em) {
  
  /* hide unecessary label/control pairs */
  .tabPanel-widget label,
  .tabPanel-widget input[name="tabs"] {
    display: none;
  }
  
  /* reveal all panels */
  .tabPanel-widget > input + h2 + div {
    display: block !important;
    position: static !important;
    padding: 1em !important;
    height: auto !important; 
    width: auto !important; 
  }
  
  /* "unstyle" the heading */
  .tabPanel-widget h2 {
    width: auto;
    position: static !important;
    background: #999 !important;
  }
  
  /* "kill" the marker */
  .tabPanel-widget h2:after {
    display: none !important;
  }

}



.container .box {
  display: block;
  width: 57%;
  content: "+";
  padding: 10px 10px;
    content: "+";
    border: 1px solid #26acce;
  margin: 20px;
}

.container .box .top:before {
  padding: 10px 16px;
    border: 1px solid #26acce;
    color: #ffffff;
    content: "+";
    margin-left: -11px;
    background: #26acce;
    cursor: pointer;
}





.container .box .bottom {
  padding: 12px 10px;
    background-color: #f7f7f7;
    color: #4c4c4c;
    margin-top: 11px;
  display: none;
}

</style>



 <!--support-->
         <div class="tabPanel-widget">
    <label for="tab-1" tabindex="0"></label>
      <input id="tab-1" type="radio" name="tabs" checked="true" aria-hidden="true">
    <h2>FAQ'S</h2>
    <div>
     <div class="col-md-12" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
				           
                                           
                                             
                                                <div class="col-md-12" id="category">
												
                                                  <?php 
												  if(isset($_SESSION['message']))
												  {
													  echo $_SESSION['message'];
													  unset($_SESSION['message']);
												  }
												  
												  ?>
                                                   <div class="container">
												   <?php
												   $getData = $dbAccess->selectData("SELECT * FROM faq where category='My Account & Business Associates '");
											foreach ($getData as $t) {
												
												   ?>
  <div class="box">
    <div class="top">
      <?=$t['query']?>
    </div>
    <div class="bottom">
      <?=$t['result']?>
    </div>
  </div>
											<?php }?>
 
 
  
  
  
 
</div>
 </div>
    </div>
    </div>
	
	
	
	
	
    <label for="tab-2" tabi ndex="0"></label>
    <input id="tab-2" type="radio" name="tabs" aria-h idden="true">
	
    <h2>Have A Question?</h2>
    <div>

      <form   method="post" action="ticket_gen.php" class="form-horizontal" style="display:block;" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="subsject">Subject</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="subject" id="subject" class="form-control" required/>
                          <option value=''>Select Subject</option>
                          <option>Order Place</option>
                          
                          
                          <option>Refferal id</option>
						  <option>Other</option>
                        </select>
                                                        </div>
               </div>
               
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="mess">Message</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea name="description" class="form-control" id="mesmessage" placeholder="Your Message" required/></textarea>
                  </div>
               </div>
			    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Attach Image (jpeg upto 2mb)
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="file" name="file" required/>
                                                        </div>
                                                    </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
                     <button class="btn btn-primary btn-feat" name="submit" type="submit" id="msgsub">Submit</button>
                  </div>
               </div>
            </form>
    </div>
   
  </div>
         <!--/#support-->
		 
		 
		 
		 <script type="text/javascript">
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(500, 'swing');
});
</script>	