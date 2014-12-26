<div class="main_left">
	<div class="main_left_top">
		<div class="main_box_L"></div>
		<div class="main_box_C" style="width: 230px;">商户信息</div>
		<div class="main_box_R"></div>
		<div class="clear"></div>
	</div>
	<div class="main_left_con">
		<a href="#"><img src="/payment-gateway/assets/img/mer_logo.png" class="margin_C" title="Place your logo here"></a>
		<br> <br>
		<p class="p_intro">商户名称:<?php echo $config['mer_name'];?></p>
		<p class="p_intro">交易时间:<?php echo date('Y-m-d', time());?></p>
		<p class="p_intro">交易币种:<?php echo $config['mer_currency'];?></p>
		<p class="p_intro">交易类型:<?php echo $config['mer_trans_type'];?></p>
		<div class="main_left_capion">
			<strong>提示信息:</strong>
			<p>银联将以当天第1最新外汇牌价自动帮你转为人民币结算, 为您节省付款金额1％-2％的外币结算货币转换费.</p>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="main_right">
<div class="main_right_top">
	<div class="main_box_L"></div>
	<div class="main_box_C" style="width: 610px;">在线支付</div>
	<div class="main_box_R"></div>
	<div class="clear"></div>
</div>
<div class="main_right_con">
	<form class="well form-horizontal" id="purchase" action="/paymentGateway/payment" method="post">
	<fieldset>
		<div class="affirm_capion">
		  <div class="affirm_capion_T"></div>
		  <div class="affirm_capion_C">
			<P>尊敬的银联卡持卡人:</P>
			<P>为了保障您的利益, 防范不法分子非法行为, 请在进行网上支付前仔细核对为你提供的商家服务防范不法分子非法行为, 商家名称, 商品名称及交易金额是否为你索确认的支付信息, 不要轻易相信来自电子邮件, 即时聊天工具或或短信的支付连接, 以防您卡内的资金给骗走. 对交易信息有疑问时, 欢迎致电95516或商家的客服热线进行咨询! 祝您付款愉快.</P>
		  </div>
		  <div class="affirm_capion_B"></div>
		</div>
		<div class="control-group accout_info all_a" style="margin-bottom: 20px;">订单确认</div>
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
			<p><?php echo $parameter['orderNumber'];?></p>
		  </div>
		</div>
        <div class="affirm_field">
            <label class="control-label" for="input01">商品名稱:</label>
            <div class="controls">
                <p><?php echo $parameter['commodityName'];?></p>
            </div>
        </div>
        <div class="affirm_field">
            <label class="control-label" for="input01">商品單價:</label>
            <div class="controls">
                <p><?php echo $parameter['commodityUnitPrice'];?></p>
            </div>
        </div>
        <div class="affirm_field">
            <label class="control-label" for="input01">運輸費用:</label>
            <div class="controls">
                <p><?php echo $parameter['transferFee'];?></p>
            </div>
        </div>
        <div class="affirm_field">
            <label class="control-label" for="input01">優惠資訊:</label>
            <div class="controls">
                <p><?php echo $parameter['commodityDiscount'];?></p>
            </div>
        </div>
        <div class="affirm_field">
            <label class="control-label" for="input01">持卡人姓名:</label>
            <div class="controls">
                <p><?php echo $parameter['customerName'];?></p>
            </div>
        </div>
        <div class="affirm_field">
            <label class="control-label" for="input01">持卡人卡號:</label>
            <div class="controls">
                <p><?php echo $parameter['cutomerCardNumber'];?></p>
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
			<p><?php echo $parameter['orderAmount'];?></p>
		  </div>
		</div>
		<div class="affirm_field">
		  <label class="control-label" for="input01">卡类:</label>
		  <div class="controls">
			<p>银联卡</p>
		  </div>
		</div>
		<input type="hidden" name="Order[orderAmount]" id="Order_amount" value="<?php echo $parameter['orderAmount']?>">
		<input type="hidden" name="Order[orderNumber]" id="Order_id_no" value="<?php echo $parameter['orderNumber']?>">
        <input type="hidden" name="Order[commodityName]" id="Order_commodityName" value="<?php echo $parameter['commodityName']?>">
        <input type="hidden" name="Order[commodityUrl]" id="Order_commodityUrl" value="<?php echo $parameter['commodityUrl']?>">
        <input type="hidden" name="Order[commodityUnitPrice]" id="Order_commodityUnitPrice" value="<?php echo $parameter['commodityUnitPrice']?>">
        <input type="hidden" name="Order[commodityQuantity]" id="Order_commodityQuantity" value="<?php echo $parameter['commodityQuantity']?>">
        <input type="hidden" name="Order[transferFee]" id="Order_transferFee" value="<?php echo $parameter['transferFee']?>">
        <input type="hidden" name="Order[commodityDiscount]" id="Order_commodityDiscount" value="<?php echo $parameter['commodityDiscount']?>">
        <input type="hidden" name="Order[customerName]" id="Order_customerName" value="<?php echo $parameter['customerName']?>">
        <input type="hidden" name="Order[cutomerCardNumber]" id="Order_cutomerCardNumber" value="<?php echo $parameter['cutomerCardNumber']?>">


		<div class="form-actions">
			<button class="btn btn-primary" type="submit" name="yt0">
				<i class="icon-shopping-cart icon-white"></i> 开始支付
			</button>
			<a onclick="window.print();" class="btn">
				<i class="icon-print"></i> 打印本页
			</a>
		</div>
	</fieldset>
</form>
<!-- form -->
</div>
	<table class="Notes" cellspacing="0" width="100%">
		<tr>
			<td colspan="7" class="th_color" align="left"
				style="background-color: #d5d5d5;">&nbsp;&nbsp;直联银行(排名不分先後)</td>
		</tr>
        <tr>
            <td><span class="bank01"></span></td>
            <td><span class="bank02"></span></td>
            <td><span class="bank03"></span></td>
            <td><span class="bank04"></span></td>
        </tr>
        <tr>
            <td><span class="bank05"></span></td>
            <td><span class="bank06"></span></td>
            <td><span class="bank07"></span></td>
            <td><span class="bank08"></span></td>
        </tr>
        <tr>
            <td><span class="bank10"></span></td>
            <td><span class="bank11"></span></td>
            <td><span class="bank12"></span></td>
            <td><span class="bank14"></span></td>
        </tr>
		<tr>
            <td><span class="bank15"></span></td>
			<td><span class="bank17"></span></td>
			<td><span class="bank18"></span></td>
			<td><span class="bank88"></span></td>
        </tr>
		<tr>
			<td><span class="bank119"></span></td>
			<td><span class="bank93"></span></td>
			<td><span class="bank13"></span></td>
			<td><span class="bank19"></span></td>            
        </tr>
		<tr>
            <td><span class="bank120"></span></td>
			<td><span class="bank50"></span></td>
			<td><span class="bank45"></span></td>
			<td><span class="bank121"></span></td>
        </tr>
		<tr>
            <td><span class="bank16"></span></td>
			<td><span class="bank122"></span></td>
			<td><span class="bank123"></span></td>
			<td><span class="bank09"></span></td>
        </tr>
		<tr>
            <td><span class="bank116"></span></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
        </tr>

		
        <tr>
            <td colspan="7" class="th_color" align="left"
                style="background-color: #d5d5d5;">&nbsp;&nbsp;其它银行/认证支付</td>
        </tr>
        <tr>
            <td><span class="bank118"></span></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
	</table>
	<div class="clear"></div>
</div>