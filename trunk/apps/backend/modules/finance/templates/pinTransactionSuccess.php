<?php include('scripts_backend.php'); ?>

	<script type="text/javascript">
        $(function() {
            $("#date_from").val("<?php echo $date_from; ?>").datepicker({
                dayNamesMin: "<dayNamesMin>"
                , monthNamesShort: "<monthNamesShort>"
            });
            
            $("#date_to").val("<?php echo $date_to; ?>").datepicker({
                dayNamesMin: "<dayNamesMin>"
                , monthNamesShort: "<monthNamesShort>"
            });
        });

    </script>
    
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
<div class="portlet">
    <div class="portlet-header">Pin Transaction Report</div>
    <div class="portlet-content">
<form action="pinTransaction" id="financeForm" method="post">
<table cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td>
			<?php echo __('Date Range'); ?>
		</td>   
		<td>
			<input name="date_from" type="text" id="date_from" value="<?php echo $date_from; ?>" tabindex="1" onkeypress="return false;"/>&nbsp;<?php echo __('to'); ?>&nbsp;<input name="date_to" type="text" id="date_to"  value="<?php echo $date_to; ?>" tabindex="2" onkeypress="return false;"/>
		</td>
		<td>
			<input type="submit" value="<?php echo __('Submit') ?>" name="btnSubmit" id="btnSubmit">
		</td>
    </tr>
</table>
</form>
<br>
<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			<tr valign="middle" style="background-color:#f1f1f1;height:32px;">
				<td align='left'><?php echo __('Name') ?></td><td align='left'><?php echo __('Trader Code') ?></td><td align='center'><?php echo __('Advance Pin') ?></td><td align='center'><?php echo __('Purchase Pin') ?></td><td align='center'><?php echo __('CPS Price') ?></td><td align="center"><?php echo __('Action') ?></td>
			</tr>
			<?php 
			if($tbl_pins){ 
				foreach($tbl_pins as $tbl_pin){
					$dist = TblDistributorPeer::retrieveByPk($tbl_pin->getFDistId());
					
					$c = new Criteria();
					$c->add(TblPinPeer::F_DIST_ID, $tbl_pin->getFDistId());
					$c->addAnd(TblPinPeer::F_CPS, $tbl_pin->getFCps());
					$c->addAnd(TblPinPeer::F_TYPE, 'advance');
					$advance_pin = TblPinPeer::doSelect($c);
					
					$c = new Criteria();
					$c->add(TblPinPeer::F_DIST_ID, $tbl_pin->getFDistId());
					$c->addAnd(TblPinPeer::F_CPS, $tbl_pin->getFCps());
					$c->addAnd(TblPinPeer::F_ACTION, '', Criteria::NOT_EQUAL);
					$c->addAnd(TblPinPeer::F_TYPE, 'advance');
					$advance_pin2 = TblPinPeer::doSelect($c);
					
					$c = new Criteria();
					$c->add(TblPinPeer::F_DIST_ID, $tbl_pin->getFDistId());
					$c->addAnd(TblPinPeer::F_CPS, $tbl_pin->getFCps());
					$c->addAnd(TblPinPeer::F_TYPE, 'purchase');
					$purchase_pin = TblPinPeer::doSelect($c);
					
					$c = new Criteria();
					$c->add(TblPinPeer::F_DIST_ID, $tbl_pin->getFDistId());
					$c->addAnd(TblPinPeer::F_CPS, $tbl_pin->getFCps());
					$c->addAnd(TblPinPeer::F_ACTION, '', Criteria::NOT_EQUAL);
					$c->addAnd(TblPinPeer::F_TYPE, 'purchase');
					$purchase_pin2 = TblPinPeer::doSelect($c);
					echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"."<td align='left'>".$dist->getFName()."</td><td align='left'>".$dist->getFCode()."</td><td align='center'>".count($advance_pin)." (".count($advance_pin2).")</td><td align='center'>".count($purchase_pin)." (".count($purchase_pin2).")</td><td align='center'>".number_format($tbl_pin->getFCps(),2)."</td><td align='center'>".link_to(__('Details'), 'finance/pinDetails?dist_id='.$tbl_pin->getFDistId().'&date_from='.$date_from."&date_to=".$date_to, array ('class' => 'activeLink', 'target' => 'bonus'))."</td></tr>";
				}
			}
			?>
			</table>
		</td>
    </tr>
</table>
    </div>
</div>
</div>