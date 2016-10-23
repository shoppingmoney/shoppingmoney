 <!--support-->
         <div class="tab-pane fade active in" id="support" style="background: #fff;padding: 14px;">
            <br>
            <p>Please fill your response below and we will be happy to help you.</p>
            <ul class="nav nav-pills row text-center">
<li class="col-sm-3" id="support_faq"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> FAQs</a></li>
               <li class="col-sm-3" id="support_question"><a href="javascript:void(0);"><span class="glyphicon glyphicon-question-sign"></span> Have a Question?</a></li>
               <li class="col-sm-3" id="missing-box"><a href="javascript:void(0);"><span class="glyphicon glyphicon-search"></span> Financial Query</a></li>
               
 <li class="col-sm-3" id="support_faq"><a href="#"><span class="glyphicon glyphicon-search"></span>  Shopping Enquiry</a></li>
            </ul>
            <br><br>
            <!-- have a question section -->
            <form class="form-horizontal" role="form" id="question-box" style="display:none;">
               <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-9">
                     <select class="form-control" id="have_category">
                        <option selected='selected' value="">--- Select Category ---</option>
                     </select>
                  </div>
               </div>
               <div class="form-group" style="display:none;" id="cat_que">
                  <label for="select-clickid" class="col-sm-2 control-label">Question</label>
                  <div class="col-sm-9">
                     <select class="form-control" id="have_question">
                        <option selected='selected' value="">--- Select Question ---</option>
                     </select>
                  </div>
               </div>
               <div class="form-group" style="display:none;" id="cat_que_ans">
                  <label for="amount" class="col-sm-2 control-label">Answer</label>
                  <div class="col-sm-9">
                     <p id="have_question_answer" ></p>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
                     <button class="btn btn-primary btn-feat" type="button" id="stillunsolved">Still Unsolved</button>
                  </div>
               </div>
            </form>
            <form name="anothersupport" id="anothersupport" method="post" role="form" class="form-horizontal" style="display:none;" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="subsject">Subject</label>
                  <div class="col-sm-9">
                     <input type="text" name="messubject" class="form-control" id="messubject" placeholder="Message Subject">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="subsject">Attachment</label>
                  <div class="col-sm-9">
                     <input type="file" name="attachment" id="attachment">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="mess">Message</label>
                  <div class="col-sm-9">
                     <textarea name="mesmessage" class="form-control" id="mesmessage" placeholder="Your Message"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
                     <button class="btn btn-primary btn-feat" type="submit" id="msgsub">Submit</button>
                  </div>
               </div>
            </form>
            <!-- missing claim box -->
            <form class="form-horizontal" role="form" id="missing-box" style=" method="post" enctype="multipart/form-data">
               <div class="form-group" style="margin-left: 15px;">
                  <span><b>Three easy steps to process your complain request.</b></span>  
                  <ol>
                     <li >Share accurate details of your disagreement.</li>
                     <li>Generate your complaint against the support ticket number.</li>
                     <li>Upload valid screen shot of the ordered product and payment details for which you are

registering a complain. <!--<a href="javascript:void(0)" onclick="javascript:$('#claim_me').show();">MISSING CLAIM</a>--></li>
                  </ol>
               </div>
               <div class="form-group" style="display:none;" id="claim_me">
                  <label for="select-retailer" class="col-sm-2 control-label">Retailers</label>
                  <div class="col-sm-9">
                     <select class="form-control" id="missing_retailer" name="missing_retailer">
                        <option selected='selected' value="">--- Select Retailer ---</option>
                     </select>
                  </div>
               </div>
               <div class="form-group" style="display:none;" id="missing_retmsg">
                  <label for="select-clickid" class="col-sm-2 control-label">Click ID</label>
                  <div class="col-sm-9" id="missing_click_ids">
                  </div>
               </div>
               <div class="form-group" id="order_id" style="display:none;" >
                  <label for="orderid" class="col-sm-2 control-label">Order No.</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="missing_order_Id" name="missing_order_Id" placeholder="Order Number">
                  </div>
               </div>
               <div class="form-group" id="order_amount" style="display:none;" >
                  <label for="amount" class="col-sm-2 control-label">Sale Amount</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="missing_amount" name="missing_amount" placeholder="Sale Amount">
                  </div>
               </div>
               <div class="form-group" id="order_item" style="display:none;" >
                  <label for="amount" class="col-sm-2 control-label">Product Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="missing_order_item" name="missing_order_item" placeholder="Product Name">
                  </div>
               </div>
               <div class="form-group" id="order_attach" style="display:none;" >
                  <label for="amount" class="col-sm-2 control-label">Invoice Copy</label>
                  <div class="col-sm-9">
                     <input type="file" id="attach" name="attach" />
                  </div>
               </div>
               <div class="form-group" id="voucher_codeused" style="display:none;" >
                  <label for="radio" class="col-sm-2 control-label">Coupon/Voucher Code</label>
                  <div class="col-sm-9">
                     <input type="text"  id="voucher_codeus" name="voucher_codeus" >
                  </div>
               </div>
               <div class="form-group" id="order_offer" style="display:none;" >
                  <label for="radio" class="col-sm-2 control-label">Coupon or Voucher used</label>
                  <div class="col-sm-9">
                     <input type="checkbox" value="1" id="missing_offer" name="missing_offer" >&nbsp;Check if Coupon or Voucher used during order.
                  </div>
               </div>
               <div class="form-group" id="submits" style="display:none;" >
                  <div class="col-sm-offset-2 col-sm-3">
                     <input type="hidden" id="calling" name="calling" value="missing_claim"/>
                     <button type="submit" class="btn btn-primary btn-feat">Send</button>
                  </div>
               </div>
            </form>
            <div class="row" id="suptic">
               <div class="col-md-12">
                  <div class="h3 headline hl-blue hidden-xs"><span>Your Previous Support Tickets in shoppingmoney</span></div>
                  <div class="table-responsive">
                     <table class="table table-striped table-hover">
                        <thead>
                           <tr>
                              <th>Ticket No.</th>
                              <th colspan="2">Subject</th>
                              <th>Status</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td colspan="6">If your problem is unresolved, write it to us

Grievance@shoppingmoney.in for immediate attention</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--/.table-responsive-->
               </div>
               <!--/.col-md-12-->
            </div>
            <!--/.row-->
         </div>
         <!--/#support-->