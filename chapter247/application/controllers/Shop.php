<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('Shop_model','shop');
	}
	public function index(){
		$data['products']=$this->shop->get_content('product');
		$this->load->view('shop',$data);

	}
	public function AddProduct($id=''){
		$data=array();
		if($id){
			
			$data['product']=$this->shop->get_data_single('product',$id);
			
		}
		$this->load->view('addProduct',$data);

		

	}
	public function saveProduct(){
		if(isset($_POST['save-product']))
		{ 
	       $id=$this->input->post('product_id');
			 $name='';
			 
	
				if(isset($_FILES['product_image']))
				{

					        $name=$_FILES['product_image']['name'];
							$type=$_FILES['product_image']['type'];
							$size=$_FILES['product_image']['size'];
							$tmp_name=$_FILES['product_image']['tmp_name'];

							$config= array(
											'upload_path'=>'./assets/upload/',
											'allowed_types'=>'gif|jpg|png|jpeg',
											'max_size'=>'500000',
											'overwrite'=>FALSE
									    );
					$this->load->library('upload',$config);

					if(!$this->upload->do_upload('product_image')){
						$msg=$this->upload->display_errors('', '');
						$this->session->set_flashdata('message', $msg);
						}
				}
				if(!$name){
					$name="default.jpeg";
				}
				$data=array('p_name'=>$this->input->post('product_name'),
											'p_price'=>$this->input->post('product_price'),
											'p_desc'=>$this->input->post('product_desc'),
											'p_image'=>$name,
											'prdoduct_added_by'=>$this->session->userdata('user_id'),
											'p_upload_time'=>date('Y-m-d H:i:s')
										);
				if($id){
					$this->shop->updateData('product',$data,$id);
					$this->session->set_flashdata('message', 'A Product has been updated.');

				}else{
					$this->shop->saveData('product',$data);
					$this->session->set_flashdata('message', 'A Product has been uploaded.');
				}
				redirect('/admin/dashboard', 'refresh');
		}

		

	}
	function search_product(){
		$key=$this->input->post('key');
		$products=$this->shop->serchData('product',$key);
		//print_r($products); die();
		$i=1;
           if(isset($products)){ 
             foreach($products as $val){ ?>
              <tr id="row_<?=$val->id?>">
			        <td><?=$i?></td>
			        <td><?=$val->p_name?></td>
			        <td ><img  width="80px" src="<?=ASSETS.'upload/'.$val->p_image?>"></td>
			        <td><?=$val->p_desc?></td>
			        <td><?=$val->p_price?></td>
			        <td><a href="<?=base_url()?>shop/AddProduct/<?=$val->id?>"><i class="fa fa-edit btn btn-primary"></i></a>|<a href="javascript:void(0)" onclick="remove_product(<?=$val->id?>)"><i class="fa fa-trash btn btn-danger"></i></a></td>
			       
			      </tr>

             <?php $i++; }
         }
	}

	function delete_product(){
		$id=$this->input->post('id');
		$table=$this->input->post('cat');
		$cnf=$this->shop->removeData($table,$id);
		echo $cnf?'1':'0';

	}
 function addCoupon($id=''){
 	$data=array();
 	if($id){
 		$data['coupon']=$this->shop->get_data_single('coupon',$id);

 	}
 		$this->load->view("addCoupon",$data);
 	
 	
 }
 function saveCoupon(){
 
 	$data=array('cp_code'=>$this->input->post('coupon_code'),
 		'cp_start_date'=>$this->input->post('coupon_start_date'),
											'cp_end_date'=>$this->input->post('coupon_end_date'),
											'cp_discount_method'=>$this->input->post('discount_method'),
											'cp_amount'=>$this->input->post('coupon_amt'),
											'cp_added_by'=>$this->session->userdata('user_id'),
											'cp_create_time'=>date('Y-m-d H:i:s')
										);
 	$id=$this->input->post("coupon_id");
 	if($id){
 		$this->shop->updateData('coupon',$data,$id);
		$this->session->set_flashdata('message', 'A Coupon has been updated.');

 	}else{
 		$this->shop->saveData('coupon',$data);
		$this->session->set_flashdata('message', 'A coupon has been created.');
 	}
 	
					redirect('/shop/couponList', 'refresh');
 }
 function couponList(){
 	if($this->session->userdata("user_id")){
			
			$data['coupons']=$this->shop->get_content('coupon');

			$this->load->view('couponList',$data);

		}else{
			redirect("/admin");
		}

 }

 public function checkout(){
 	
 	  $total=$this->cart->total();
	 	if($this->session->userdata("Discount")){
	 		 $mt=$this->session->userdata("Discount_method");
	 		if($mt=="amt"){ 
	 			$total=$total-$this->session->userdata("Discount");
	 			
	 		}else{
	 			$disc=$total*$this->session->userdata("Discount")/100;
	 			$total=$total-$disc;
	 		}

	 	}
		 	$p_ids=$p_names=array();
		 	foreach($this->cart->contents() as $item){
		 		$p_ids[]=$item['id'];
		 		$p_names[]=$item['name'];
		 	}
 	if($this->session->userdata('user_id')){
 		$user_id=$this->session->userdata('user_id');
 	}else{
 		$user_id="0";
 	}
 	$data=array('ordered_p_id'=>implode(',', $p_ids),
 		        'ordered_p_name'=>implode(',', $p_names),
 		         'total_amt'=>$total,
 		         'orderd_user_id'=>$user_id
 		         );
 	 $this->shop->saveData('order',$data);
 	 $this->load->view('include/header');
 	 echo "<h1>Thank You For Shopping ".$this->session->userdata('username')."</h1>";
 	 echo "<h3>Your Total Amount :$total $</h3>";
 	 $this->load->view('include/footer');
 	 $this->cart->destroy(); 
 	 $this->session->unset_userdata('Discount');
 	 $this->session->unset_userdata('Discount_method');
 }
  public function orderDetails (){
  	$data['orders']=$this->shop->get_content('order');
  	$this->load->view("orderDetails", $data);
  }

 

}
