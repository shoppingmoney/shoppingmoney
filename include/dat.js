			//List All Products
			    function listProduct(){
				  $.ajax({
				        method: "GET",
				        url: "/shopmoney/addtocart.php",
				        dataType:"json",
				        data:{'action': 'listAllProducts'},
				          success: function(msg){     	
				          	var total = 0;
				          	var table = '<form><div class="col-md-12" style="overflow-y:scroll; height:270px;margin-top: 0px !important;"><table width="100%"><tbody><tr style="border-bottom:1px solid #EEE;"><td width="34%"><p>Item Details</p></td><td width="20%"><p>Price</p></td><td width="10%"><p>Points</p></td><td width="10%"><p>Quantity</p></td><td width="10%"><p>Heart</p></td><td><p>Subtotal</p></td></tr>';
				          	   for(var i=0;i<msg.length;i++){
				          	   	table +='<tr id="ff1">';
				          	   			table+='<td><div class="main-image images"><img alt="#" src="vendor/productImg/SMG01166.jpg" width="80" style="float:left;"><p style="float:right; "></p><br><h5 style="text-align:center">'+ msg[i].product_id+'</h5><br></div></td><td><p>Rs. 10</p><p>shipping charges include(50)</p></td><td><p style="margin-left:20%">0</p><p></p></td><td><div class="numbers-row"><input type="number" disabled="disabled" id="french-hens" value="'+msg[i].quantity+'"></div></td><td><span class="hert" style="position:relative !important;left:9% !important; top:2% important;"><i class="fa fa-heart" style="color:RED"></i></span></td><td><p style="font-size:12px;">You Pay: Rs. 60</p><a id="remove"  style="color:red !important" onclick="rmove('+msg[i].product_id+')">REMOVE</a></td>';
				          	   			
				          	   		
				          	   		table+='</tr>';
				          	   		total++;
				          	   		
						        }
				          	   table+='</tr></tbody></table></div><hr style="margin-top:120px;border: 2px solid #E6E6E6;background: #E6E6E6;"><div class="widget widget_socialsharing_widget"><p style="font-size:11px;color:#999;">Our team ensures that on hand inventory matches with cart inventory for better shopping experience. </p><p> <b>100%</b> Safe and Secure Payments</p><p><b>TrustPay:</b> 100% Money Back Guarantee, 7 Days Easy Return Policy</p></div><div class="widget widget_socialsharing_widget" id="phoolrefresh"><table width="100%" height="120px;"><tbody><tr><td>Total:</td><td>Rs. 60</td></tr><tr><td>You Pay:</td><td style="font-size:15px;font-weight:600;">Rs. 60</td></tr></tbody></table><div class="quick-add-to-cart"><form method="post" class="cart"><a href="checkout.php" class="single_add_to_cart_button">Continue</a></form></div></div></form>';
				          	   $("#count").html(total + " Items");
				          	   $("#cart123").html(table);
				          },
				          error: function(e){
				            alert("some error at footer occured" +e);
				          }
				        })
				}
				function rmove(id){
					$.ajax({
				        method: "GET",
				        url: "addtocart.php",
				        dataType:"text",
				        data:{'action': 'removeProduct', 'product_id': id},
				          success: function(msg){ 
				          	alert(msg);
				          },
				          error: function(){
				            alert("some error occured");
				          }
				        });
				}

