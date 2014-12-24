<?php include('scripts_backend.php'); ?>

<style type="text/css">
div.tree-node {
    border: 0 solid #000000;
    float: left;
    font-size: 11px;
    height: 16px;
    margin-left: -16px;
}
span.gen_spread, span.gen_img, span.gen_id, span.gen_mt4_id, span.gen_name, span.gen_active, span.gen_inact, span.gen_jdate {
    display: block;
    float: left;
    font-size: 11px;
    height: 12px;
    line-height: 12px;
    margin: 0 3px 0 0;
    padding: 0 2px;
}
span.gen_id {
    border: 1px solid #FF6E14;
    color: #000000;
    text-align: center;
}
span.gen_active {
    border: 1px solid #129029;
    color: green;
    text-align: center;
}
span.gen_name {
    border: 1px solid #000000;
    color: #000000;
    text-align: center;
}
span.gen_active {
    border: 1px solid #129029;
    color: green;
    text-align: center;
}
span.gen_jdate {
    border: 1px solid #0000FF;
    color: #000000;
    text-align: center;
}
</style>

<script type="text/javascript" language="javascript">
$(function() {
    $("#sponsorTree").treeview({
        url: "<?php echo url_for('marketing/manipulateSponsorTree') ?>"
    });
});
</script>

<div style="padding: 10px; top: 30px; width: 98%">
<div class="portlet">
    <div class="portlet-header"><?php echo __('Sponsor Tree') ?></div>
    <div class="portlet-content">

        <?php if ($doSearch == true && !$searchDist) { ?>
            <div class="ui-widget">
                <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                        <strong>Invalid e-Trader full name.</strong></p>
                </div>
            </div>
        <?php } ?>

<?php echo form_tag('marketing/sponsorTree', 'id=sponsorForm') ?>
<table>
    <tr>
        <td><strong>Full Name</strong></td>
        <td>:</td>
        <td><input size="20" name="fullName" id="txtFullName" value="<?php echo $fullName?>"></td>
        <td><button>Search</button></td>
    </tr>
</table>
</form>
<br>
<p class='bold'><strong><?php echo __('Genealogy for your Trader ID').": ".$distinfo->getDistributorCode(); ?></strong></p>
<div class='genealogy'>

<ul id="sponsorTree" style="background-color: #ffffff;">
    <?php
    if ($doSearch == true && $searchDist) {
    ?>
        <li class="open" id="<?php echo $distinfo->getDistributorId();?>">
            <span><?php echo "<span class='gen_id'>".$distinfo->getDistributorCode()."</span> <span class='gen_active'>".$distinfo->getNickName()."</span> Joined ".date('Y-m-d', strtotime($distinfo->getCreatedOn()));?></span>
            <ul>
                <?php
                for ($i = 0; $i < count($arrTree); $i++) {
                    $className = "";

                    $totalDist = count($searchDistArr);

                    if (count($searchDistArr) > 2 && $arrTree[$i]["code"] == $searchDistArr[1]["code"]) {
                        $endTag = "";
                        $lastTag = false;
                    ?>

                    <?php
                        for ($x = 1; $x < count($searchDistArr); $x++) {
                            if ($searchDistArr[$x]["hasChildren"]) {
                                $className = "class='hasChildren'";
                            }

                            if (($totalDist - 1) != $x) {
                                $className = "class='open'";
                            } else {
                                $lastTag = true;
                            }

                            /****** Sibling ******/
                            if ($x != 1) {
                                $distSiblings = $searchDistArr[$x]["sibling"];
                                foreach ($distSiblings as $distSibling) {
                            ?>
                                    <li id="<?php echo $distSibling["id"];?>" class='hasChildren'>
                                        <?php echo $distSibling['text']."<-"?>
                                        <?php if ($distSibling["hasChildren"] ) { ?>
                                            <ul>
                                                <li><span class="placeholder">&nbsp;</span></li>
                                            </ul>
                                        <?php } ?>
                                    </li>
                            <?php
                                }
                            }
                            /****** ~ end Sibling end ~ ******/
                ?>
                            <li id="<?php echo $searchDistArr[$x]["id"];?>" <?php echo $className;?>>
                                <?php echo $searchDistArr[$x]['text']?>
                                <?php
                                    if ($lastTag && $searchDistArr[$x]["hasChildren"]) { ?>
                                        <ul>
                                            <li><span class="placeholder">&nbsp;</span></li>
                                        </ul>
                                <?php
                                    } else {
                                        //echo "<ul><li><span>".$searchDistArr[$x]['text']."<<-"."</span>";
                                        echo "<ul>";

                                        $endTag .= "</ul>";
                                    }
                            $endTag .= "</li>";
                        }
                        echo $endTag;
                    } else {
                        if ($arrTree[$i]["hasChildren"]) {
                            $className = "class='hasChildren'";
                        }
                ?>
                    <li id="<?php echo $arrTree[$i]["id"];?>" <?php echo $className;?>>
                        <?php echo $arrTree[$i]['text']?>
                        <?php if ($arrTree[$i]["hasChildren"] ) { ?>
                            <ul>
                                <li><span class="placeholder">&nbsp;</span></li>
                            </ul>
                        <?php } ?>
                    </li>
                <?php
                    }
                }
                ?>
            </ul>

            <!--<ul>
                <li class="open"><span>Item 3.0</span>
                    <ul>
                        <li><span>Item 3.0.0</span></li>
                        <li><span>Item 3.0.1</span>
                            <ul>
                                <li><span>Item 3.0.1.0</span></li>
                                <li><span>Item 3.0.1.1</span></li>
                            </ul>
                        </li>
                        <li><span>Item 3.0.2</span>
                        <ul>
                            <li><span>Item 3.0.2.0</span></li>
                            <li><span>Item 3.0.2.1</span></li>
                            <li><span>Item 3.0.2.2</span></li>
                        </ul>
                    </li>
                    </ul>
                </li>
            </ul>-->
        </li>
    <?php
    } else {
        $className = "";

        if ($hasChild) {
            $className = "class='hasChildren'";
        }
    ?>
        <li id="<?php echo $distinfo->getDistributorId();?>" <?php echo $className;?>>
            <span><?php echo "<span class='gen_id'>".$distinfo->getDistributorCode()."</span> <span class='gen_active'>".$distinfo->getNickName()."</span> Joined ".date('Y-m-d', strtotime($distinfo->getCreatedOn()));?></span>
            <?php
            if ($hasChild) {
            ?>
            <ul>
                <li><span class="placeholder">&nbsp;</span></li>
            </ul>
            <?php } ?>
        </li>
    <?php } ?>
</ul>

</div>

</div></div></div>