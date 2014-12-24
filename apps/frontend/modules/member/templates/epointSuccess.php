<td valign="top">
    <h2>EP Transfer</h2>

    <form name="theForm" method="post" action="./ep_transfer_files/ep_transfer.html">
        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th width="170px">Transfer From</th>
                <td>
                    <select name="transfer_from">
                        <option value="MT1 (2088510975)">MT1 (2088510975)</option>
                        <option value="MT2 (2088511257)">MT2 (2088511257)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th valign="top">Option</th>
                <td valign="top" style="padding-left:0px">
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                            <td valign="top"><input type="radio" name="option" value="Transfer To"
                                                    onclick="changeOption(&#39;Transfer&#39;)"></td>
                            <td valign="top" style="padding:0px">
                                <div style="padding:2px 0px 5px 0px">Transfer To</div>
                                <div>
                                    <select name="transfer_to" id="transfer"
                                            style="margin-bottom:5px; display:none; width:100px">
                                        <option value="MT1">MT1</option>
                                        <option value="MT2">MT2</option>
                                    </select>
                                </div>
                                <div class="fl"><input type="text" id="transfer_partner" name="transfer_partner"
                                                       value="" placeholder="Partner ID"
                                                       style="display:none; width:190px; margin-bottom:5px"
                                                       onchange="checkUser(&#39;transfer_icon&#39;, this.value)"></div>
                                <div class="fl check_icon" id="transfer_icon"></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><input type="radio" name="option" value="EP1"
                                                    onclick="changeOption(&#39;EP1&#39;)"></td>
                            <td valign="top" style="padding:0px">
                                <div style="padding:2px 0px 3px 0px">EP1</div>
                                                    <span id="EP1" style="display:none">
                                                        <div><input type="radio" name="ep" value="Self EP"
                                                                    onclick="showPartner(&#39;Self&#39;)"> Self EP1
                                                        </div>
                                                        <div><input type="radio" name="ep" value="Other"
                                                                    onclick="showPartner(&#39;Other&#39;)"> Other
                                                        </div>
                                                        <div class="fl" style="padding-left:30px; padding-top:5px">
                                                            <input type="text" name="ep1_partner" id="ep1_partner"
                                                                   value="" placeholder="Partner ID"
                                                                   style="display:none; width:165px"
                                                                   onchange="checkUser(&#39;ep1_icon&#39;, this.value)">
                                                        </div>
                                                        <div class="fl check_icon" id="ep1_icon"></div>
                                                    </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <th>Transfer Amount (USD)</th>
                <td><input type="text" name="amount" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right"><input type="submit" name="submit" value="Submit"></td>
            </tr>
            </tbody>
        </table>
    </form>
</td>
<td valign="top" align="right"><img src="./ep_transfer_files/pic_ep-transfer.jpg"></td>