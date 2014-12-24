<?php
use_helper('I18N');
$culture = $sf_user->getCulture();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8"/>

    <title><?php echo __("FX-CMISC") ?></title>

    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" type="text/css" media="all" href="/css/style.css"/>
    <link rel='stylesheet' type='text/css' media='all' id='contact-form-7-css' href='/css/stylesdeae.css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,300,300italic' rel='stylesheet' type='text/css'/>

    <script type='text/javascript' src="/js/jquery/jquery-1.11.1.min.js"></script>
    <script type='text/javascript' src='/js/l10na17a.js'></script>
    <script type='text/javascript' src='/js/comment-replya6d7.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery51a2.js'></script>

    <style type="text/css">
        #wpadminbar #adminbarsearch {
            display: none;
        }
    </style>

    <meta name="google-translate-customization" content="48db38ec63f47a6-3d05752acd1480bf-g8b55c39d81ce653d-10"></meta>

</head>

<body class="home page page-id-5 page-template page-template-page-home-php">
<div id="wrapper" class="hfeed">
    <div class="top_header">
        <div class="left"></div>
        <div class="right">

            <ul class="social right">
                <li><a title="Follow us on fb" class="social-icon fb" href="#"></a></li>
                <li><a title="Follow us on twitter" class="social-icon twitter" href="#"></a></li>
            </ul>

            <div id="google_translate_element" class="right"></div>

            <div class="tagline right">
                <?php echo __("Rule No.1: Never lose money. Rule No.2: Never forget rule No.1") ?><span class="author"> ~ Warren Buffett</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <header id="header">
        <div id="header-inner">
            <div id="logo"><a href="index.html" class="logo"><img src="/images/logo.png"></a></div>

            <div id="access" role="navigation">
                <div class="skip-link screen-reader-text"><a href="#content" title="Skip to content"><?php echo __("Skip to content") ?></a></div>
                <?php include_component('component', 'submenu', array("module" => $sf_context->getModuleName(), "action" => $sf_context->getActionName())) ?>
                <div class="clear"></div>
            </div>
            <!-- #access -->
            <div class="clear"></div>
        </div>
    </header><!-- #header -->

    <div id="main">
        <div id="container">
            <div id="content" role="main">
                <?php echo $sf_data->getRaw('sf_content') ?>
            </div>
        </div>
    </div><!-- #footer -->

    <footer id="footer">
        <div class="row" id="footer-inner">
            <div class="one-third first   widget widget_text" id="text-2">
                <h4 class="widget-title"><?php echo __("About FX-CMISC") ?></h4>

                <div class="textwidget"><?php echo __("FX-CMISC offers a one-stop service to traders and investors with different trading backgrounds and objectives to gain access to the foreign exchange market.") ?></div>
            </div>
            <div class="one-third  widget corpo_recent_posts_widget" id="corpo_recent_posts_widget-2">
                <div class="widget recent-posts">
                    <h4 class="widget-title"><?php echo __("News") ?></h4>
                    <ul>

                        <div id="first" class="widget-area">
                            <ul class="xoxo">
                                <li id="rss-4" class="widget-container widget_rss"><h3 class="widget-title"><a class='rsswidget' href='http://www.dailyfx.com/feeds/forex_market_news' title='Syndicate this content'><img style='border:0' width='14' height='14' src='/images/rss.png' alt='RSS'/></a> <a class='rsswidget' href='http://www.dailyfx.com//feeds/forex_market_news?fmt=rss_2.0' title='Forex Market News'>DailyFX &#8211; Forex Market News</a></h3>
                                    <ul>
                                        <li><a class='rsswidget' href='http://www.dailyfx.com/forex/fundamental/daily_briefing/daily_pieces/commodities/2014/12/16/Crude-Remains-At-Risk-On-US-Inventories-Gold-Braces-For-FOMC-Decision.html?DFXfeeds=forex:fundamental:daily_briefing:daily_pieces:commodities' title='Crude oil may remain under pressure if upcoming US Inventories Data feeds supply glut concerns, while gold faces significant volatility on the back of the Fed decision. [&hellip;]'>Crude Remains At Risk On US Inventories, Gold Braces For FOMC Decision</a></li>
                                        <li><a class='rsswidget' href='http://www.dailyfx.com/forex/fundamental/us_dollar_index/daily_dollar/2014/12/16/GBP-USD-Threatens-Range-Retains-Bullish-Momentum-Despite-Soft-UK-CPI.html?DFXfeeds=forex:fundamental:us_dollar_index:daily_dollar' title='GBP/USD may continue to threaten the range-bound price action carried over from the previous month as the bullish RSI momentum gathers pace. [&hellip;]'>GBP/USD Threatens Range, Retains Bullish Momentum Despite Soft UK CPI</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- #first .widget-area -->
                    </ul>
                </div>
            </div>
            <div class="one-third last   widget corpo_contact_widget" id="corpo_contact_widget-3">
                <div class="widget contact">
                    <h4 class="widget-title"><?php echo __("Contact") ?></h4>
                    <ul>
                        <li>
                            <b><?php echo __("UK") ?>:</b> <?php echo __("Level 40 25 Canada Square London E14 5LQF") ?>
                        </li>
                        <li>
                            <b><?php echo __("HK") ?>:</b> <?php echo __("Room 15A, 15/F Hillier Commercial Centre 65-67 Bonham Strand East Sheung Wan Hong Kong") ?>
                        </li>
                        <li>
                            <b><?php echo __("Email") ?>:</b> <a href="#">support@fxcmiscc.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <p style="padding-bottom:20px;"><?php echo __("Risk Warning: Trading foreign exchange carries a high level of risk and may not be suitable for all investors. Leverage creates additional risk and loss exposure. Before you decide to trade foreign exchange, carefully consider your investment objectives, experience level, and risk tolerance. You could lose some or all of your initial investment; do not invest money that you cannot afford to lose. Educate yourself on the risks associated with foreign exchange trading, and seek advice from an independent financial or tax advisor if you have any questions.") ?></p>

    <div class="footer_last">
        <div class="bank_logo left">
            <strong><?php echo __("We Accept") ?></strong><br/>
            <img src="/images/banklogo.png"/>
        </div>

        <div class="right" style="margin-top:24px;">
            <?php echo __("Copyright © 2011 - 2014 FX-CMISC All Rights Reserved.") ?>
        </div>

        <div class="clear"></div>
    </div>

</body>
</html>
