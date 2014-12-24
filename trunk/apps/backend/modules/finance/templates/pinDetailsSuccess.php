<?php include('scripts_backend.php'); ?>


<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			
			<?php 
			echo "<tr valign='middle' style='background-color:#f1f1f1;height:32px;'><td align='center'>".__('No.')."</td><td align='center'>".__('Purchase Date')."</td><td align='center'>".__('Pin')."</td><td align='center'>".__('CPS Price')."</td><td align='center'>".__('Type')."</td><td align='center'>".__('Action')."</td><td align='center'>".__('Action Date')."</td></tr>";
							
			foreach($TblPins as $pin){
				$i++;
				/*if($pin->getFDistId2()>0)
					$dist = TblDistributorPeer::retrieveByPk($pin->getFDistId2());
				else
					$dist = new TblDistributor();
				*/
				echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\"><td align='center'>".$i."</td><td align='center'>".$pin->getFCreatedDatetime()."</td><td align='center'>".$pin->getFPin()."</td><td align='center'>".$pin->getFCps()."</td><td align='center'>".$pin->getFType()."</td><td align='center'>".$pin->getFAction()."</td><td align='center'>".$pin->getFActionDatetime()."</td></tr>";
			}
			?>
			</table>
		</td>
    </tr>
</table>