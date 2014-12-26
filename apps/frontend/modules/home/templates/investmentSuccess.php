<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html style="display: block;">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
    <meta http-equiv="CACHE-CONTROL" content="NO-STORE">
    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <meta http-equiv="EXPIRES" content="-1">
    <link rel="shortcut icon" href="/favicon.ico"/>

    <?php use_helper('I18N') ?>
    <?php include('scripts.php'); ?>

    <link rel='stylesheet' id='nivocss-css'  href='/css/pages/nivo-slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='styler-farbtastic-css'  href='/css/pages/styler-farbtastic.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-paginate-css'  href='/css/pages/wp-paginate.css' type='text/css' media='screen' />

    <script type='text/javascript' src='/css/pages/comment-reply.js'></script>
    <script type='text/javascript' src='/css/pages/preloader.js'></script>
    <script type='text/javascript' src='/css/pages/jquery.nivo.slider.js'></script>
    <script type='text/javascript' src='/css/pages/bottomfix.js'></script>
    <script type='text/javascript' src='/css/pages/jquery.quicksand.js'></script>
    <script type='text/javascript' src='/css/pages/farbtastic.js'></script>

    <meta http-equiv="Content-Language" content="en-US">
    <style type="text/css" media="screen">
    .qtrans_flag span { display:none }
    .qtrans_flag { height:12px; width:18px; display:block }
    .qtrans_flag_and_text { padding-left:20px }
    </style>
    <link rel="stylesheet" type="text/css" media="all" href="/css/pages/style.css">

	<script type="text/javascript">
	$(function() {
        /*$('BODY').bgStretcher({
            images: ['/images/background/main-bg-031.jpg', '/images/background/main-bg-041.jpg','/images/background/main-bg-011.jpg', '/images/background/main-bg-022.jpg'],
            imageWidth: 1024,
            imageHeight: 768,
            slideDirection: 'N',
            nextSlideDelay: 5500,
            transitionEffect: 'fade',
            anchoring: 'left center',
            anchoringImg: 'left center'
        });*/
	});
	</script>
</head>

<body class="home blog"> 
<noscript>
	<!-- display message if java is turned off -->	
	<div id="notification">Please turn on javascript in your browser for the maximum user experience!</div>	
</noscript>

