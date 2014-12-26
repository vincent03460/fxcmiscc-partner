<?php include('scripts.php'); ?>
<style type="text/css">
#footer {
    background: none repeat scroll 0 0 #333333;
    height: 50px;
    margin: 10px auto 0;
    width: 980px;
    position: fixed;
    bottom: 0px;
}

.user-rank {
    border-width: 0;
    height: auto;
    margin: 0;
    padding: 0;
}

.user-joined {
    border-color: blue;
    text-align: center;
    width: 100px;
    border-style: solid;
    border-width: 1px;
    display: block;
    float: left;
    font-family: arial;
    font-size: 11px;
    height: 15px;
    margin: 9px 0 0 2px;
    overflow: hidden;
    padding: 0 1px;
}

.user-id {
    border-color: orange;
    text-align: center;
    width: 70px;
    border-style: solid;
    border-width: 1px;
    display: block;
    float: left;
    font-family: arial;
    font-size: 11px;
    height: 15px;
    margin: 9px 0 0 2px;
    overflow: hidden;
    padding: 0 1px;
}
.node-info span {
    /*border-style: solid;*/
    border-width: 1px;
    display: block;
    float: left;
    font-family: arial;
    font-size: 11px;
    height: 15px;
    /*margin: 9px 0 0 2px;*/
    /*overflow: hidden;*/
    /*padding: 0 1px;*/
}
</style>

<script type="text/javascript" language="javascript">
    $(function() {
        $("#sponsorTree").treeview({
            url: "/member/manipulateSponsorTree"
        });
    });
</script>

<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td><br></td>
</tr>
<tr>
    <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Genealogy for your Member ID') . ": " . $distinfo->getDistributorCode(); ?></span></td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
<?php echo form_tag('member/sponsorTree', 'id=sponsorForm') ?>
<tr>
    <td>
<table style="width: 50%">
    <tr>
        <td><strong>Full Name</strong></td>
        <td>:</td>
        <td><input size="20" name="fullName" id="txtFullName" value="<?php echo $fullName?>"></td>
        <td><button>Search</button></td>
    </tr>
</table>
    </td>
</tr>
</form>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>
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
        </li>
    <?php
    } else {
            $className = "";

            if ($hasChild) {
                $className = "class='hasChildren'";
            }
            ?>
            <li id="<?php echo $distinfo->getDistributorId();?>" <?php echo $className;?>>
                <span class="node-info">
                    <span class="user-rank"><img src="/css/pages/tree/<?php echo $colorArr[$distinfo->getRankId()]; ?>_head.png"></span>
                    <?php
                    echo "<span class='user-id'>".$distinfo->getDistributorCode()."</span>"
                               . "<span class='user-joined'>" . $distinfo->getFullName()."</span>"
                               . "<span class='user-joined'> Joined " . date('Y-m-d', strtotime($distinfo->getActiveDatetime()))."</span>"
                               . "<span class='user-joined'>" . $distinfo->getRankCode()."</span>";
                    ?>
                </span>
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
    </td>
</tr>
</tbody>
</table>

