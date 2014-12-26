<?php
header("Content-type:text/html; charset=gb2312"); 
?>
<html>
  <head>
    <title>redirecting......</title>
    <meta http-equiv="content-Type" content="text/html; charset=utf8" />
  </head>
  <body>
  <?php
//  $ver = "1.0";
//  $merid = "100009";
//  $orderid = date("Ymdhis");
//  $amount = "0.10";
//  $orderdate = date("Ymd");
//  $curtype = "RMB";
//  $paytype = "01";
//  $lang = "GB";
//  $returnurl = "http://partner.maximtrader.com/member/gozSuccessRedirect";
//  $errorurl = "http://partner.maximtrader.com/member/gozErrorRedirect";
  //$remark = "testremarkaa";
//  $enctype = "1";
//  $channelid = "CMB";

//  $md5Key = "88496625849445331821427993934397583101845496550535688096140279054296113998693043340961948795056633136331268949200793818235742794";
//  $orge = 'ver='.$ver.'&merid='.$merid.'&orderid='.$orderid.'&amount='.$amount.'&orderdate='.$orderdate.'&curtype='.$curtype.'&paytype='.$paytype.'&lang='.$lang.'&returnurl='.$returnurl.'&errorurl='.$errorurl.'&remark1='.$remark.'&enctype='.$enctype.'&notifytype=2&urltype=1&s2surl='.$errorurl.'&goodsname=goods&channelid='.$channelid;
    //echo  $orge;
//  $SignMD5 = md5($orge.$md5Key) ;
  ?>
    <form action="http://www.goz-llq.com/do/Trade/iPay/goTrans.aspx" method="post" id="frm1">
	<input type="hidden" name="ver" value="<?php echo $ver ?>" />
	<input type="hidden" name="merid" value="<?php echo $merid ?>" />
	<input type="hidden" name="orderid" value="<?php echo $orderid ?>" /><!-- md5随机-->
	<input type="hidden" name="amount" value="<?php echo $amount ?>" />
	<input type="hidden" name="orderdate" value="<?php echo $orderdate ?>" /><!--订单日期yyymmdd -->
	<input type="hidden" name="curtype" value="<?php echo $curtype ?>" /><!--币种 默认BMB -->
	<input type="hidden" name="paytype" value="<?php echo $paytype ?>" />
	<input type="hidden" name="lang" value="<?php echo $lang ?>" />
	<input type="hidden" name="returnurl" value="<?php echo $returnurl ?>" /><!--返回地址  1次-->
	<input type="hidden" name="errorurl" value="<?php echo $errorurl ?>" /><!--错误返回地址 -->
	<input type="hidden" name="remark1" value="<?php echo $remark ?>" />
	<input type="hidden" name="enctype" value="<?php echo $enctype ?>" />
	<input type="hidden" name="notifytype" value="2" />
	<input type="hidden" name="urltype" value="1" />
	<input type="hidden" name="s2surl" value="<?php echo $errorurl ?>" /><!-- 后台返回地址 4/5次 -->
	<input type="hidden" name="goodsname" value="goods" />
	<input type="hidden" name="channelid" value="<?php echo $channelid ?>" />
	<input type="hidden" name="sign" value="<?php echo $SignMD5;?>" />
<!--	<input type="submit" />-->
    </form>
    <script language="javascript">
        document.getElementById("frm1").submit();
    </script>
  </body>
</html>