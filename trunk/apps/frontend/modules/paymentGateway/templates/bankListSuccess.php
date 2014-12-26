<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/payment-gateway/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="/payment-gateway/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/payment-gateway/assets/css/unionpay.css">
<script type="text/javascript" src="/payment-gateway/assets/js/jquery.js"></script>
<title>Purchase Order</title>
</head>

<?php var_dump("================"); ?>
<?php var_dump($result); ?>
<body>
	<div class="warp_out">
		<div class="warp">
			<!-- header -->
			<div class="unionpay_header">
				<a href="#" class="unionpay_logo all_a left"></a>
			</div>
			<!-- mian -->
			<div class="unionpay_main">
			<div class="main_left">
	<div class="main_left_top">
		<div class="main_box_L"></div>
		<div class="main_box_C" style="width: 230px;">商户信息</div>
		<div class="main_box_R"></div>
		<div class="clear"></div>
	</div>
	<div class="main_left_con">
		<a href="#"><img src="assets/img/mer_logo.png" class="margin_C" title="Place your logo here"></a>
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
    <form id="banklist" name="banklist" class="form-horizontal" action="" method="post">
        <fieldset>
          <div class="affirm_capion">
              <div class="affirm_capion_T"></div>
              <div class="affirm_capion_C">
                <P>尊敬的银联卡持卡人:</P>
                <P>为了保障您的用卡权益，防范不法份子欺诈行为，请在进行网上支付前仔细核对为您提供服务的商家域名、商家名称、商品名称及交易金额是否为您所确认的支付信息，不要轻易相信来自电子邮件、实时聊天工具或短信的支付链接，以防您的卡内资金被骗。对交易信息有疑问时，欢迎致电95516或商家的客服热线进行咨询。祝您支付愉快。</P>
              </div>
              <div class="affirm_capion_B"></div>
          </div>
          <div class="control-group accout_info all_a" style="margin-bottom: 20px;">请选择下列支付银行</div>
                <div name="bank_list" id="bank_list">
                    <p>直联银行(排名不分先後)</p>
                <ul>
                    <li class="icbc" data-value="ICBC"></li>
                    <li class="abc" data-value="ABC"></li>
                    <li class="boc" data-value="BOC"></li>
                    <li class="ccb" data-value="CCB"></li>
                </ul>
                <ul>
                    <li class="bcom" data-value="BCOM"></li>
                    <li class="psbc" data-value="PSBC"></li>
                    <li class="citic" data-value="CITIC"></li>
                    <li class="cmbc" data-value="CMBC"></li>
                </ul>
                <ul>
                    <li class="ceb" data-value="CEB"></li>
                    <li class="cmb" data-value="CMB"></li>
                    <li class="spdb" data-value="SPDB"></li>
                    <li class="hxb" data-value="HXB"></li>
                </ul>
                <ul>
                    <li class="cib" data-value="CIB"></li>
                    <li class="gdb" data-value="GDB"></li>
                    <li class="bea" data-value="BEA"></li>
                    <li class="srcb" data-value="SRCB"></li>
                </ul>
                <ul>

                    <li class="cbhb" data-value="CBHB"></li>
                    <li class="bjrcb" data-value="BJRCB"></li>
                    <li class="njcb" data-value="NJCB"></li>
                    <li class="nbcb" data-value="NBCB"></li>
                </ul>
                <ul>

                    <li class="hzb" data-value="HZB"></li>
                    <li class="pab" data-value="PAB"></li>
                    <li class="hsb" data-value="HSB"></li>
                    <li class="czb" data-value="CZB"></li>
                </ul>
                <ul>

                    <li class="shb" data-value="SHB"></li>
                    <li class="gzcb" data-value="GZCB"></li>
                </ul>
                <p style="border-bottom: 1px solid #CCC; line-height: 1px; height: 1px; width: 100%;"></p>
                <p>其它銀行/認證支付</p>
                <ul>
                    <li class="other" data-value="OTHER"></li>
                </ul>
                </div>
          <input name="bank_type" id="bank_type" type="text" value="ICBC" />
          <input name="Order[orderAmount]" id="Order[orderAmount]" type="hidden" value="<?php echo $order["orderAmount"];?>"/>
          <input name="Order[orderNumber]" id="Order[orderNumber]" type="text" value="<?php echo $order["orderNumber"];?>">
            <input type="hidden" name="Order[commodityName]" id="Order_commodityName" value="<?php echo $order['commodityName']?>">
            <input type="hidden" name="Order[commodityUrl]" id="Order_commodityUrl" value="<?php echo $order['commodityUrl']?>">
            <input type="hidden" name="Order[commodityUnitPrice]" id="Order_commodityUnitPrice" value="<?php echo $order['commodityUnitPrice']?>">
            <input type="hidden" name="Order[commodityQuantity]" id="Order_commodityQuantity" value="<?php echo $order['commodityQuantity']?>">
            <input type="hidden" name="Order[transferFee]" id="Order_transferFee" value="<?php echo $order['transferFee']?>">
            <input type="hidden" name="Order[commodityDiscount]" id="Order_commodityDiscount" value="<?php echo $order['commodityDiscount']?>">
            <input type="text" name="Order[customerName]" id="Order_customerName" value="<?php echo $order['customerName']?>">
            <input type="hidden" name="Order[cutomerCardNumber]" id="Order_cutomerCardNumber" value="<?php echo $order['cutomerCardNumber']?>">

        </fieldset>
    </form>

    <script type="text/javascript">
        jQuery(function($){
            $('#bank_list li').click(function(){
                $('input[name=bank_type]', '#banklist').val($(this).data('value')).change();
//                $('input[name=bank_type]:hidden', '#banklist').val($(this).data('value')).change();
                $('#banklist').submit();
            });
        });
    </script>

</div>
	<div class="clear"></div>
</div>
			</div>
			<div class="clear"></div>
			<div class="clear"></div>
		</div>
	</div>
	<!--  footer -->
	<div class="unionpay_footer">
		<p>Powered by Linking Business Network Ltd. All rights reserved.</p>
	</div>
	</div>
	<script src="/payment-gateway/assets/js/jquery.js"></script>
	<script src="/payment-gateway/assets/js/bootstrap-tab.js"></script>
</body>
</html>
