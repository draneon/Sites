<h3><?php echo T_('Bookmarklet'); ?></h3>
<p id="bookmarklet"></p>
<script type="text/javascript">
//<![CDATA[
var browser = navigator.appName;
jQuery(function($) {
if (browser == "Opera") {
    $('#bookmarklet').append(
        <?php echo json_encode(
            sprintf(
                T_("Click one of the following bookmarklets to add a button you can click whenever you want to add the page you are on to %s") . ':',
                $GLOBALS['sitename']
            )
        ); ?>
    );
} else {
    $('#bookmarklet').append(
        <?php echo json_encode(
            sprintf(
                T_("Drag one of the following bookmarklets to your browser's bookmarks and click it whenever you want to add the page you are on to %s") . ':',
                $GLOBALS['sitename']
            )
        );
        ?>
    );
}
});
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
var selection = '';
if (window.getSelection) {
    selection = 'window.getSelection()';
} else if (document.getSelection) {
    selection = 'document.getSelection()';
} else if (document.selection) {
    selection = 'document.selection.createRange().text';
}
if (browser == "Opera") {
    $('#bookmarklet').append(
        '<ul>'
        + '<li>'
        + '<a class="bookmarklet" href="'
        + '<?php
$popupLink = 'javascript:'
    . "location.href='"
        . createURL('bookmarks', $GLOBALS['user'])
        . '?action=add'
        . "&address='+encodeURIComponent(document.location.href)+'"
        . "&title='+encodeURIComponent(document.title)+'"
        . "&description='+encodeURIComponent(SELECTION)"
        . ";";
$link = 'opera:/button/'
    //Opera command
    . 'Go to page'
    //command parameter 1
    . ',"' . rawurlencode($popupLink) . '"'
    //command parameter 2
    . ','
    //button title
    . ',"Post to ' . fixOperaButtonName($GLOBALS['sitename']) . '"'
    //button icon name
    . ',"Scuttle"';
echo jsEscTitle(htmlspecialchars($link));
?>'.replace('SELECTION', selection)
        + '"><?php echo jsEscTitle(sprintf(T_('Post to %s'), $GLOBALS['sitename'])); ?></a>'
        + '</li>'
        + '<li>'
        + '<a class="bookmarklet" href="'
        + '<?php
$popupLink = 'javascript:'
    . 'open('
        . "'" . createURL('bookmarks', $GLOBALS['user'])
        . '?action=add'
        . '&popup=1'
        . "&address='+encodeURIComponent(document.location.href)+'"
        . "&title='+encodeURIComponent(document.title)+'"
        . "&description='+encodeURIComponent(SELECTION)"
        . ","
        . "'" . htmlspecialchars(jsEscTitle($GLOBALS['sitename'])) . "',"
        . "'modal=1,status=0,scrollbars=1,toolbar=0,resizable=1,width=790,height=465"
        . ",left='+(screen.width-790)/2+',top='+(screen.height-425)/2"
    . ");void 0";
$link = 'opera:/button/'
    . 'Go to page'
    . ',"' . rawurlencode($popupLink) . '"'
    . ','
    . ',"Post to ' . fixOperaButtonName($GLOBALS['sitename']) . ' (Pop-up)"'
    . ',"Scuttle"';
echo jsEscTitle(htmlspecialchars($link));
?>'.replace('SELECTION', selection)
        + '"><?php echo jsEscTitle(sprintf(T_('Post to %s (Pop-up)'), $GLOBALS['sitename'])); ?></a>'
        + '</li>'
        + '</ul>'
    );
} else {
    $('#bookmarklet').append(
        '<ul>'
        + '<li><a class="bookmarklet" href="javascript:x=document;a=encodeURIComponent(x.location.href);t=encodeURIComponent(x.title);d=encodeURIComponent('+selection+');location.href=\'<?php echo createURL('bookmarks', $GLOBALS['user']); ?>?action=add&amp;address=\'+a+\'&amp;title=\'+t+\'&amp;description=\'+d;void 0;"><?php echo jsEscTitle(sprintf(T_('Post to %s'), $GLOBALS['sitename'])); ?><\/a><\/li>'
        + '<li>'
        + '<a class="bookmarklet" href="'
        + 'javascript:x=document;'
        + 'a=encodeURIComponent(x.location.href);'
        + 't=encodeURIComponent(x.title);'
        + 'd=encodeURIComponent('+selection+');'
        + 'open('
        + '\'<?php echo createURL('bookmarks', $GLOBALS['user']); ?>?action=add&amp;popup=1&amp;address=\'+a+\'&amp;title=\'+t+\'&amp;description=\'+d,\'<?php echo htmlspecialchars(jsEscTitleDouble($GLOBALS['sitename'])); ?>\',\'modal=1,status=0,scrollbars=1,toolbar=0,resizable=1,width=790,height=465,left=\'+(screen.width-790)/2+\',top=\'+(screen.height-425)/2'
        + ');void 0;">'
        + '<?php echo jsEscTitle(sprintf(T_('Post to %s (Pop-up)'), $GLOBALS['sitename'])); ?>'
        + '</a>'
        + '</li>'
        + '</ul>'
    );
}
//]]>
</script>
