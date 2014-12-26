<?php include('scripts.php'); ?>

<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Exchange Rate') ?></span></td>
</tr>
<tr>
    <td><br>
        <?php if ($sf_flash->has('successMsg')): ?>
        <div class="ui-widget">
            <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                 class="ui-state-highlight ui-corner-all">
                <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                         class="ui-icon ui-icon-info"></span>
                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($sf_flash->has('errorMsg')): ?>
        <div class="ui-widget">
            <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                 class="ui-state-error ui-corner-all">
                <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                         class="ui-icon ui-icon-alert"></span>
                    <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
            </div>
        </div>
        <?php endif; ?>

    </td>
</tr>
<tr>
    <td>
        <table class="pbl_table" cellpadding="3" cellspacing="3">
            <tbody>
            <tr class="pbl_header">
                <td><?php echo __('Country') ?></td>
                <td><?php echo __('Purchase') ?></td>
                <td><?php echo __('Withdraw') ?></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Australia Dollars" alt=""
                                                        src="/css/pages/flag/3.gif"><br>Australia Dollars
                </p></td>
                <td valign="top"><p align="center">1.10</p></td>
                <td valign="top"><p align="center">0.90</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Brunei Dollars" alt=""
                                                        src="/css/pages/flag/5.gif"><br>Brunei Dollars</p></td>
                <td valign="top"><p align="center">1.40</p></td>
                <td valign="top"><p align="center">1.18</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Cambodia" alt=""
                                                        src="/css/pages/flag/22.gif"><br>Cambodia</p></td>
                <td valign="top"><p align="center">4,400.00</p></td>
                <td valign="top"><p align="center">3,800.00</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="China Yuan" alt=""
                                                        src="/css/pages/flag/8.gif"><br>China Yuan

                </p></td>
                <td valign="top"><p align="center">7.00</p></td>
                <td valign="top"><p align="center">6.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Euro" alt=""
                                                        src="/css/pages/flag/2.gif"><br>Euro</p></td>
                <td valign="top"><p align="center">0.85</p></td>
                <td valign="top"><p align="center">0.75</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Hong Kong Dollars" alt=""
                                                        src="/css/pages/flag/9.gif"><br>Hong Kong Dollars

                </p></td>
                <td valign="top"><p align="center">8.35</p></td>
                <td valign="top"><p align="center">7.20</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="India Rupees" alt=""
                                                        src="/css/pages/flag/16.gif"><br>India Rupees
                </p></td>
                <td valign="top"><p align="center">58.00</p></td>
                <td valign="top"><p align="center">50.00</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Indonesia Rupiahs" alt=""
                                                        src="/css/pages/flag/19.gif"><br>Indonesia Rupiahs</p></td>
                <td valign="top"><p align="center">10,350.00</p></td>
                <td valign="top"><p align="center">8,750.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Japan Yen" alt=""
                                                        src="/css/pages/flag/17.gif"><br>Japan Yen</p></td>
                <td valign="top"><p align="center">88.00</p></td>
                <td valign="top"><p align="center">75.00</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Korea(South) Won" alt=""
                                                        src="/css/pages/flag/18.gif"><br>Korea(South) Won<br>
                </p></td>
                <td valign="top"><p align="center">1,225.00</p></td>
                <td valign="top"><p align="center">1,055.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Macau Patacas" alt=""
                                                        src="/css/pages/flag/10.gif"><br>Macau Patacas
                </p></td>
                <td valign="top"><p align="center">8.60</p></td>
                <td valign="top"><p align="center">7.40</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Malaysia Ringgit" alt=""
                                                        src="/css/pages/flag/7.gif"><br>Malaysia Ringgit

                </p></td>
                <td valign="top"><p align="center">3.40</p></td>
                <td valign="top"><p align="center">3.10</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="New Zealand Dollars" alt=""
                                                        src="/css/pages/flag/6.gif"><br>New Zealand Dollars</p></td>
                <td valign="top"><p align="center">1.40</p></td>
                <td valign="top"><p align="center">1.20</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Nigeria" alt=""
                                                        src="/css/pages/flag/23.gif"><br>Nigeria</p></td>
                <td valign="top"><p align="center">175.00</p></td>
                <td valign="top"><p align="center">150.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Philippines Pesos" alt=""
                                                        src="/css/pages/flag/15.gif"><br>Philippines Pesos</p></td>
                <td valign="top"><p align="center">45.00</p></td>
                <td valign="top"><p align="center">38.50</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Russia Rubles" alt=""
                                                        src="/css/pages/flag/12.gif"><br>Russia Rubles</p></td>
                <td valign="top"><p align="center">34.80</p></td>
                <td valign="top"><p align="center">30.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Singapore Dollars" alt=""
                                                        src="/css/pages/flag/4.gif"><br>Singapore Dollars</p></td>
                <td valign="top"><p align="center">1.40</p></td>
                <td valign="top"><p align="center">1.18</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="South Africa Rand" alt=""
                                                        src="/css/pages/flag/11.gif"><br>South Africa Rand</p></td>
                <td valign="top"><p align="center">8.70</p></td>
                <td valign="top"><p align="center">7.50</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Switzerland" alt=""
                                                        src="/css/pages/flag/25.gif"><br>Switzerland</p></td>
                <td valign="top"><p align="center">1.00</p></td>
                <td valign="top"><p align="center">0.90</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Taiwan New Dollars" alt=""
                                                        src="/css/pages/flag/13.gif"><br>Taiwan New Dollars</p></td>
                <td valign="top"><p align="center">32.00</p></td>
                <td valign="top"><p align="center">27.00</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Thailand Baht" alt=""
                                                        src="/css/pages/flag/14.gif"><br>Thailand Baht</p></td>
                <td valign="top"><p align="center">340</p></td>
                <td valign="top"><p align="center">310</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="Turkey" alt=""
                                                        src="/css/pages/flag/24.gif"><br>Turkey</p></td>
                <td valign="top"><p align="center">1.90</p></td>
                <td valign="top"><p align="center">1.60</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="United Kingdom Pounds" alt=""
                                                        src="/css/pages/flag/1.gif"><br>United Kingdom Pounds
                </p></td>
                <td valign="top" color="#28eb13"><p align="center">0.69</p></td>
                <td valign="top"><p align="center">0.59</p></td>
            </tr>
            <tr class="row1">
                <td valign="top"><p align="center"><img width="90" height="45" title="United State" alt=""
                                                        src="/css/pages/flag/21.gif"><br>United State Dollar
                </p></td>
                <td valign="top" color="#28eb13"><p align="center">1.08</p></td>
                <td valign="top"><p align="center">0.93</p></td>
            </tr>
            <tr class="row0">
                <td valign="top"><p align="center"><img width="90" height="45" title="Vietnam Dong" alt=""
                                                        src="/css/pages/flag/20.gif"><br>Vietnam Dong</p></td>
                <td valign="top"><p align="center">22,500.00</p></td>
                <td valign="top"><p align="center">19,400.00</p></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
</tbody>
</table>