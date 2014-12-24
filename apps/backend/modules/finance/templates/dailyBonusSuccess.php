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
    <div class="portlet-header">Daily Bonus Report</div>
    <div class="portlet-content">
<form action="dailyBonus" id="financeForm" method="post">
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
				<td align='left'><?php echo __('Name') ?></td><td align='left'><?php echo __('Trader Code') ?></td><td align='center'><?php echo __('DRB') ?></td><td align='center'><?php echo __('GDB') ?></td><td align='center'><?php echo __('GAP') ?></td><td align="center"><?php echo __('ELB') ?></td><td align="center"><?php echo __('WPB') ?></td><td align="center"><?php echo __('Total') ?></td><td align="center"><?php echo __('Action') ?></td>
			</tr>
			<?php 
			if($rs){
				while ($rs->next()) {
					$arr = $rs->getRow();
					
					if($arr['f_total']>0)
						echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"."<td align='left'>".$arr['f_name']."</td><td align='left'>".$arr['f_code']."</td><td align='center'>".number_format($arr['f_dsb'],2)."</td><td align='center'>".number_format($arr['f_gdb'],2)."</td><td align='center'>".number_format($arr['f_gap'],2)."</td><td align='center'>".number_format($arr['f_elb'],2)."</td><td align='center'>".number_format($arr['f_wpb'],2)."</td><td align='center'>".number_format($arr['f_total'],2)."</td><td align='center'>".link_to(__('Details'), 'finance/dailyDetails?dist_id='.$arr['f_id'].'&date_from='.$date_from."&date_to=".$date_to, array ('class' => 'activeLink', 'target' => 'bonus'))."</td></tr>";
					
					$sum_dsb += $arr['f_dsb'];
					$sum_gdb += $arr['f_gdb'];
					$sum_gap += $arr['f_gab'];
					$sum_elb += $arr['f_elb'];
					$sum_wpb +=	$arr['f_wpb'];
					$sum_total += $arr['f_total'];
				}
				
				echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"."<td align='right' colspan='2'>Total</td><td align='center'>".number_format($sum_dsb,2)."</td><td align='center'>".number_format($sum_gdb,2)."</td><td align='center'>".number_format($sum_gap,2)."</td><td align='center'>".number_format($sum_elb,2)."</td><td align='center'>".number_format($sum_wpb,2)."</td><td align='center'>".number_format($sum_total,2)."</td><td align='center'></td></tr>";
			}		
			?>
			</table>
		</td>
    </tr>
</table>
    </div>
</div>
</div>