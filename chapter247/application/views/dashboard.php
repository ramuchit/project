<?php $this->load->view('include/header');?>

<div class="container">
   <div class="row">
     <h1>Welcome <?php echo $this->session->userdata('username');?></h1>
      <a href="../shop/AddProduct" class="btn btn-primary">Add Product</a>
      <a href="../shop/addCoupon" class="btn btn-primary">Add Coupon</a>
      <a href="../shop/couponList" class="btn btn-primary">Coupon Lists</a>
       <a href="../shop/orderDetails" class="btn btn-primary">Order Details</a>
       <div class="pull-right form-group">
         <input type="text" name="search_product" id="search_product" placeholder="Search Product..." class="form-control">
       </div>
      <h2>List of Products</h2>
      <table class="table table-bordered product_table">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    	<tbody id="search_body_tabel">
      <?php $i=1;
           if(isset($products)){
              foreach($products as $val){ ?>

			      <tr id="row_<?=$val->id?>">
			        <td><?=$i?></td>
			        <td><?=$val->p_name?></td>
			        <td ><img  width="80px" src="<?=ASSETS.'upload/'.$val->p_image?>"></td>
			        <td><?=$val->p_desc?></td>
			        <td><?=$val->p_price?></td>
			        <td><a href="<?=base_url()?>shop/AddProduct/<?=$val->id?>"><i class="fa fa-edit btn btn-primary"></i></a>|<a href="javascript:void(0)" onclick="remove_product(<?=$val->id?>,'product')"><i class="fa fa-trash btn btn-danger"></i></a></td>
			       
			      </tr>

             <?php $i++; }
           }


      ?>
    
    
      
    </tbody>
  </table>
  <?php echo $links;?>
   </div>
   </div>

<?php $this->load->view('include/footer');?>