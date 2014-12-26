<?php include('scripts.php'); ?>



<div id="wrap">

    <div id="mainContent">

        <div id="content_1">
            <?php /*getFeed("http://feeds.reuters.com/reuters/businessNews"); */?>
        </div>
        <!--end content 1-->

    </div>
    <!--end main content -->

</div><!--end wrap-->

<div id="feedBody">
    <div id="feedTitle">
        <a id="feedTitleLink" title="Go to Reuters News" href="http://www.reuters.com">
            <img id="feedTitleImage" src="http://www.reuters.com/resources_v2/images/reuters125.png"/>
        </a>

        <div id="feedTitleContainer">
            <h1 id="feedTitleText" style="margin-right: 135px;"><?php echo __('Reuters: Business News') ?></h1>

            <h2 id="feedSubtitleText">Reuters.com is your source for breaking news, business, financial and investing
                news, including personal finance and stocks. Reuters is the leading global provider of news, financial
                information and technology solutions to the world's media, financial institutions, businesses and
                individuals.</h2>
        </div>
    </div>
    <div id="feedContent">
<?php
    $feed_url = "http://feeds.reuters.com/reuters/businessNews";
    $content = file_get_contents($feed_url);

    $x = new SimpleXmlElement($content);

    echo "<ul>";

    foreach($x->channel->item as $entry) {
?>
<div class="entry">
<h3>
    <a href="<?php echo $entry->link; ?>"><?php echo $entry->title; ?></a>

    <div class="lastUpdated"><?php echo $entry->pubDate; ?></div>
</h3>
<div base="<?php echo $entry->link; ?>" class="feedEntryContent"><?php echo $entry->description; ?></div>
</div>
<div style="clear: both;"></div>

<?php
        }
?>
    </div>
</div>
