<?php $this->load->view("header");?>
<link href="<?php echo base_url();?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>

<div id="bodyPan">

</div>

<div id="bodyMiddlePan">
    <div id="demo_logo">
        <a href="<?php echo base_url()."demos";?>">
            <h2>Live <br>Demos</h2>
        </a>
    </div>
    
    <div id="demo_div">
        <h4>Create PDF preview</h4>

        <?php if($preview){ ?>
        <p>
            You can see first 3 pdf pages converted to images<br>
            <?php foreach($preview as $item){ ?>
                <a href="<?php echo base_url()."tmp/".$item;?>" rel="prettyPhoto" title="PDF page preview">
                    <img src="<?php echo base_url()."tmp/th_".$item;?>">
                </a>
            <?php } ?>
                <br>
            <a href="<?php echo base_url();?>demos/pdf_to_image">try again</a>
        </p>
        <?php }else{ ?>

        <p>
            Please upload any PDF document to create pages previews<br>
            My script will fetch 1st 3 pages.
        </p>

        <p style="float:left">
            <form action="<?php echo base_url();?>demos/pdf_to_image" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="handler" value="upload_pdf">
                <input type="file" name="pdf_file">
                <input type="submit" value="Create PDF preview">
            </form>
        </p>
        <?php } ?>

</div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
