<?php $this->load->view("header");?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style2.css" media="all" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript">
	 
            $(document).ready(function(){
              $('#form-send').submit(function() {
                $("#tmp-div").val(document.getElementById("tbldevs").innerHTML);
              });
            });
	</script>
<?php $this->load->view("demos/design_image/init_js");?>


<div id="bodyPan">

</div>

<div id="bodyMiddlePan">
    <div id="demo_logo">
        <a href="<?php echo base_url()."demos";?>">
            <h2>Live <br>Demos</h2>
        </a>
    </div>
    
    <div id="demo_div">
        <h4>Design your image</h4>
        
            <?php if(isset($thumbnail)){ ?>
            <h4>
                You can see image which was generated according to your desing
            </h4>
            <img src="<?php echo base_url().$thumbnail;?>">
            <br>
            <a href="<?php echo base_url();?>demos/design_image">try again</a>
            <?php }else{ ?>
        
            <div id="wrapper">
                    <div id="options">
                            <div id="drag1" class="drag"></div> <!-- end of drag1 -->
                            <div id="drag2" class="drag"></div> <!-- end of drag2 -->
                            <div id="drag3" class="drag"></div> <!-- end of drag3 -->
                            <div id="drag4" class="drag"></div> <!-- end of drag4 -->

                            <div id="drag5" class="drag"></div> <!-- end of drag5 -->
                            <div id="drag6" class="drag"></div> <!-- end of drag6 -->
                            <div class="drag-text"></div>
                    </div><!-- end of options -->
                    <div id="frame">
                            <span id="title"><h2></h2></span>
                            <div id="div-for-get">
                            <div id="tbldevs" border="1">
                                    <div id="tbldevs_in">

                                    </div>
                            </div>
                            </div>

                    </div><!-- end of frame -->
            </div><!-- end of wrapper -->
            <form id="form-send" method="POST" action="<?php echo base_url();?>demos/design_image">
                <input type="hidden" name="handler" value="preview">
                <input id="tmp-div" name="tmp-div" type="hidden" val="">
            <input type="submit" value="Create Image">

            </form>
            
            <?php } ?>
      </div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
