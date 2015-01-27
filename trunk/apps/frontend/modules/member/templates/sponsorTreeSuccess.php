<?php
use_helper('I18N');
?>
<style type="text/css">

.clear {
    clear: both;
}
.tree-genealogy {
    height: 700px;
    overflow: auto;
    width: 600px;
}
.controller-node-con {
    min-width: 413px;
}
.tree-controller, .tree-controller-in {
    height: 48px;
    width: 28px;
}
.tree-controller-dash, .tree-controller-dashplus, .tree-controller-dashminus {
    background: url("/css/network/leaf_h.png") repeat-x scroll 0 24px transparent;
    float: left;
    margin-left: 16px;
    width: 12px;
}
.tree-controller-wrap, .tree-controller-l-wrap {
    margin-left: 28px;
}
.tree-controller-wrap {
    background: url("/css/network/leaf.png") repeat-y scroll 16px 0 transparent;
}
.tree-controller-tplus-line, .tree-controller-lplus-line, .tree-controller-tminus-line, .tree-controller-lminus-line, .tree-controller-t-line, .tree-controller-l-line {
    float: left;
    margin-left: 16px;
    width: 12px;
}
.tree-controller-lplus-line, .tree-controller-lminus-line, .tree-controller-l-line {
    background: url("/css/network/leaf.png") repeat-y scroll 0 0 transparent;
    float: left;
    height: 24px;
}
.tree-controller-lplus-right, .tree-controller-tplus-right, .tree-controller-tminus-right, .tree-controller-lminus-right, .tree-controller-l-right, .tree-controller-t-right {
    background: url("/css/network/leaf_h.png") repeat-x scroll 0 24px transparent;
    float: left;
    width: 12px;
}
.tree-controller-dash img, .tree-controller-dashplus img, .tree-controller-dashminus img, .tree-controller-tminus-right img, .tree-controller-lminus-right img, .tree-controller-tplus-right img, .tree-controller-lplus-right img {
    margin-left: -4px;
}
img.tree-minus-button, img.tree-plus-button {
    margin-top: 20px;
}
img.tree-minus-button:hover, img.tree-plus-button:hover {
    cursor: pointer;
}
.node-info-raw {
    height: 48px;
    overflow: hidden;
    /*width: 385px;*/
    width: 450px;
}
</style>

<script type="text/javascript" language="javascript">
    var datagrid = null;
    $(function() {

    }); // end function
</script>

<td valign="top">

    <h2><?php echo __("Sponsor Genealogy")?></h2>

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal label-left" method="post"
                    action="/member/sponsorTree"
                    data-validate="parsley"
                    id="sponsorForm" name="sponsorForm">

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th>
                    <label class="control-label" for="txtFullName">
                        <?php echo __("Search By Username")?>
                    </label>
                </th>
                <td>
                    <input type="text" id="txtFullName" name="fullName" class="form-control" value="<?php echo $fullName?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right">
                    <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>

    <div class="table">
      <table cellpadding="0" cellspacing="10" width="100%">
        <tr>
          <td>
            <table cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td class="tablebg">

    <link rel='stylesheet' type='text/css' media='screen' href='/css/network/gentree.css'/>

    <script src="/js/jquery/jquery-1.9.0.js"></script>
    <script src="/js/jquery/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#btnSubmit").click(function(event){
            event.preventDefault();
            $("#sponsorForm").submit();
        });
        $(document.body).on('click', 'img.tree-minus-button' ,function(){
            $(this).attr('class', 'tree-plus-button');
            var nodeId = $(this).parent().parent().next().attr('id').replace(/^node\-id\-/, '');
            $('#node-wrapper-'+nodeId).slideUp(200);
            $(this).attr('src', '/css/network/plus.png');
        });
        $(document.body).on('click', 'img.tree-plus-button' ,function(){
            $(this).attr('class', 'tree-minus-button');
            var nodeId = $(this).parent().parent().next().attr('id').replace(/^node\-id\-/, '');
            if($('#node-wrapper-'+nodeId).attr('class').match(/ajax\-more/)){
                $('#node-wrapper-'+nodeId).removeClass('ajax-more');
                ajaxLoadNode(nodeId);
            }
            $('#node-wrapper-'+nodeId).slideDown(200);
            $(this).attr('src', '/css/network/minus.png');
        });


        function ajaxLoadNode(nodeId){
            $('#node-wrapper-'+nodeId).html('<img src="/css/network/spinner.gif">');
            $.ajax({
                url: '/member/manipulateSponsorTree?root='+nodeId,
                type: 'post',
                dataType: 'html',
                error: function(){
                    debug('error loading nodes for ' + nodeId);
                },
                success: function(data){
                    $('#node-wrapper-'+nodeId).html(data);
                },
                complete: function(){
                }
            });
        }

        function debug(str){
            alert(str);
        }
    });
    </script>

                  <div class="tree-genealogy">
                    <?php
                    $treeLine = "tree-controller-lplus-line";
                    $treeLine2 = "tree-controller-lplus-right";
                    $treeLineNoChild = "tree-controller-t-line";
                    $treeLineNoChild2 = "tree-controller-t-right";
                    $treeControllerWrap = "tree-controller-wrap";
                    $img = "<img class='tree-plus-button' src='/css/network/plus.png'>";

                    if ($idx == $count) {
                      $treeLineNoChild = "tree-controller-l-line";
                      $treeLineNoChild2 = "tree-controller-l-right";
                      $treeControllerWrap = "tree-controller-l-wrap";
                    }

                    if ($hasChild) {
                    } else {
                      $img = "";
                      $treeLine = $treeLineNoChild;
                      $treeLine2 = $treeLineNoChild2;
                    }
                    ?>
                      <div class="<?php echo $treeControllerWrap;?>">
                        <div class="controller-node-con">
                          <div class="tree-controller <?php echo $treeLine;?>">
                            <div class="tree-controller-in <?php echo $treeLine2;?>">
                              <?php echo $img; ?>
                            </div>
                          </div>
                          <div id="node-id-<?php echo $distinfo->getDistributorId();?>" class="node-info-raw">
                            <div class="node-info">
                              <span class="user-rank"><img src="/css/network/<?php echo $headColor; ?>_head.png"></span>
                              <span class="user-id"><?php echo $distinfo->getDistributorCode() . "<br/>(" . $distinfo->getFullName() . ")" ?></span>
                              <span class="user-joined"><?php echo __('Joined'); ?> <?php echo date('Y-m-d', strtotime($distinfo->getActiveDatetime())); ?></span>
                              <span class="user-joined"><?php echo __('Group Sales').": ".$totalGroupSale; ?></span>
                              <span class="user-joined"><?php echo __('Rank').": ".__($packageName); ?></span>
                            </div>
                          </div>
                        </div>
                        <?php
                        if ($hasChild) {
                        ?>
                        <div class=" ajax-more" id="node-wrapper-<?php echo $distinfo->getDistributorId();?>"></div>
                        <?php } ?>
                      </div>
                    </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
</td>
