<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init_wysiwyg.js"></script>

<style>
    .content-category {
        height: 550px;
        margin-left: 30px;
        width: 727px;
    }

    body {
        background: none;
        color:#253459;
    }

    .head-category {
        font: bold 12px/1.9 verdana;
        padding-bottom: 30px;
        margin-left: 30px;
    }

    .create {
        background-image: url("<?php echo base_url(); ?>images/create.png");
        background-repeat: no-repeat;
        height: 22px;
        margin-top: 15px;
        width: 107px;
        border: medium none;
    }

    .create:hover {
        background-image: url("<?php echo base_url(); ?>images/create.png");
        background-repeat: no-repeat;
        background-position: 0 -22px;
    }
</style>


<?php if ($pdf) { ?>

    <div class="head-category">
        You can download PDF file generated from that HTML text 
    </div>
    <div class="content-category">
        <a href="<?php echo base_url() . $pdf; ?>"><img src="<?php echo base_url(); ?>stuff/pdf.jpeg"></a>
        <br>
        <a class="try" href="<?php echo base_url(); ?>remote_demo/html_to_pdf"> </a>
    </div>
<?php } else { ?>
    <div class="head-category">
        Please enter a piece of text into wysiwyg editor.<br>
        That text will be converted into PDF document.
    </div>
    <div id="demo_div" class="content-category">
        <p style="float:left">
        <form action="<?php echo base_url(); ?>remote_demo/html_to_pdf" method="POST">
            <input type="hidden" name="handler" value="create_pdf">
            <textarea id="html_edit" name="html_edit"><?php echo $this->load->view("demos/html_to_pdf/sample_html"); ?></textarea>
            <input class="create" type="submit" value=""/>
        </form>
    </p>
    </div>
<?php } ?>
