<?php $this->load->view('include/header');?>

<div class="container">
   <div class="row">
     <h1>Welcome <?php echo $this->session->userdata('username');?></h1>
     
      <h2>List of Orders</h2>
      <table class="table table-bordered product_table">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Order Id</th>
        <th>Purchase Product Name</th>
        <th>Purchase Product Id</th>
        <th>Total Amount</th>
        <th>Order Time</th>
        <th>Action</th>
      </tr>
    </thead>
    	<tbody>
      <?php $i=1;
           if(isset($orders)){
              foreach($orders as $val){ ?>

			      <tr id="ordrd_<?=$val->id?>">
			        <td><?=$i?></td>
			        <td><?=$val->id?></td>
			        <td><?=$val->ordered_p_name?></td>
			        <td><?=$val->ordered_p_id?></td>
			        <td><?=$val->total_amt?></td>
              <td><?=$val->ordered_time?></td>
			        <td><a href="javascript:void(0)" onclick="remove_product(<?=$val->id?>,'order')"><i class="fa fa-trash btn btn-danger"></i></a>
              </td>
			       
			      </tr>

             <?php $i++; }
           }


      ?>
    
    
      
    </tbody>
  </table>
   </div>
   </div>

<?php $this->load->view('include/footer');?>