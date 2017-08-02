<?php $this->load->view('include/header');?>

<div class="container">
   <div class="row">
     <h1>Welcome <?php echo $this->session->userdata('username');?></h1>
     
      <h2>List of Coupons</h2>
      <table class="table table-bordered product_table">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Coupon Code</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Coupon Amount</th>
        <th>Method (Either Amount or %age wise)</th>
        <th>Action</th>
      </tr>
    </thead>
    	<tbody>
      <?php $i=1;
           if(isset($coupons)){
              foreach($coupons as $val){ ?>

			      <tr id="cp_<?=$val->id?>">
			        <td><?=$i?></td>
			        <td><?=$val->cp_code?></td>
			        <td><?=$val->cp_start_date?></td>
			        <td><?=$val->cp_end_date?></td>
			        <td><?=$val->cp_amount?></td>
              <td><?=$val->cp_discount_method?></td>
			        <td><a href="<?=base_url()?>shop/addCoupon/<?=$val->id?>"><i class="fa fa-edit btn btn-primary"></i></a>|<a href="javascript:void(0)" onclick="remove_product(<?=$val->id?>,'coupon')"><i class="fa fa-trash btn btn-danger"></i></a></td>
			       
			      </tr>

             <?php $i++; }
           }


      ?>
    
    
      
    </tbody>
  </table>
   </div>
   </div>

<?php $this->load->view('include/footer');?>