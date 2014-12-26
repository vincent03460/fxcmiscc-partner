	<form class="well form-horizontal" id="purchase" action="/paymentGateway/order" method="post">
		<div class="alert alert-block alert-error" id="purchase_es_"
			style="display: none">
			<p>请更正下列输入错误:</p>
			<ul>
				<li>dummy</li>
			</ul>
		</div>
		<p class="note">
			<span class="required">*</span>为必填项
		</p>

		<fieldset>
			<div class="control-group accout_info all_a"
				style="margin-bottom: 20px;">填写账户信息</div>
			<div class="control-group ">
				<label class="control-label required" for="Customer_law_name">
					客户姓名
					<span class="required">*</span>
				</label>
				<div class="controls">
					<input class="input-xlarge" name="Order[customer_name]"	id="Order_customer_name" maxlength="64" type="text">
					<span class="help-inline error" id="Order_customer_name_" style="display: none"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="Order_id_type">证件类型
					<span class="required">*</span>
				</label>
				<div class="controls">
					<select name="Order[id_type]" id="Order_id_type">
						<option value="0">--请选择--</option>
						<option value="1" selected="selected">身份证</option>
						<option value="2">护照</option>
						<option value="3">通行证</option>
						<option value="4">军官证</option>
					</select><span class="help-inline error" id="Order_id_type_em_"	style="display: none"></span>
				</div>
			</div>
			<div class="control-group ">
				<label class="control-label required" for="Order_idno">证件号码
					<span class="required">*</span>
				</label>
				<div class="controls">
					<input class="input-xlarge" name="Order[id_no]" id="Order_id_no" maxlength="255" type="text">
						<span class="help-inline error" id="Order_id_no_em_" style="display: none"></span>
				</div>
			</div>
			<div class="control-group ">
				<label class="control-label" for="Order_email">E-mail</label>
				<div class="controls">
					<input class="input-xlarge" name="Order[email]"	id="Order_email" type="text">
						<span class="help-inline error" id="Order_email_em_" style="display: none"></span>
				</div>
			</div>
            <div class="control-group ">
                <label class="control-label" for="Order_commodityName">商品名稱</label>
                <div class="controls">
                    <input class="input-xlarge" name="Order[commodityName]"	id="Order_commodityName" type="text">
                    <span class="help-inline error" id="Order_commodityName_em_" style="display: none"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="Order_commodityUrl">商品URL</label>
                <div class="controls">
                    <input class="input-xlarge" name="Order[commodityUrl]"	id="Order_commodityUrl" type="text">
                    <span class="help-inline error" id="Order_commodityUrl_em_" style="display: none"></span>
                </div>
            </div>

			<div class="control-group ">
				<label class="control-label required" for="Order_commodityUnitPrice">商品單價
					<span class="required">*</span>
				</label>
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on"><?php echo $config['mer_currency'];?>
						</span><input append=".00" name="Order[commodityUnitPrice]" id="Order_commodityUnitPrice"
							type="text"><span class="add-on">.00</span>
					</div>
					<span class="help-inline error" id="Order_commodityUnitPrice_em_"
						style="display: none"></span>
				</div>
			</div>
            <div class="control-group ">
                <label class="control-label" for="Order_commodityQuantity">商品數量</label>
                <div class="controls">
                    <input class="input-xlarge" name="Order[commodityQuantity]"	id="Order_commodityQuantity" type="text">
                    <span class="help-inline error" id="Order_commodityQuantity_em_" style="display: none"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label required" for="Order_transferFee">運輸費用
                    <span class="required">*</span>
                </label>
                <div class="controls">
                    <div class="input-prepend input-append">
						<span class="add-on"><?php echo $config['mer_currency'];?>
						</span><input append=".00" name="Order[transferFee]" id="Order_transferFee"
                                      type="text"><span class="add-on">.00</span>
                    </div>
					<span class="help-inline error" id="Order_transferFee_em_"
                          style="display: none"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="Order_commodityDiscount">優惠資訊</label>
                <div class="controls">
                    <input class="input-xlarge" name="Order[commodityDiscount]"	id="Order_commodityDiscount" type="text">
                    <span class="help-inline error" id="Order_commodityDiscount_em_" style="display: none"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label required" for="Order_orderAmount">交易金額
                    <span class="required">*</span>
                </label>
                <div class="controls">
                    <div class="input-prepend input-append">
						<span class="add-on"><?php echo $config['mer_currency'];?>
						</span><input append=".00" name="Order[orderAmount]" id="Order_orderAmount"
                                      type="text"><span class="add-on">.00</span>
                    </div>
					<span class="help-inline error" id="Order_orderAmount_em_"
                          style="display: none"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="Order_cutomerCardNumber">持卡人卡號</label>
                <div class="controls">
                    <input class="input-xlarge" name="Order[cutomerCardNumber]"	id="Order_cutomerCardNumber" type="text">
                    <span class="help-inline error" id="Order_cutomerCardNumber_em_" style="display: none"></span>
                </div>
            </div>
			<div class="control-group ">
				<label class="control-label" for="Order_remark">附言</label>
				<div class="controls">
					<textarea class="input-xlarge" style="resize: none;" rows="5"
						name="Order[remark]" id="Order_remark"></textarea>
					<span class="help-inline error" id="Order_remark_em_" style="display: none"></span>
				</div>
			</div>
			<div class="alert alert-block">
				<a class="close" data-dismiss="alert" href="#">×</a>
				<h4 class="alert-heading">提示</h4>
				<dd>如对支付有任何问题,请直接相关的例句我们的客服联系.</dd>
				<dd>客户在完成付款后,可将含有交易编号的页面列印(如没有印表机的本公司亦接受抓图的电子档案),之后再寄交或电邮(cs@demo.com)本公司,以便加快处理贵客户的付款.</dd>

			</div>
			<div class="control-group ">
				<div class="controls">
					<label class="checkbox" for="Order_term">
						<input id="ytOrder_term" value="0" name="Order[term]" type="hidden">
						<input name="Order[term]" id="Order_term" value="1" type="checkbox">
						我已阅读并同意接受<a href="javascript:void(0);">免责声明</a>
						<span class="help-inline error" id="Order_term_em_" style="display: none"></span>
					</label>
				</div>
			</div>
			<input name="ctype" value="0" type="hidden">
			<div class="form-actions">
				<button class="btn btn-primary" type="submit" name="yt0">
					<i class="icon-shopping-cart icon-white"></i> 生成订单
				</button>
				<button class="btn" type="reset" name="yt1">
					<i class="icon-refresh"></i> 重新输入
				</button>
			</div>
		</fieldset>
	</form>
	<!-- form -->