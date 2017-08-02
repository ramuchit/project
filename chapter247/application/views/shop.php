<?php $this->load->view('include/header');?>

<div class="container">
   <div class="row">
   <?php if($products){
       foreach ($products as  $val) { ?>
       <div class="col-sm-3 ind_product" >
          <div>
             <div class="img_thumb"><img width="50%" src="<?=ASSETS.'upload/'.$val->p_image?>"></div>
            <h3><?=$val->p_name?></h3>
            <p class="pull-left"><b><?='$'.$val->p_price?></b></p>
            <a href="#" onclick='addCart(<?=$val->id?>)' class="btn btn-info">Add To Cart</a>
          </div>
           </div>
         
      <?php }
    }?>
     
     
    
     
   </div>
   </div>

<?php $this->load->view('include/footer');?>