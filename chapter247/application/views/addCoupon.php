<?php $this->load->view('include/header'); 
if(isset($coupon)) {extract($coupon);}?>
<div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
            	<form id="login-form" action="<?=base_url()?>shop/saveCoupon" method="post" role="form" style="display: block;"  enctype="multipart/form-data">
                <h2>
                <?php echo isset($id)?'Update Coupon':'Add Coupon';?></h2>
                  <div class="form-group">
                    <input type="text" name="coupon_code" id="coupon_code" tabindex="1" class="form-control" placeholder="coupon Name" required="required" minlength="8"
                     maxlength="8" value="<?=isset($cp_code)?$cp_code:''?>">
                  </div>
                  <div class="form-group">
                    <input type="text" name="coupon_start_date" id="coupon_start_date" tabindex="1" class="form-control" placeholder="Coupon Start Date" value="<?=isset($cp_start_date)?$cp_start_date:''?>"> 
                  </div>
                  <div class="form-group">
                    <input type="text" name="coupon_end_date"  id="coupon_end_date" tabindex="1" class="form-control"  value="<?=isset($cp_end_date)?$cp_end_date:''?>" placeholder="Coupon End Date">
                  </div>
                  <div class="form-group">
                    <select name="discount_method" class="form-control" >
                    <?php //$cp_discount_method ?>
                    <option value="">Select Discount Method</option>
                      <option value="amt">Amountwise</option>
                      <option value="per">Percentagewise</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" name="coupon_amt"  id="coupon_amt" tabindex="1" class="form-control"  value="<?=isset($cp_amount)?$cp_amount:''?>" placeholder="Coupon Amount">
                  </div>
                  
                  <div class="col-xs-6 form-group pull-right">     
                        <?php if(isset($id)){
                        	echo'<input type="hidden" name="coupon_id" value="'.$id.'">';
                        	$value="Update";
                        }else{
                        	$value="Save";
                        	} ?>
                       <input type="submit" name="save-coupon" id="save-coupon" tabindex="4" class="form-control btn btn-login" value="<?=$value?>"> 
                  </div>
              </form>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php $this->load->view('include/footer');?>