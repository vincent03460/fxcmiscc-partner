<?php

        $tableFormat = "<table>";
        $tableFormat .= "<tr>";
        $tableFormat .= "<td>DistId</td>";
        $tableFormat .= "<td>Full Name</td>";
        $tableFormat .= "<td>Nick Name</td>";
        $tableFormat .= "<td>Bank Name</td>";
        $tableFormat .= "<td>Bank Holder Name</td>";
        $tableFormat .= "<td>Bank State</td>";
        $tableFormat .= "<td>Bank Branch</td>";
        $tableFormat .= "<td>Address</td>";
        $tableFormat .= "<td>Address 2</td>";
        $tableFormat .= "<td>City</td>";
        $tableFormat .= "<td>State</td>";
        $tableFormat .= "</tr>";

        foreach ($mlmDistributors as $mlmDistributor) {
            $tableFormat .= "<tr>";
            $tableFormat .= "<td>".$mlmDistributor->getDistributorId()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getFullName()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getNickName()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getBankName()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getBankHolderName()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getBankState()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getBankBranch()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getAddress()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getAddress2()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getCity()."</td>";
            $tableFormat .= "<td>".$mlmDistributor->getState()."</td>";
            $tableFormat .= "</tr>";
        }
        $tableFormat .= "</table>";
        echo $tableFormat;
?>