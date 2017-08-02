<?php $this->load->view('include/header');?>

<div class="container">
   <div class="row">
   <?php echo form_open('cart/update_cart'); ?>

<table class="table table-bordered product_table" cellpadding="6" cellspacing="1" style="width:100%" border="0">
<thead>
<tr>
        <th>QTY</th>
        <th>Item Description</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>
</thead>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  <tbody>
        <tr id="<?=$items['rowid']?>">
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','id'=>'nofqty')); ?>
                    <span class="rmove_prd" data-row="<?=$items['rowid']?>">X</span>
                </td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <!-- <strong><?php echo $option_name; ?>:</strong> -->
                                                <img width="10%" src="<?=ASSETS.'upload/'.$option_value?>">
                                                <br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
</tbody>
</table>
<p><?php echo form_submit('update_cart', 'Update your Cart',array('class'=>'btn btn-warning pull-right')); ?></p>
<div align='left'> 
    <input type="text" name="apl_cpn" id="apl_cpn" >
    <a href='#' class="btn btn-info" id='coupon_btn'>Apply coupon</a>
</div>
</br>
<div class="cpn_disc"></div></br>
<a href="<?=base_url()?>shop/checkout" class="btn btn-danger pull-right">Place Order</a>
   </div>
   </div>


<?php $this->load->view('include/footer');?>