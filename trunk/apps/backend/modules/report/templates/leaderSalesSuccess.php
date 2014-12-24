<h3>Leader Sales</h3>
<table width='100%' style='border-color: #DDDDDD -moz-use-text-color -moz-use-text-color #DDDDDD;border-image: none; border-style: solid none none solid;border-width: 1px 0 0 1px;'>
    <thead>
    <tr>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'></th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Member ID</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Rank</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>This month sales</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Last month sales</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Commission Percentage</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Last month commission</th>
        <th style='background-color: #CCCCFF; padding: 2px; text-align: center;'>Tree Structure</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $idx = 1;
    foreach ($distDBs as $distDB) { ?>
        <tr class='sf_admin_row_1'>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'><?php echo $idx++;?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: left;'><?php echo $distDB->getDistributorCode()."-".$distDB->getDistributorId();?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: left;'><?php echo $resultArray[$distDB->getDistributorId()]['rank_code'];?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: right;'><?php echo number_format($resultArray[$distDB->getDistributorId()]['totalCurrentMonth'],2);?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: right;'><?php echo number_format($resultArray[$distDB->getDistributorId()]['totalPrevious1Month'],2);?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: right;'><?php echo $resultArray[$distDB->getDistributorId()]['percentage'];?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: right;'><?php echo number_format($resultArray[$distDB->getDistributorId()]['totalPrevious1Month'] * $resultArray[$distDB->getDistributorId()]['percentage'],2);?></td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px; text-align: right;'><?php echo $distDB->getTreeStructure();?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>