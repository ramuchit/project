<?php $this->load->view('include/header'); 
if(isset($product)) {extract($product);}?>
<div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
            	<form id="login-form" action="<?=base_url()?>shop/saveProduct" method="post" role="form" style="display: block;"  enctype="multipart/form-data">
                <h2><?php if(isset($id)){
                  echo "Update Product";
                }else{ echo "Add Product";
                  }?></h2>
                  <div class="form-group">
                    <input type="text" name="product_name" id="product_name" tabindex="1" class="form-control" placeholder="Product Name" required="required" value="<?=isset($p_name)?$p_name:''?>">
                  </div>
                  <div class="form-group">
                    <textarea name="product_desc" id="product_desc" tabindex="2" class="form-control" placeholder="Product Description"><?=isset($p_desc)?$p_desc:''?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="number" name="product_price" required="required" id="product_price" tabindex="1" class="form-control"  value="<?=isset($p_price)?$p_price:''?>" placeholder="Product Price">
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_image" id="product_image" tabindex="1" class="form-control">
                  </div>
                  
                  <div class="col-xs-6 form-group pull-right">     
                        <?php if(isset($id)){
                        	echo'<input type="hidden" name="product_id" value="'.$id.'">';
                        	$value="Update";
                        }else{
                        	$value="Save";
                        	} ?>
                       <input type="submit" name="save-product" id="save-product" tabindex="4" class="form-control btn btn-login" value="<?=$value?>"> 
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