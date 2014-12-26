<form class="form-horizontal">
	<fieldset>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">商户编号:</label>
		  <div class="controls">
			<p><?php echo $config['mer_sn'];?></p>
		  </div>
	  </div>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">商户名称:</label>
		  <div class="controls">
			<p><?php echo $config['mer_name'];?></p>
		  </div>
	  </div>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">订单编号:</label>
		  <div class="controls">
			<p><?php echo $_POST['paymentId']?></p>
		  </div>
	  </div>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">币种:</label>
		  <div class="controls">
			<p><?php echo $config['mer_currency'];?></p>
		  </div>
	  </div>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">订单金额:</label>
		  <div class="controls">
			<p><?php echo $_POST['orderAmount'];?></p>
		  </div>
	  </div>
	  <div class="affirm_field">
		  <label class="control-label" for="input01">卡类:</label>
		  <div class="controls">
			<p>银联卡</p>
		  </div>
	  </div>
		<div class="affirm_field" style="border:none; height:auto;">
			<div class="pay_succeed">
				<div class="margin_C" style="width:150px;">
				<span class="all_a left"></span>
				<p class="left">支付成功</p>
				</div>
			</div>
		</div>
	  <div class="form-actions">
			<button type="button" class="btn btn-primary" onclick="javascript:location.href='<?php echo $config['mer_homeurl'];?>'"><i class="icon-home icon-white"></i>返回商户</button>
			<button class="btn" style="width:100px;" onclick="javascript:window.close();"><i class="icon-off"></i>关闭本页</button>
	  </div>
	</fieldset>
</form>