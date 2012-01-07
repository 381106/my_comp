<?php

function base_server_url() {
    return "http://194.63.157.110/dev/company/";
}
?>

<!doctype html>
<html>
  <head>
    <title>JW Player Demo - LongTail Video</title>
  <!--	<meta name="viewport" content="width=device-width" />-->
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/jwdemo.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="http://player.longtailvideo.com/jwplayer.js"></script>
  </head>
  <body>

    <div id="mediaplayer">JW Player goes here</div>

    <script type="text/javascript" src="<?php echo base_server_url()."stuff/mediaplayer-5.8-viral/";?>jwplayer.js"></script>
    <script type="text/javascript">
            jwplayer("mediaplayer").setup({
                    flashplayer: "<?php echo base_server_url()."stuff/mediaplayer-5.8-viral/";?>player.swf",
                    file: "<?php echo $flash_file;?>",
                    image: "<?php echo base_server_url()."stuff/mediaplayer-5.8-viral/";?>preview.jpg"
            });
    </script>
  </body>
</html>