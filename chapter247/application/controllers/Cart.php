<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Shop_model','shop');
	}
	public function index(){
		
	}
	//work on cart
 public function add_to_cart(){
 	$id=$this->input->post('p_id');
 	$dat=$this->shop->get_data_single('product',$id);
 	//print_r($dat); die();
 	$data = array(
        'id'      => $dat['id'],
        'qty'     => 1,
        'price'   => $dat['p_price'],
        'name'    => $dat['p_name'],
        'options' => array('image'=>$dat['p_image'])
);

$this->cart->insert($data);

 }
 public function view_cart(){
 	$this->load->view('view-cart');
 }
public function remove_cart(){
		//echo $_POST['cart_id'];
		$this->cart->remove($this->input->post('row_id'));


	}
	public function update_cart(){
		$updtcrt=$_POST;
		$this->cart->update($updtcrt);
		redirect("cart/view_cart");
		
	}
	public function coupon_details(){
       $code=$this->input->post('cpn_code');
       $details=$this->shop->get_content_one('coupon',$code,'cp_code');
       if($details){
       $today_time = strtotime(date("Y-m-d"));
	   $expire_time = strtotime($details['cp_end_date']);
	   $create_time=strtotime($details['cp_start_date']);
	   if ($expire_time > $today_time && $today_time > $create_time){
	   	  
	   	  $mth= $details['cp_discount_method']=='amt'?'$':'%';
	   	   $this->session->set_userdata('Discount',$details['cp_amount']);
	   	   $this->session->set_userdata('Discount_method',$details['cp_discount_method']);
	   	  echo '<p style="color:#fff; float:right;" data-amt="'.$details['cp_amount'].'" data-method="'.$details['cp_discount_method'].'">Apply Coupon Code:'.$code.' Discount Amount: <b>'.$details['cp_amount'].$mth.'</b></p>';

	   } else{
	   	echo '<p style="color:red">Coupon Not valid</p>';
	   }
	  }else{
	  	echo '<p style="color:red">Coupon Not Available</p>';
	  }
      
	}
}
