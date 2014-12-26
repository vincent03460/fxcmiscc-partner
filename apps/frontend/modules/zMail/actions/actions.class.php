<?php

/**
 * zMail actions.
 *
 * @package    sf_sandbox
 * @subpackage zMail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class zMailActions extends sfActions
{
    public function executeIndex() {
        //$c = new Criteria();
        //$c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 146, Criteria::GREATER_THAN);
        //$distDBs = MlmDistributorPeer::doSelect($c);

        //foreach ($distDBs as $distDB) {


        $body = "<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#939393' align='center'>


	<tbody>
		<tr>
			<td style='padding:20px 0px'>
				<table width='606' cellspacing='0' cellpadding='0' border='0' align='center' style='background:white;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
						<tr>
							<td colspan='2'>
								<a href='http://www.fxcmiscc.com' target='_blank'><img width='606' height='115' border='0' src='http://partner.fxcmiscc.com/images/email/banner.png' alt='SIXSTAR'></a></td>
						</tr>

						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table style='background-color:rgb(246,246,246)'>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>
																<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
                                                                    Dear <strong>1111</strong>,<br><br>
                                                                    Congratulations! Your live trading account with SIXSTAR
                                                                    has been activated! Please find the details of your trading account as
                                                                    per below :<br><br>
                                                                    Live MT4 Trading Account ID : <strong></strong><br><br>
                                                                    Live MT4 Trading Account password : <strong></strong><br><br>
                                                                    The Login ID and Password is strictly confidential and should not be
                                                                    disclosed to anyone. Should someone with access to your password wish,
                                                                    all of your account information can be changed. You will be held
                                                                    liable for any activity that may occur as a result of you losing your
                                                                    password. Therefore, if you feel that your password has been
                                                                    compromised, you should immediately contact us by email to
                                                                    <strong><a href='mailto:cs@fxcmiscc.com' target='_blank'>cs@fxcmiscc.com</a></strong> to rectify the situation.<br><br>
                                                                    We look forward to your custom in the near future. Should you have any
                                                                    queries, please do not hesitate to get back to us.<br>
                                                                </font>
																<br>
																<br>
																<br>
																<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:17px'>
																Forex, spread bets and CFDs are leveraged products. They may not be suitable for you as they carry a high degree of risk to your capital and you can lose more than your initial investment. You should ensure you understand all of the risks.
																</font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='42'></td></tr>
									<tr>
										<td valign='top' width='551' colspan='2'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>


													<td style='font-size:0;line-height:0' width='85'>

													</td>

													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														<table width='100%' cellpadding='0' cellspacing='0' border='0'>
															<tbody><tr>
																<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform.gif' width='85' height='60'></td>
															</tr>
															<tr>
																<td style='text-align:center;line-height:15px' align='center'>
																	<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
																		<strong>SIXSTAR<br> MT4 Terminal</strong>
																	</font>
																</td>
															</tr>
															<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
															<tr>
																<td style='font-size:0;line-height:0'><a href='http://partner.fxcmiscc.com/download/demoMt4' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download.png' height='26' width='85' border='0'></a></td>



															</tr>
														</tbody></table>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table style='background-color:rgb(246,246,246)'>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>
																<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
												亲爱的 <strong>11111</strong>,<br><br>
												恭喜您！您的博马思交易户口已被激活！<wbr>以下是您的交易帐户的详细资料：
												<br><br>
												MT4交易户口登录ID : <strong></strong><br><br>
												MT4交易户口密码 : <strong></strong><br><br>
												登录ID和密码必须是严格保密及不应该向任何人透露。<wbr>如果有人盗用了您的密码，
                                                您的帐户资料是有机会被篡改。<wbr>您将必须承担任何可能发生的结果如果您遗失了你的密码。
                                                因此，如果您觉得您的密码不安全，您应该立即电邮联系我们
												<strong><a href='mailto:cs@fxcmiscc.com' target='_blank'>cs@fxcmiscc.com</a></strong>以纠正这种情况.<br><br>
												如果您有任何疑问，请不要犹豫立即联络我们。
												<br>
											</font>
											<br>
																<br>
																<br>
																<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:17px'>
																买外汇或者期货都是一种杠杆投资。他们可能不适合您，因为他们具有很高的风险，您可能会失去您最初的投资资金，所以您必须确保你了解所有的风险。
																</font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='42'></td></tr>
									<tr>
										<td valign='top' width='551' colspan='2'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>

													</td>
													<td style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>


													<td style='font-size:0;line-height:0' width='85'>

													</td>

													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														<table width='100%' cellpadding='0' cellspacing='0' border='0'>
															<tbody><tr>
																<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform.gif' width='85' height='60'></td>
															</tr>
															<tr>
																<td style='text-align:center;line-height:15px' align='center'>
																	<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
																		<strong>SIXSTAR<br> MT4 Terminal</strong>
																	</font>
																</td>
															</tr>
															<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
															<tr>
																<td style='font-size:0;line-height:0'><a href='http://partner.fxcmiscc.com/download/demoMt4' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download_cn.png' height='26' width='85' border='0'></a></td>



															</tr>
														</tbody></table>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>

						<tr>
							<td width='606' style='font-size:0;line-height:0' bgcolor='#0080C8'>
							<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='606' style='font-size:0;line-height:0' colspan='2'>
								<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'>
							</td>
						</tr>

						<tr>
							<td width='606' style='padding:15px 15px 0px;color:rgb(153,153,153);font-size:11px' colspan='2' align='right'>
							<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
								<em>
									Best Regards,<br>
									<strong>SIXSTAR</strong><br>
									E mail : <a href='mailto:admin@fxcmiscc.com' target='_blank'>admin@fxcmiscc.com</a>
								</em>
							</font>
							<br>
							<a href='http://fxcmiscc.com/' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/logo.png' width='254' height='87' border='0'></a>
							<br>
						</td></tr>

						<tr>
							<td width='606' style='padding:5px 15px 20px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<p align='justify'>
								<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
									SIXSTAR is managed by SIXSTAR Capital Limited which is authorised and regulated in the New Zealand by the Financial Services Provider. FSP Register number is 252705. Registered Office: Level 8, 10/12 Scotia Place, Suite 11, Auckland City Centre, Auckland, 1010, New Zealand. Tel <a href='tel:%28%2B64%29%2093791159' value='+6493791159' target='_blank'>(+64) 93791159</a>, Email <a href='mailto:cs@fxcmiscc.com' target='_blank'>cs@fxcmiscc.com</a>
									<br><br>SIXSTAR Capital Limited is a subsidiary of Royale Group Holding Inc. a public listed company in USA.
									<br><br>CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of SIXSTAR capital Limited, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
								</font>
							</p>
						</td></tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>";

        $subject = "Your live trading account with SIXSTAR has been activated 您的博马思交易户口已被激活";

        $sendMailService = new SendMailService();
        $sendMailService->sendMail("r9projecthost@gmail.com", "jason", $subject, $body);
        //}
    }
    public function executeIndex2()
    {
        $body = "<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#939393' align='center'>
	<tbody>
		<tr>
			<td style='padding:20px 0px'>
				<table width='800' cellspacing='0' cellpadding='0' border='0' align='center' style='background:white;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
						<tr>
							<td colspan='2'>
								<a target='_blank' href='http://www.fxcmiscc.com'><img width='800' height='115' border='0' src='http://partner.fxcmiscc.com/images/email/banner4.png' alt='SIXSTAR'></a></td>
						</tr>

						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table style='background-color:rgb(246,246,246)'>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>

<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:16px;line-height:26px'>
您想知道怎样才能睡着觉就赚钱吗？
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:18px;line-height:26px'>
您希望<span style='font-weight: bold; color:#ff0000'>每一分钟</span>都能赚取一万美元吗？
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
您希望拥有<span style='font-weight: bold; color:#ff0000'>奢华</span>的生活，让您能够<span style='font-weight: bold; color:#ff0000'>随时</span>都可以，<span style='font-weight: bold; color:#ff0000'>去梦想之地，做梦想之事？</span>
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:22px;line-height:26px'>
<span style='font-weight: bold; color:#ff0000'>如果对以上所有问题的答案都是“是的 ”，那么您就来对了地方，在正确的时间，做了正确的选择。</span>
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
接着往下看吧，接下来的2分钟能永远的改变您的生活！
																</font>
																<br>
																<br>
																<br>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style='padding:5px 15px 15px;font-weight:bold' colspan='2'>
								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								我们的基金经理们
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								今天我们骄傲的向您介绍一家帮助全世界15个国家的26000位客户成为百万富翁的公司，
								<br><br><span style='font-size:16px; font-weight: bold; color:#ff0000'>博马思金融集团交易商基金管理公司</span>
								<br><br>博马思金融集团交易商拥有了最顶级的，杰出学术背景和多年交易经验相结合的投资专家。各位专家都拥有广泛的高端银行，财经院校并且在交易上有一技之长，投资组合管理和风险分析经验等专业背景。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								此图表显示出近三年来我们的资金增长了%
								</font>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/fund_mgmt_graph.png' alt='SIXSTAR'>



								<br><br>
								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								如何开始？
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								仅需在我们管理的基金注册成为一位<span style='font-size:16px; font-weight: bold; color:#ff0000'>自助交易者或一位投资人</span>，就可以享受我们的<span style='font-size:16px; font-weight: bold; color:#ff0000'>经纪商推荐者计划</span>，这样您就可以通过介绍客户成为一位企业家了。
								</font>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_1.png' alt='SIXSTAR'>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_2.png' alt='SIXSTAR'>
								<br><br>
								<img border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_3.png' alt='SIXSTAR'>
								<br><br>


								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								我们的实力
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>博马思金融集团是Royale Group Holding Inc的下属企业</span>，
								是一家在美国上市的金融和投资信托基金公司，同时也受
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>新西兰金融服务提供商（FSP）</span>
								的监管.拥有遍及欧洲和很多像中国，香港，韩国等和东南亚众多新型经济体的金融交易服务商和市场研究机构。博马思金融集团是由一群经验丰富，热情服务的交易员，金融分析师和精算师构成的，他们的目标就是为行业提供最佳的交易解决方案。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								我们还与Premium Insured Limited有一份托管人协议，该保险公司是一家可以向全球提供托管人服务的领先的第三方托管管理公司。除此之外，该公司为博马思金融集团所有的客户设计了一份交易保险返利程序，这样就保证了客户资本处于极度保险状态。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>
								我们正试图寻找那些意气风发和具有团队精神的企业家们作为我们的经纪商介绍者（IB）和主经纪商介绍者(MIB)来加入我们的团队. 如果您是真的希望改变现有的生活，成为我们那26,000个百万富翁客户中的一员，我们非常欢迎您！我们每天都收到很多咨询，但不是每个人都能够成功入选的。我们只选择那些非常执着的追求梦想生活的人们。
								</span>
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:22px; font-weight: bold; color:#ff0000'>
								不要再浪费一分钟！现在加入我们！
								</span>
								</font>
								<br><br>
								<table width=100%>
								<tr><td align='center'>
								<a target='_blank' href='http://partner.fxcmiscc.com/home/memberRegistration'><img border='0' src='http://partner.fxcmiscc.com/images/email/file/register-button.png' alt='SIXSTAR'></a>
								</td></tr>
								</table>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:14px; font-weight: bold; color:#ff0000'>
								更详细的资料请联络我们
								</span>
								</font>
								<br><br>
								<!--<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:14px; font-weight: bold; color:#ff0000'>
								Alvin Ang
                                <br>洪志勇
                                <br>Skype: alvinang8833
                                <br>QQ: 1049052315
                                </span>
                                </font>-->
								<br><br>
								<br><br>
								<img border='0' src='http://partner.fxcmiscc.com/images/email/file/bottom-banner.png' width='770' alt='SIXSTAR'>
								<br><br>
							</td>
						</tr>

						<tr>
							<td width='800' style='font-size:0;line-height:0' bgcolor='#0080C8'>
							<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='800' style='font-size:0;line-height:0' colspan='2'>
								<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'>
							</td>
						</tr>

						<tr>
							<td width='800' style='padding:15px 15px 0px;color:rgb(153,153,153);font-size:11px' colspan='2' align='right'>
							<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
								<em>
									Best Regards,<br>
									<strong>SIXSTAR</strong>
								</em>
							</font>
							<br>
							<a href='http://fxcmiscc.com/' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/logo.png' width='254' height='87' border='0'></a>
							<br>
						</tr>

						<tr>
							<td width='800' style='padding:5px 15px 20px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<p align='justify'>
								<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
									SIXSTAR is managed by SIXSTAR Capital Limited which is authorised and regulated in the New Zealand by the Financial Services Provider. FSP Register number is 252705. Registered Office: Level 8, 10/12 Scotia Place, Suite 11, Auckland City Centre, Auckland, 1010, New Zealand. Tel (+64) 93791159, Email cs@fxcmiscc.com
									<br><br>SIXSTAR Capital Limited is a subsidiary of Royale Group Holding Inc. a public listed company in USA.
									<br><br>CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of SIXSTAR capital Limited, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
								</font>
							</p>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>";
        $subject = "博马思金融集团 - 通过世界上最强大的外汇交易平台之一跻身百万富翁！！ SIXSTAR welcome you to our participation in Shanghai Money Fair on 23-25 Nov 2012";

        $sendMailService = new SendMailService();
        $sendMailService->sendMail("r9projecthost@gmail.com", "alvin", $subject, $body);
    }

    public function executeIndex_version1()
    {
        $body = "<table width='600' align='center' cellpadding='0' cellspacing='0' border='0'>
            <tbody>
                <tr>
                    <td valign='top' colspan='3'>
                        <img src='http://partner.fxcmiscc.com/images/email/file/page-1-cn.png' width='580'>
                    </td>
                </tr>

                <tr>
                    <td valign='top' colspan='3'>
                        <img src='http://partner.fxcmiscc.com/images/email/file/page-2-cn.png' width='580'>
                    </td>
                </tr>

                <tr>
                    <td valign='top' colspan='3'>
                        <img src='http://partner.fxcmiscc.com/images/email/file/page-3-cn.png' width='580'>
                    </td>
                </tr>

                <tr>
                    <td valign='top' colspan='3'>
                        <img src='http://partner.fxcmiscc.com/images/email/file/page-4-cn.png' width='580'>
                    </td>
                </tr>
            </tbody>
        </table>";
        $subject = "SIXSTAR welcome you to our participation in Shanghai Money Fair on 23-25 Nov 2012 博马思金融集团 - 通过世界上最强大的外汇交易平台之一跻身百万富翁！！";
        $emailContact = EmailContactPeer::retrieveByPK(99);

        $sendMailService = new SendMailService();
        $sendMailService->sendMail("r9projecthost@gmail.com", $emailContact->getReceiverName(), $subject, $body);
    }

    public function executeSendBrochure()
    {
        $c = new Criteria();
        $c->add(EmailContactPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(EmailContactPeer::SEND_STATUS, "READY");
        $emailContacts = EmailContactPeer::doSelect($c);

        $idx = 0;
        foreach ($emailContacts as $emailContact) {
            $idx++;
            //if ($idx == 2)
            //    break;

            $nameArrs = explode("??", $emailContact->getReceiverName());
            $emailArrs = explode("@", $emailContact->getReceiverEmail());
            //print_r($emailContact->getReceiverName());
            //print_r("<br>");
            //print_r(count($nameArrs));
            //print_r("<br>");
            $receiverName = $emailArrs[0];
            //if (count($nameArrs) <  2) {
            //    $receiverName = $emailContact->getReceiverName();
            //}
            print_r($idx."=".$emailContact->getReceiverEmail()." ".$receiverName);
            print_r("<br>");

            $body = "<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#939393' align='center'>
	<tbody>
		<tr>
			<td style='padding:20px 0px'>
				<table width='800' cellspacing='0' cellpadding='0' border='0' align='center' style='background:white;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
						<tr>
							<td colspan='2'>
								<a target='_blank' href='http://www.fxcmiscc.com'><img width='800' height='115' border='0' src='http://partner.fxcmiscc.com/images/email/banner4.png' alt='SIXSTAR'></a></td>
						</tr>

						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table style='background-color:rgb(246,246,246)'>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>

<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:16px;line-height:26px'>
您想知道怎样才能睡着觉就赚钱吗？
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:18px;line-height:26px'>
您希望<span style='font-weight: bold; color:#ff0000'>每一分钟</span>都能赚取一万美元吗？
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
您希望拥有<span style='font-weight: bold; color:#ff0000'>奢华</span>的生活，让您能够<span style='font-weight: bold; color:#ff0000'>随时</span>都可以，<span style='font-weight: bold; color:#ff0000'>去梦想之地，做梦想之事？</span>
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:22px;line-height:26px'>
<span style='font-weight: bold; color:#ff0000'>如果对以上所有问题的答案都是“是的 ”，那么您就来对了地方，在正确的时间，做了正确的选择。</span>
</font>
<br><br>
<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
接着往下看吧，接下来的2分钟能永远的改变您的生活！
																</font>
																<br>
																<br>
																<br>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style='padding:5px 15px 15px;font-weight:bold' colspan='2'>
								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								我们的基金经理们
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								今天我们骄傲的向您介绍一家帮助全世界15个国家的26000位客户成为百万富翁的公司，
								<br><br><span style='font-size:16px; font-weight: bold; color:#ff0000'>博马思金融集团交易商基金管理公司</span>
								<br><br>博马思金融集团交易商拥有了最顶级的，杰出学术背景和多年交易经验相结合的投资专家。各位专家都拥有广泛的高端银行，财经院校并且在交易上有一技之长，投资组合管理和风险分析经验等专业背景。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								此图表显示出近三年来我们的资金增长了%
								</font>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/fund_mgmt_graph.png' alt='SIXSTAR'>



								<br><br>
								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								如何开始？
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								仅需在我们管理的基金注册成为一位<span style='font-size:16px; font-weight: bold; color:#ff0000'>自助交易者或一位投资人</span>，就可以享受我们的<span style='font-size:16px; font-weight: bold; color:#ff0000'>经纪商推荐者计划</span>，这样您就可以通过介绍客户成为一位企业家了。
								</font>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_1.png' alt='SIXSTAR'>
								<br><br>
								<img width='770' border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_2.png' alt='SIXSTAR'>
								<br><br>
								<img border='0' src='http://partner.fxcmiscc.com/images/email/file/FXCMISCC_plan_3.png' alt='SIXSTAR'>
								<br><br>


								<font face='Microsoft YaHei' size='3' color='#163f68' style='font-size:20px;line-height:26px'>
								我们的实力
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>博马思金融集团是Royale Group Holding Inc的下属企业</span>，
								是一家在美国上市的金融和投资信托基金公司，同时也受
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>新西兰金融服务提供商（FSP）</span>
								的监管.拥有遍及欧洲和很多像中国，香港，韩国等和东南亚众多新型经济体的金融交易服务商和市场研究机构。博马思金融集团是由一群经验丰富，热情服务的交易员，金融分析师和精算师构成的，他们的目标就是为行业提供最佳的交易解决方案。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								我们还与Premium Insured Limited有一份托管人协议，该保险公司是一家可以向全球提供托管人服务的领先的第三方托管管理公司。除此之外，该公司为博马思金融集团所有的客户设计了一份交易保险返利程序，这样就保证了客户资本处于极度保险状态。
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:16px; font-weight: bold; color:#ff0000'>
								我们正试图寻找那些意气风发和具有团队精神的企业家们作为我们的经纪商介绍者（IB）和主经纪商介绍者(MIB)来加入我们的团队. 如果您是真的希望改变现有的生活，成为我们那26,000个百万富翁客户中的一员，我们非常欢迎您！我们每天都收到很多咨询，但不是每个人都能够成功入选的。我们只选择那些非常执着的追求梦想生活的人们。
								</span>
								</font>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:22px; font-weight: bold; color:#ff0000'>
								不要再浪费一分钟！现在加入我们！
								</span>
								</font>
								<br><br>
								<table width=100%>
								<tr><td align='center'>
								<a target='_blank' href='http://partner.fxcmiscc.com/home/memberRegistration'><img border='0' src='http://partner.fxcmiscc.com/images/email/file/register-button.png' alt='SIXSTAR'></a>
								</td></tr>
								</table>
								<br><br>
								<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:14px; font-weight: bold; color:#ff0000'>
								更详细的资料请联络我们
								</span>
								</font>
								<br><br>
								<!--<font face='Microsoft YaHei' size='3' color='#040404' style='font-size:14px;line-height:26px'>
								<span style='font-size:14px; font-weight: bold; color:#ff0000'>
								Alvin Ang
                                <br>洪志勇
                                <br>Skype: alvinang8833
                                <br>QQ: 1049052315
                                </span>
                                </font>-->
								<br><br>
								<br><br>
								<img border='0' src='http://partner.fxcmiscc.com/images/email/file/bottom-banner.png' width='770' alt='SIXSTAR'>
								<br><br>
							</td>
						</tr>

						<tr>
							<td width='800' style='font-size:0;line-height:0' bgcolor='#0080C8'>
							<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='800' style='font-size:0;line-height:0' colspan='2'>
								<img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'>
							</td>
						</tr>

						<tr>
							<td width='800' style='padding:15px 15px 0px;color:rgb(153,153,153);font-size:11px' colspan='2' align='right'>
							<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
								<em>
									Best Regards,<br>
									<strong>SIXSTAR</strong>
								</em>
							</font>
							<br>
							<a href='http://fxcmiscc.com/' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/logo.png' width='254' height='87' border='0'></a>
							<br>
						</tr>

						<tr>
							<td width='800' style='padding:5px 15px 20px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<p align='justify'>
								<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
									SIXSTAR is managed by SIXSTAR Capital Limited which is authorised and regulated in the New Zealand by the Financial Services Provider. FSP Register number is 252705. Registered Office: Level 8, 10/12 Scotia Place, Suite 11, Auckland City Centre, Auckland, 1010, New Zealand. Tel (+64) 93791159, Email cs@fxcmiscc.com
									<br><br>SIXSTAR Capital Limited is a subsidiary of Royale Group Holding Inc. a public listed company in USA.
									<br><br>CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of SIXSTAR capital Limited, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
								</font>
							</p>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>";
            $subject = "SIXSTAR welcome you to our participation in Shanghai Money Fair on 23-25 Nov 2012 博马思金融集团 - 通过世界上最强大的外汇交易平台之一跻身百万富翁！！";
            $subject = "博马思金融集团 - 通过世界上最强大的外汇交易平台之一跻身百万富翁！！ SIXSTAR welcome you to our participation in Shanghai Money Fair on 23-25 Nov 2012";

            $sendMailService = new SendMailService();
            $sendMailService->sendMail($emailContact->getReceiverEmail(), $receiverName, $subject, $body, Mails::EMAIL_SENDER_INFO);

            $emailContact->setSendStatus("SEND");
            $emailContact->save();
        }
    }

    public function executeIndex3()
    {
        $subject = $this->getContext()->getI18N()->__("SIXSTAR Accounts Team", null, 'email');
        $text_body = "Dear " . "<tester full name>" . ",
            <p>
            <p>
            Congratulations! Your live trading account with SIXSTAR
            has been activated! Please find the details of your trading account as
            per below :
            <p>
            <p>
            Live MT4 Trading Account ID : <mt4 account id><p>
            Live MT4 Trading Account password : <mt4 password><p>
            <p>
            <p>
            The Login ID and Password is strictly confidential and should not be
            disclosed to anyone. Should someone with access to your password wish,
            all of your account information can be changed. You will be held
            liable for any activity that may occur as a result of you losing your
            password. Therefore, if you feel that your password has been
            compromised, you should immediately contact us by email to
            cs@fxcmiscc.com to rectify the situation.<p>
            We look forward to your custom in the near future. Should you have any
            queries, please do not hesitate to get back to us.
            <p>
            --
            <p>
            Best Regards,
            <p>
            SIXSTAR
            <p>
            E mail : admin@fxcmiscc.com";

        $body = "<table width='800' align='center' cellpadding='0' cellspacing='0' border='0'>
			<tbody><tr>
				<td valign='top' colspan='3'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr>
							<td style='font-size:0;line-height:0' width='201' valign='top'><img src='http://partner.fxcmiscc.com/images/email/bg-top.png' width='201' height='226'></td>
							<td valign='top' width='551'>
								<table width='100%' cellpadding='0' cellspacing='0' border='0'>
									<tbody><tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='71'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td valign='top' style='line-height:17px'>
											<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
												Dear <strong>Jason</strong>,<br><br>
                                                Your Demo account will enable you to \"paper trade\", while allowing you to develop and test your trading strategies on the award-winning MetaTrader 4.
                                                <br><br>Your account has been opened for you with the following details:
                                                <br><br>To start trading please download and install MT4.

                                                亲爱的<STRONG>杰森</strong>，<br><br>
                                                你的模拟帐户将使你可以进行“纸上贸易”，使用MetaTrader 4可以允许你开发和测试您的交易策略。
                                                <br><br>如想立刻体验交易，请下载并安装MT4。
											</font>

											<br>
											<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:17px'>
											买外汇或者期货都是一种杠杆投资。他们可能不适合您，因为他们具有很高的风险，您可能会失去您最初的投资资金，所以您必须确保你了解所有的风险。
											</font>
										</td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='42'></td></tr>
									<tr>
										<td valign='top' width='551' colspan='2'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														
													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														
													</td>
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														
													</td>
													<td style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>
													
													
													<td style='font-size:0;line-height:0' width='85'>
														<table width='100%' cellpadding='0' cellspacing='0' border='0'>
															<tbody><tr>
																<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform.gif' width='85' height='60'></td>
															</tr>
															<tr>
																<td style='text-align:center;line-height:15px' align='center'>
																	<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
																		<strong>SIXSTAR<br> MT4 Terminal</strong>
																	</font>
																</td>
															</tr>
															<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
															<tr>
																<td style='font-size:0;line-height:0'><a href='http://partner.fxcmiscc.com/download/demoMt4' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download.png' height='26' width='85' border='0'></a></td>
															</tr>
														</tbody></table>
													</td>
													
													<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
													<td style='font-size:0;line-height:0' width='85'>
														<table width='100%' cellpadding='0' cellspacing='0' border='0'>
															<tbody><tr>
																<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform.gif' width='85' height='60'></td>
															</tr>
															<tr>
																<td style='text-align:center;line-height:15px' align='center'>
																	<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
																		<strong>My<br> Account</strong>
																	</font>
																</td>
															</tr>
															<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
															<tr>
																<td style='font-size:0;line-height:0'><a href='http://partner.fxcmiscc.com' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-access.png' height='26' width='85' border='0'></a></td>
															</tr>
														</tbody></table>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='32'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td style='font-size:0;line-height:0' bgcolor='#0080C8'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='1'></td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
									<tr>
										<td valign='top' style='line-height:15px;text-align:right' colspan='2' align='right'>
											<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
												<em>
													Best Regards,<br>
													<strong>SIXSTAR Capital Limited</strong><br>
													E mail : admin@fxcmiscc.com
												</em>
											</font>
										</td>
									</tr>
								</tbody></table>
							</td>
							<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='48' height='1'></td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td style='font-size:0;line-height:0' width='63'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='63' height='1'></td>
				<td valign='top' width='689'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='28'></td></tr>
						<tr>
							<td align='right' style='text-align:right;font-size:0;line-height:0'>
								<a href='http://fxcmiscc.com/' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/logo.png' width='254' height='87' border='0'></a>

								<br>
								<p align='justify'>
									<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
											SIXSTAR is managed by SIXSTAR Capital Limited which is authorised and regulated in the New Zealand by the Financial Services Provider. FSP Register number is 252705. Registered Office: Level 8, 10/12 Scotia Place, Suite 11, Auckland City Centre, Auckland, 1010, New Zealand. Tel (+64) 93791159
											<br><br>SIXSTAR Capital Limited is a subsidiary of Royale Group Holding Inc. a public listed company in USA.
<br><br>CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of SIXSTAR capital Limited, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
									</font>
								</p>
							</td>
						</tr>
						<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='16'></td></tr>
					</tbody></table>
				</td>
				<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='48' height='1'></td>
			</tr>
			<tr><td colspan='3' style='font-size:0;line-height:0' bgcolor='#0080C8'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='34'></td></tr>
		</tbody></table>";

        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        $mail = new PHPMailer();

        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = Mails::EMAIL_SENDER;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = Mails::EMAIL_SENDER;
        }

        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet="utf-8";

        //$text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress("r9projecthost@gmail.com", "tester");

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }

        //$sendMailService = new SendMailService();
        //$sendMailService->testSendMail();
        /* ********* */
        /*error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        var_dump("0");
        $mail = new PHPMailer();
        var_dump("1");
        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = Mails::EMAIL_SENDER;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = Mails::EMAIL_SENDER;
        }
        var_dump("2");

        $mail->Host = Mails::EMAIL_HOST;
        $mail->From = Mails::EMAIL_FROM;
        $mail->FromName = Mails::EMAIL_FROM_NAME;

        var_dump("3");
        $mail->Subject = "Test Send Email Globals";
        $mail->CharSet="utf-8";

        $body = "Dear tester,<p><p>

        <p>Your Testing has been successfully</p>

        <p>Thank you</p>";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress(Mails::EMAIL_TEST_MAIL, "test");
        $mail->AddBCC(Mails::EMAIL_BCC, Mails::EMAIL_BCC_NAME);

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        } else {
            var_dump("done");
        }*/
    }
}
