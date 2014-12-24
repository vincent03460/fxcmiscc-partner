<td valign="top">
    <h2>Registration</h2>

    <form name="theForm" method="post" action="./registration_files/registration.html">
        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th width="150px">Partner ID</th>
                <td><input type="text" name="username" value="" onchange="checkUser(&#39;partner_id&#39;, this.value)">

                    <div class="check_icon" id="partner_id"></div>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value=""></td>
            </tr>
            <tr>
                <th>Sponsor by</th>
                <td><input type="text" name="sponsor" value=""></td>
            </tr>
            <tr>
                <th valign="top" class="pt10">Package</th>
                <td valign="top" style="padding-left:0px">
                    <table cellpadding="3" cellspacing="0">
                        <tbody>
                        <tr>
                            <td><input type="radio" name="package" value="1"> Consultant</td>
                            <td><select name="package_option1" style="width:100px">
                                <option value="">-- Select --</option>
                                <option value="$1000">$1000</option>
                                <option value="$2000">$2000</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="package" value="2"> Senior Consultant</td>
                            <td><select name="package_option2" style="width:100px">
                                <option value="">-- Select --</option>
                                <option value="$3000">$3000</option>
                                <option value="$4000">$4000</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="package" value="3"> Manager</td>
                            <td><select name="package_option3" style="width:100px">
                                <option value="">-- Select --</option>
                                <option value="$5000">$5000</option>
                                <option value="$6000">$6000</option>
                                <option value="$7000">$7000</option>
                                <option value="$8000">$8000</option>
                                <option value="$9000">$9000</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="package" value="4"> Senior Manager</td>
                            <td><select name="package_option4" style="width:100px">
                                <option value="">-- Select --</option>
                                <option value="$10,000">$10,000</option>
                            </select></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right"><input type="submit" name="submit" value="Submit"></td>
            </tr>
            </tbody>
        </table>
    </form>
</td>
<td valign="top" align="right"><img src="./registration_files/pic_registration.jpg"></td>