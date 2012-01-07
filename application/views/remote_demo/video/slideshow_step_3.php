<?php

function base_server_url() {
    return "http://194.63.157.110/dev/company/";
}
?>

<script type="text/javascript" src="http://flvplayer.com/free-flv-player/flvplayer/swfobject/swfobject.js"></script>
<div id="embed_player">
<h1>Please Upgrade Your Flash Player</h1>
<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
</div>
<script type="text/javascript">
var flashvars = {
flvpFolderLocation: "http://flvplayer.com/free-flv-player/flvplayer/", 
flvpVideoSource: "<?php echo base_url().$flash_file;?>", 
flvpWidth: "640", 
flvpHeight: "375", 
flvpInitVolume: "50", 
flvpTurnOnCorners: "true", 
flvpBgColor: "FFFFFF"
};
var params = {
bgcolor: "FFFFFF", 
menu: "true", 
allowfullscreen: "true"
};
swfobject.embedSWF("http://flvplayer.com/free-flv-player/FlvPlayer.swf", "embed_player", "640", "375", "9.0.0", "http://flvplayer.com/free-flv-player/flvplayer/swfobject/expressInstall.swf", flashvars, params);
</script>
<br>
<a target="_blank" href="<?php echo base_url().$flash_file;?>">Download FLV file</a>