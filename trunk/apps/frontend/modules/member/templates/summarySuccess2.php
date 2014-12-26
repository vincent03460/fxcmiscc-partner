<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    $(function($) {
        $('#dgAnnouncement').modal('show');

        $(".pager_button").click(function(event){
            event.preventDefault();
            var pager = $(this).attr("ref");

            $(".page_content").hide(500);
            $("#page_" + pager).show(500);
        });
    }); // end function
</script>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Account Summary"); ?>
            <small></small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Membership Summary"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <form class="form-horizontal label-left" method="post"
                      action="#"
                      data-validate="parsley"
                      id="topupForm" name="topupForm">
                <fieldset>
                    <legend class="section">
                    <?php echo __("Membership Summary")?>
                    </legend>
                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="control-group">
                                <label class="control-label" for="memberId">
                                <?php echo __("Member ID")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="memberId" name="memberId" class="form-control" value="<?php echo $distributor->getDistributorCode();?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ranking">
                                <?php echo __("Package Rank")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="ranking" name="ranking" class="form-control" value="<?php echo $ranking;?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mt4Ranking">
                                <?php echo __("MT4 Rank")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="mt4Ranking" name="mt4Ranking" class="form-control" value="<?php echo $mt4Ranking;?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="status">
                                <?php echo __("Status")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="status" name="status" class="form-control" value="<?php echo $distributor->getStatusCode();?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lastLogin">
                                <?php echo __("Last Login")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="lastLogin" name="lastLogin" value="<?php echo $lastLogin;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </section>
    </div>
    <div class="col-md-5">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("MT4 List"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <form class="form-horizontal label-left" method="post"
                      action="#"
                      data-validate="parsley"
                      id="topupForm2" name="topupForm2">
                <fieldset>
                    <legend class="section">
                    <?php echo __("MT4 List")?>
                    </legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th align="center"><?php echo __('MT4 ID') ?></th>
                                    <th align="center"><?php echo __('Initial Password') ?></th>
                                    <th align="center"><?php echo __('Ranking') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (count($distMt4s) > 0) {
                                        $idx = 1;
                                        foreach ($distMt4s as $distMt4) {
                                            $packageDB = MlmPackagePeer::retrieveByPK($distMt4->getRankId());
                                            if ($packageDB) {
                                                $color = "";
                                                if ($packageDB->getColor() == "red") {
                                                    $color = "important";
                                                } else if ($packageDB->getColor() == "gold") {
                                                    $color = "warning";
                                                } else if ($packageDB->getColor() == "green") {
                                                    $color = "success";
                                                } else if ($packageDB->getColor() == "blue") {
                                                    $color = "info";
                                                } else if ($packageDB->getColor() == "white") {
                                                    $color = "primary";
                                                } else if ($packageDB->getColor() == "pink") {
                                                    $color = "warning";
                                                }
                                                echo "<tr>
                                                    <td align='center'>" . $idx++ . "</td>
                                                    <td align='center'>" . $distMt4->getMt4Username() . "</td>
                                                    <td align='center'>" . $distMt4->getMt4Password() . "</td>
                                                    <td align='center'><span class='label label-".$color."'>" . $packageDB->getPackageName() . "</span></td>
                                                </tr>";
                                            }
                                        }
                                    } else {
                                        echo "<tr class='odd' align='center'><td colspan='4'>" . __('No data available in table') . "</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Account Summary"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <form class="form-horizontal label-left" method="post"
                      action="#"
                      data-validate="parsley"
                      id="topupForm3" name="topupForm3">
                <fieldset>
                    <legend class="section">
                    <?php echo __("Account Summary")?>
                    </legend>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="control-group">
                                <label class="control-label" for="memberId">
                                <?php echo __("Networks")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="networks" name="networks" value="<?php echo $totalNetworks ?>" class="form-control">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="status">
                                <?php echo __("e-Point Account")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="epoint" name="epoint" value="<?php echo number_format($epoint, 2)?>" class="form-control">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lastLogin">
                                <?php echo __("e-Wallet Account")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="ecash" name="ecash" value="<?php echo number_format($ecash, 2);?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </section>
    </div>
</div>

<div id="dgAnnouncement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2"><strong><?php echo __('Announcement') ?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row margin-bottom text-align-center">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="1">
                                1
                            </button>
                            <button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="2">
                                2
                            </button>
                            <button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="3">
                                3
                            </button>
                            <button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="4">
                                4
                            </button>
                            <!--<button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="5">
                                5
                            </button>-->
                        </div>
                    </div>
                </div>
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Important Notices !</h4>

                    <p>In order to reduce the workload of our financial department after the data migration, we have to cancel all withdrawals, and need you to submit the application again.
                    <p>We have taken this action because of our financial department is difficult to do validation from the old data.
                    <p>We sincerely apologize if causes you any inconvenience.
                    <p><br></p>
                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_2" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Important Notices !</h4>
                    <ol style="list-style-type: decimal; padding-left: 30px;">
                        <li>All transaction under lot size below 0.01 have been auto cancelled by system</li>
                        <li>Please accept our sincere apology if you facing some failure when you trade yesterday, this is due to data patch to the server.</li>
                    </ol>

                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Important Notices !</h4>
                    <p>Pips income (18th Oct - 31st Oct) has been paid.
                    <p>Next month onward, Pips income will be paid on 1st - 3th of the month.
                    <p><br></p>
                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Great News!</h4>
                    <p>We are pleased to announce that our server bandwidth has been upgraded to <strong>100% secured with dedicated network speed 100Mbps!</strong></p>
                    <p>Feel the speed & Enjoy trading!</p>
                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Important Notice!</h4>
                    <p>We notice that there are some Unusual transactions from the currency "USDMXN" transactions. We stop all transactions and temporary disable "USDMXN".</p>
                    <p><br></p>
                    <p>Please note that our team is verifying every single transaction and we need to double check whether there is any element of internal trading balance.  We are doing this because we have noticed some unusual activities with some accounts.</p>
                    <p><br></p>
                    <p>We are sorry for the inconvenience and your understanding & patience means a lot to us.</p>
                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Important Notice!</h4>
                    <h5>28 December 2013</h5>
                    <p>Yesterday we experienced some technical problems that resulted in some transactions automatically closed during (GMT+8) 28 December 2013 01:40 - 02:00.</p>
                    <p><br></p>
                    <p>If you were affected, please send the transaction order number to our technical support (<strong>support@grandegoldens.com</strong>) before (GMT+8) 30 December 2013 00:00. Our technical team will revert the order settings accordingly. Please feel free to contact me or a member of my team directly on the e-mail above if you have any further concerns.</p>
                    <p><br></p>
                    <p>From
                    <br>The managements</p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">Market Opening Times</h4>
                    <h5>30 December 2013</h5>
                    <p>Dear Members,</p>
                    <p>Market will be CLOSED at 22:00 (GMT + 8 hours) Tuesday 31st December, and will be OPEN at 22:05 (GMT + 8 hours) 1st Jan 2014.</p>
                    <p>The team at Grandegoldens  wish you a Happy Holiday Season and a Prosperous New Year.</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>-->
                <!--<div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">IMPORTANT ANNOUNCEMENT!!! End of new year promotion</h4>
                    <h5>28 January 2014</h5>
                    <br>Dear Members,
                    <br>To kick off 2014 on a positive note, we are pleased to announce on the <strong>promotion of extra free credit 10% for purchase MINI Account, extra free credit 15% for purchase STANDARD Account will be end on 31 Jan 2014 23:59 (GMT+8)</strong>.
                    <p><br>Note: credit is NON-WITHDRAWABLE.</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>-->
                <div id="page_1" class="page_content">
                    <h4 style="font-weight: bold;">IMPORTANT ANNOUNCEMENT!!!</h4>
                    <h5>17 March 2014</h5>
                    <p>Dear Singapore & Malaysia's customer,</p>
                    <p>We are pleased to announce that our server has been set up successfully with 100Mbps bandwidth in AIMS.</p>
                    <p>Please use <strong>trade.grandegoldens.com:8090</strong> as the host name to connect our new server, please DO NOT use IP 222.239.78.6:8090, this IP no longer applicable.</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <div id="page_2" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Pray for MH370</h4>
                    <h5>11 March 2014</h5>
                    <p>Our hearts go all out to the MH370 passengers, crew members, their families and friends.<p>

                    <p>Let us pray and hope for the best while hearing updates from the authorities on the search and rescue mission.<p>

                    <p>在等待官方消息的同時，請爲MH370航班的所有乘客，飛行員及擔心他們的家人朋友深深祈禱。無論情況如何，大家都請堅強面對。加油！</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <div id="page_3" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Set up a Dedicated Server + 100Mbps bandwidth in AIMS for Singapore & Malaysia's customer</h4>
                    <h5>9 March 2014</h5>
                    <p>Dear Singapore & Malaysia's customer,</p>
                    <p>Start :9 March 2014 00:00 GMT+8
                    <br>End :10 March 2014 04:00 GMT+8
                    <p>Maintenance details :

                    <br>We are going to carry out an urgent maintenance to set up a Dedicated Server + 100Mbps bandwidth in AIMS to resolve connection problems.</p>

                    <p>Maintenance Effect :
                    <br>During the maintenance period, MT4 and http://webtrader.grandegoldens.com and http://trade.grandegoldens.com is inaccessible. This will not affect any user's setting and trading data.</p>
                    <p>We are especially grateful to all users continue to support us. Thank you</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <div id="page_4" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">IMPORTANT ANNOUNCEMENT!!!</h4>
                    <h5>10 February 2014</h5>
                    <br>Dear Members,
                    <br><br>Withdrawal request must be done during the <strong>(i)first 7 days of each month (Payout will be by the 15th of each month)</strong>.
                    <br><br>or <br><br><strong>(ii)16th - 20th of each month (Payout will be by the 30th of each month).</strong>.
                    <br><br>Effective from <strong>1st March 2014. Thank you</strong>.
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <!--<div id="page_2" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Scheduled Server Maintenance</h4>
                    <h5>10 January 2014</h5>
                    <p>Dear Valued Clients,</p>
                    <p>Date :12 January 2014
                        <br>Start : 00:00 GMT+8
                        <br>End : 23:59 GMT+8</p>

                    <p>Maintenance details :

                    <br>We are going to carry out an urgent maintenance to apply patches to server's operating system</p>

                    <p>Maintenance Effect :
                    <br>During the maintenance period, MT4 and http://webtrader.grandegoldens.com is inaccessible. This will not affect any user's setting and trading data.</p>
                    <p>Best Regards,
                    <br>Support Team</p>
                </div>-->
                <!--<div id="page_3" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Good news!</h4>
                    <h5>7 January 2014</h5>
                    <p>Since we received a lot of complaints from our Asian members, especially from Malaysia and Singapore, they has trouble from time to time to connect to our servers. Therefore, our management has decided to set up a server in Singapore to resolve connection problems. </p>
                    <p>We are especially grateful to all users continue to support us. Thank you</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <div id="page_4" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Breaking news!</h4>
                    <h5>3 January 2014</h5>
                    <p>We are pleased to announce on the <strong>new year promotion (1 Jan 2014 00:00 to 31 Jan 2014 23:59 GMT+8)</strong> of <strong>extra free 10% for purchase MINI Account, extra free 15% for purchase STANDARD Account.</strong></p>
                    <p>Note: credit is NON-WITHDRAWABLE.</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>
                <div id="page_5" class="page_content" style="display: none">
                    <h4 style="font-weight: bold;">Breaking news!</h4>
                    <h5>1 January 2014</h5>
                    <p>To provide you with better services, the company plans to <strong>upgrade MT4 to PT3</strong>. This schedule upgrade will take place in January. We will be announce the exact date when we confirm the date for system upgrade.</p>
                    <p>Once again, Thank you to all our investors and partners who have helped us and this will spur us towards greater achievements in the coming year.</p>
                    <p>From
                    <br>Grandegoldens </p>
                </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>