<div id="wrapper">
    <div style="display: inline; width: 666px; overflow: hidden; margin-right: 0px;" id="page">
        <div id="content">
            <?php include_component('component', 'multiLanguage', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
            <div style=" width:450; float:left;"><h1><?php echo __('Fund Management') ?></h1></div>

            <div class="qtrans_widget_end"></div>
            <div class="hr"></div>
            <div style="clear:both;"></div>
            <p><img width="582" height="184" class="aligncenter size-full wp-image-162" title="Investment" alt=""
                    src="/css/pages/banner/banner-08.jpg"></p>

            <div style="clear:both;"></div>
            <!--<h2>Alternative Strategies</h2>-->

            <p align="justify"><strong><?php echo __('Fund Management Strategies') ?></strong> <?php echo __('are becoming an increasingly popular way of accessing the forex market for retail investors, who have neither the time nor expertise to trade their own account. An investment in a managed forex account provides investors with the ability to profit from the currency market, having their account managed by a professional money manager, whilst at the same time having complete access to their fund, 24 hours a day.') ?></p>

            <p align="justify"><?php echo __('SIXSTAR have sought to structure an investment which addresses all the challenges which investors face today. The SIXSTAR fund management provides investors with a low risk investment, competitive charges, aims to make absolute, positive returns irrespective of market conditions, offers immediate access to capital, safety of their investment, with added capital protection. The managed forex account is managed to very strict investment criteria, with risk management a priority, so that drawdowns and losses are minimised, and returns maximised.') ?></p>

            <h2><?php echo __('Alternative Strategies') ?></h2>

            <p align="justify"><?php echo __('The universe of fund management can be complex and are often misunderstood. Among the most common is the employment of alternative investment strategies.') ?></p>

            <p align="justify"><?php echo __('However, not all alternative strategies are the same and each has unique characteristics that may result in out-performance or under-performance in various market conditions.') ?></p>

            <p align="justify"><?php echo __('SIXSTAR employs a combination of strategies that take advantage of the price movements of related and correlated underlying to maximize profit potentials. To enhance profitability, we develop and incorporate highly complex high-speed frequency algorithmic trading computer modeling in our daily trading  modeling.') ?></p>

            <h2><?php echo __('Alternative Strategies Architecture') ?></h2>

            <p><img width="582" class="aligncenter size-full wp-image-162" title="Alternative Strategies Architecture" alt=""
                                src="/css/pages/banner/bg4.png"></p>
            <div style="clear:both;"></div>

            <h2><?php echo __('Tactical Trading') ?></h2>

            <p><img width="582" class="aligncenter size-full wp-image-162" title="Tactical Trading" alt=""
                                src="/css/pages/banner/bg7.png"></p>
            <div style="clear:both;"></div>

            <p align="justify"><strong><?php echo __('Tactical trading strategies generally speculate on the direction of price action of commodities, equities , bonds precious metals and currencies.')?></strong> <?php echo __('Often managers will combine long and/or short positions with each strategy to maximize returns.') ?></p>

            <p align="justify"><?php echo __('Top-down approach focusing on global macroeconomic shifts in which outright and derivative positions are taken.') ?></p>

            <p align="justify"><?php echo __('Among the myriad of financial instruments that SIXSTAR trades in are the') ?><strong><?php echo __('global currency markets')?></strong> <?php echo __('and')?> <strong><?php echo __('cash market for gold.') ?></strong></p>

            <p align="justify"><?php echo __('These two markets are some of most liquid and volatile in recent years owing to the global financial crisis and it is for this very reason why these instruments are chosen. Using our in-house expertise, trading models are developed and vigorously tested and incorporated into our tactical trading strategies.') ?></p>



            <h2><?php echo __('Managed Trading') ?></h2>

            <p style="text-align:center"><img height="300px" class="aligncenter size-full wp-image-162" title="Managed Trading" alt=""
                                src="/css/pages/banner/bg6.png"></p>
            <div style="clear:both;"></div>

            <h2><?php echo __('Implementing Alternatives') ?></h2>

            <p align="justify"><?php echo __('By investing in SIXSTAR alternative strategies, investors may achieve additional risk mitigation and potential return enhancement in today’s volatile markets.') ?></p>

            <p align="justify"><?php echo __('At SIXSTAR , we believe an alternative investments’ portfolio should provide exposure to both hedged strategies and private investments as a compliment to a traditional long-only portfolio like equities.') ?></p>

            <h2><?php echo __('Fund Structure') ?></h2>

            <p><img  height="220px" class="aligncenter size-full wp-image-162" title="Fund Structure" alt=""
                                src="/css/pages/banner/bg5.png"></p>
            <div style="clear:both;"></div>

            <?php include_component('component', 'footerInformation', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
        </div>
    </div>


    <div style="margin-left: 0px;" id="sidebar">
        <div id="sidebar-color"></div>
        <div id="sidebar-border"></div>
        <div id="sidebar-light"></div>
        <div id="sidebar-texture"></div>

        <div id="sidebar-content">

            <div id="logo"><a href="<?php echo url_for("/home")?>"><img src="/images/logo.png"></a></div>
            <div id="menu">
                <?php include_component('component', 'homeLeftMenu', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
            </div>
            <div id="primary" class="widget-area" role="complementary">
                <ul class="xoxo">
                </ul>
            </div>
            <!-- #primary .widget-area -->
        </div>

        <div id="sidebar-bottom">
            <ul></ul>
            <p style="text-align: center;">© 2012 - 2015 fxcmiscc.com <br> All rights reserved.</p>
        </div>
    </div>
</div>

</body>
</html>