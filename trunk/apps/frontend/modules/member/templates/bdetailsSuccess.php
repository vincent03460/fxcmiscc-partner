<?php include('scripts.php'); ?>


<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			
			<?php 
			$i=0;
			if($bonus<>'gdb'){
				echo "<tr valign='middle' style='background-color:#f1f1f1;height:32px;'><td align='center'>".__('No.')."</td><td align='center'>".__('Date')."</td><td align='center'>".__('From Trader')."</td><td align='center'>".__('CPS')."</td><td align='center'>".__('CPS Price')."</td><td align='center'>".__('Amount')."</td></tr>";
							
				foreach($TblBonus as $bonus){
					$i++;
					echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\"><td align='center'>".$i."</td><td align='center'>".$bonus->getFBonusDate()."</td><td align='center'>".TblDistributorPeer::retrieveByPk($bonus->getFFromDistId())->getFCode()."</td><td align='right'>".$bonus->getFAmount()."</td><td align='right'>".number_format($bonus->getFVolumeType(),2)."</td><td align='right'>".number_format($bonus->getFAmount2(),2)."</td></tr>";
				}
			}
			
			if($bonus=='gdb'){
				echo "<tr valign='middle' style='background-color:#f1f1f1;height:32px;'><td align='center'>".__('No.')."</td><td align='center'>".__('Date')."</td><td align='center'>".__('Left Trader')."</td><td align='center'>".__('Left CPS')."</td><td align='center'>".__('Right Trader')."</td><td align='center'>".__('Right CPS')."</td><td align='center'>".__('Group Development')."</td><td align='center'>".__('CPS')."</td><td align='center'>".__('CPS Price')."</td><td align='center'>".__('Amount')."</td></tr>";
							
				foreach($TblBonus as $bonus){
					$i++;
					echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\"><td align='center'>".$i."</td><td align='center'>".$bonus->getFBonusDate()."</td><td align='center'>".TblDistributorPeer::retrieveByPk($bonus->getFLeg1Id())->getFCode()."</td><td align='right'>".$bonus->getFLeg1Amount()."</td><td align='center'>".TblDistributorPeer::retrieveByPk($bonus->getFLeg2Id())->getFCode()."</td><td align='right'>".$bonus->getFLeg2Amount()."</td><td align='right'>".$bonus->getFPairedUnit()."</td><td align='right'>".$bonus->getFAmount()."</td><td align='right'>".$bonus->getFVolumeType()."</td><td align='right'>".number_format($bonus->getFAmount2(),2)."</td></tr>";
				}
			}
			
			
			?>
			</table>
		</td>
    </tr>
</table>