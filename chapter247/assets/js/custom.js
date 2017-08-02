$("#confirm-password").on('keyup',function(){
    var pwd=$("#pwd").val();
   if($(this).val()){
    if(pwd==$(this).val()){
    	$(".pwd_error").html('<p style="color:green"> Matched </p>');
    }else{
    	$(".pwd_error").html('<p style="color:red">Not Matched</p>');
    }
}
});
function chek_existance(val,cls){
	$.ajax({
		url:"./admin/chk_existance",
		type:"POST",
		data:{'chk_name_email':val},
		success:function(res){
			if(res==0){
				$("."+cls).html('<p style="color:red"> Already exist </p>');
			}
			
		}
	})

}
function remove_product(id,cat){
	var a =confirm("Do You want to Delete ?");
	if(a){
		$("#row_"+id).hide();
		var data={'id':id,'cat':cat};
		var urlp ="../shop/delete_product";
		var res=ajax_fun(urlp,data);
    location.reload();
   

	}
}

function ajax_fun(url,data){
    $.ajax({
    	url:url,
    	type:"POST",
    	data:data,
    	success:function(res){
    		return res;
    	}
    });
}
$("#search_product").on("keyup",function(e){
   
   var key={'key':$(this).val()};
   if(key){
   var urla="../shop/search_product";
   $.ajax({
    	url:urla,
    	type:"POST",
    	data:key,
    	success:function(res){
    		console.log(res) ;
    		$("#search_body_tabel").html(res);
    	}
    });
}else{
	$("#search_body_tabel").html("");
}
});

function addCart(p_id){
	
	urlc="./cart/add_to_cart";
	data={'p_id':p_id};
	 $.ajax({
    	url:urlc,
    	type:"POST",
    	data:data,
    	success:function(res){
    		/*console.log(res) ;
    		alert(res);*/
    	}
    });
}
$("#coupon_btn").on('click',function(){
     var code=$("#apl_cpn").val();
     if(code){
        $.ajax({
                url:"../cart/coupon_details",
                type:"POST",
                data:{'cpn_code':code},
                success:function(res){
                   $(".cpn_disc").html(res);
                }
    });

     }
});
$(".rmove_prd").on('click',function(){
    var row_id=$(this).data("row");
     $.ajax({
                url:"../cart/remove_cart",
                type:"POST",
                data:{'row_id':row_id},
                success:function(res){
                  $("#"+row_id).hide();
                  location.reload();
                }
    });


})