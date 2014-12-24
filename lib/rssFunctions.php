<?php

function getFeed($feed_url) {
	
	$content = file_get_contents($feed_url);
	
	$x = new SimpleXmlElement($content);
	
	echo "<ul>";
	
	foreach($x->channel->item as $entry) {
        var_dump($entry);
		echo "
		<li>
		  <a href='$entry->link' title='$entry->title'>" . $entry->title . "</a>
		</li>";
		}
	echo "</ul>";
}
?>