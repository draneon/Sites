<?php
/**
 * Bookmark thumbnail image
 * Shows the website thumbnail for the bookmark.
 *
 * Expects a $row variable with bookmark data.
 */
if (!$GLOBALS['enableWebsiteThumbnails']) {
    return;
}

$thumbnailHash = md5(
    $address . $GLOBALS['thumbnailsUserId'] . $GLOBALS['thumbnailsKey']
);
//echo '<a href="'. $address .'"'. $rel .' ><img class="thumbnail" src="http://www.artviper.net/screenshots/screener.php?url='.$address.'&w=120&sdx=1280&userID='.$GLOBALS['thumbnailsUserId'].'&hash='.$thumbnailHash.'" />';
echo '<img class="thumbnail" onclick="window.location.href=\''.$address.'\'" src="http://www.artviper.net/screenshots/screener.php?url='.$address.'&w=120&sdx=1280&userID='.$GLOBALS['thumbnailsUserId'].'&hash='.$thumbnailHash.'" />';

?>