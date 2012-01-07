
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simpletip-1.3.1.min.js"></script>
<style type="text/css">
    #slider { margin: 10px; }
</style>

<script type="text/javascript">
         
    $(document).ready(function() {
        // Setup the ajax indicator
        $('body').append('<div id="ajaxBusy"><p><img src="/images/loading.gif"></p></div>');

        $('#ajaxBusy').css({
            display:"none",
            margin:"0px",
            paddingLeft:"0px",
            paddingRight:"0px",
            paddingTop:"0px",
            paddingBottom:"0px",
            position:"absolute",
            right:"3px",
            top:"3px",
            width:"auto"
        });
    });
        
    $(document).ajaxStart(function(){
        $('#ajaxBusy').show();
    }).ajaxStop(function(){
        $('#ajaxBusy').hide();
    });
    //Init sliders        
    $(document).ready(function() {
            
                
        $("#blur_howto").simpletip({ fixed: true, position: 'top',
            content: "A small radius limits any effect of the blur to pixels that are within that many pixels of the one being blurred (a square radius).<br>As such using a very small radius such as '1' effectively limited the bluring to within the immediate neighours of each pixel.<br>Note that while sigma is a floating point, radius is not. If a floating point value is given (or internally calculated) it is rounded up to the nearest integer, to determine the 'neighbourhood' of the blur. "
        });
        $("#sharpen_howto").simpletip({ fixed: true, position: 'top',
            content: "Sharpening is a the computer graphics algorithm that is most often see on TV shows and movies. Picture the police force 'cleaning up' a 'zoomed in' photo of a licence plate of a bank robbers car, or the face of a man on a fuzzy shop camera video"
        });
                
        $("#noise_howto").simpletip({ fixed: true, position: 'top',
            content: "The central idea of the algorithm is to replace a pixel with its next neighbor in value within a pixel window, if this pixel has been found to be noise."
        });
        //$("#slider_filter_light").css("margin","10px");
        $("#slider_filter_light").slider({ 
            animate: true,max: 100, min:0, step:5,value: 0,
            slide: function( event, ui ) {
                $( "#slider_filter_light_amount" ).val(ui.value );
                $( "#filter_light_value" ).val(ui.value );
            },
            stop: function(event, ui){
                $.post('<?php echo base_url(); ?>demos/image_manipulations', $("#filter_light_form").serialize(),function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.status){
                        $("#filter_light_image").attr("src","<?php echo base_url(); ?>tmp/"+obj.data);
                    }
                });
            }
        });
        //$("#slider_filter_blur_radius").css("margin","10px");
        $("#slider_filter_blur_radius").slider({ 
            animate: true,max: 10, min:0, step:1,value: 0,
            slide: function( event, ui ) {
                $( "#slider_filter_blur_radius_amount" ).val(ui.value );
                $( "#filter_blur_value_radius" ).val(ui.value );
            },
            stop: function(event, ui){
                $.post('<?php echo base_url(); ?>demos/image_manipulations', $("#filter_blur_form").serialize(),function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.status){
                        $("#filter_blur_image").attr("src","<?php echo base_url(); ?>tmp/"+obj.data);
                    }
                });
            }
        });
        //$("#slider_filter_blur_sigma").css("margin","10px");
        $("#slider_filter_blur_sigma").slider({ 
            animate: true,max: 100, min:0, step:1,value: 0,
            slide: function( event, ui ) {
                $( "#slider_filter_blur_sigma_amount" ).val(ui.value/10);
                $( "#filter_blur_value_sigma" ).val(ui.value/10);
            },
            stop: function(event, ui){
                $.post('<?php echo base_url(); ?>demos/image_manipulations', $("#filter_blur_form").serialize(),function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.status){
                        $("#filter_blur_image").attr("src","<?php echo base_url(); ?>tmp/"+obj.data);
                    }
                });
            }
        });
                
        //$("#slider_filter_sharpen_radius").css("margin","10px");
        $("#slider_filter_sharpen_radius").slider({ 
            animate: true,max: 100, min:0, step:1,value: 0,
            slide: function( event, ui ) {
                $( "#slider_filter_sharpen_radius_amount" ).val(ui.value/10);
                $( "#filter_sharpen_value_radius" ).val(ui.value/10);
            },
            stop: function(event, ui){
                $.post('<?php echo base_url(); ?>demos/image_manipulations', $("#filter_sharpen_form").serialize(),function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.status){
                        $("#filter_sharpen_image").attr("src","<?php echo base_url(); ?>tmp/"+obj.data);
                    }
                });
            }
        });
                
        //$("#slider_scale_image").css("margin","10px");
        //$("#slider_filter_light").css("width","100");
        $("#slider_filter_blur_radius").css("width","150");
        $("#slider_filter_blur_sigma").css("width","150");
        //$("#slider_filter_sharpen_radius").css("width","120");
        //$("#slider_scale_image").css("width","120");
                
        $("#slider_scale_image").slider({ 
            animate: true,max: 100, min:0, step:5,value: 0,
            slide: function( event, ui ) {
                $( "#slider_scale_image_amount" ).val(ui.value + "%");
                $( "#scale_image_value" ).val(ui.value);
            },
            stop: function(event, ui){
                $.post('<?php echo base_url(); ?>demos/image_manipulations', $("#scale_image_form").serialize(),function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.status){
                        $("#scale_image_image").attr("src","<?php echo base_url(); ?>tmp/"+obj.data);
                    }
                });
            }
        });
    });
        
</script>

<div class="head-category">
    You can test image effects
</div>
<div class="overflow-scroll">
    <div class="row-1" id="image_manipulation">
        <div class="cell-1 float">
            <div class="title">Make image lighter </div>
            <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_light_form">
                <input type="hidden" name="handler" value="filter_light">
                <input type="hidden" name="value" id="filter_light_value">
            </form>
            <div class="img-category">
                <img alt="img" src="<?php echo base_url(); ?>img/img-category.jpg" id="filter_light_image"/>
            </div>
            <div class="head-category-2">Header-1</div>
            <div id="slider_filter_light"></div>
            <p>
                <label class="value" for="amount">Value:</label>
                <input type="text" id="slider_filter_light_amount" style="border:0; color:#253459; font-weight:bold;" />
            </p>
        </div>
        <div class="cell-1 float">
            <div class="title">Blur image <span id="blur_howto">*</span></div>
            <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_blur_form">
                <input type="hidden" name="handler" value="filter_blur">
                <input type="hidden" name="radius" id="filter_blur_value_radius">
                <input type="hidden" name="sigma" id="filter_blur_value_sigma">
            </form>
            <div class="img-category">
                <img alt="img" src="<?php echo base_url(); ?>img/img-category.jpg" id="filter_blur_image"/>
            </div>
            <div class="float">
                <div class="head-category-2">Blur Radius</div>
                <div id="slider_filter_blur_radius"></div>
                <p>
                    <label class="value" for="amount">Value:</label>
                    <input class="background-gray" type="text" id="slider_filter_blur_radius_amount" style="border:0; color:#253459; font-weight:bold;" />
                </p>
            </div>
            <div class="float" style="padding-left:20px;">
                <div class="head-category-2">Blur Sigma</div>
                <div id="slider_filter_blur_sigma"></div>
                <p>
                    <label class="value" for="amount">Value:</label>
                    <input class="background-gray" type="text" id="slider_filter_blur_sigma_amount" style="border:0; color:#253459; font-weight:bold;" />
                </p>
            </div>
        </div>
    </div>
    <div class="row-1" id="image_manipulation">
        <div class="cell-1 float">
            <div class="title">Sharpen image <span id="sharpen_howto">*</span></div>
            <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_sharpen_form">
                 <input type="hidden" name="handler" value="filter_sharpen">
                 <input type="hidden" name="radius" id="filter_sharpen_value_radius">
            </form>
            <div class="img-category">
                <img alt="img" src="<?php echo base_url(); ?>img/img-category.jpg" id="filter_sharpen_image"/>
            </div>
            <div class="head-category-2">Blur Radius</div>
            <div id="slider_filter_sharpen_radius"></div>
            <p>
                <label class="value" for="amount">Value:</label>
                <input class="background-gray" type="text" id="slider_filter_sharpen_radius_amount" style="border:0; color:#253459; font-weight:bold;"/>
            </p>
        </div>
        <div class="cell-1 float">
            <div class="title">Scale image </div>
            <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="scale_image_form">
                <input type="hidden" name="handler" value="scale_image">
                <input type="hidden" name="scale_image_value" id="scale_image_value">
            </form>
            <div class="img-category">
                <img alt="img" src="<?php echo base_url(); ?>img/img-category.jpg" id="scale_image_image"/>
            </div>
            <div class="head-category-2">Scale percent</div>
            <div id="slider_scale_image"></div>
            <p>
                <label class="value" for="amount">Value:</label>
                <input class="background-gray" type="text" id="slider_scale_image_amount" style="border:0; color:#253459; font-weight:bold;"/>
            </p>
        </div>
    </div>
</div>
<div class="clear"></div>









<!--<div>
    Make image lighter
    <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_light_form">
        <input type="hidden" name="handler" value="filter_light">
        <input type="hidden" name="value" id="filter_light_value">
    </form>
    <img src="<?php echo base_url(); ?>stuff/rav4.jpeg" id="filter_light_image"/>
    <br><br>
    <div id="slider_filter_light"></div>
    <p>
        <label for="amount">Value:</label>
        <input type="text" id="slider_filter_light_amount" style="border:0; color:#f6931f; font-weight:bold;" />
    </p>
</div>
<br><br>
<div id="image_manipulation">
<div>
    Blur image <span id="blur_howto">*</span>
    <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_blur_form">
        <input type="hidden" name="handler" value="filter_blur">
        <input type="hidden" name="radius" id="filter_blur_value_radius">
        <input type="hidden" name="sigma" id="filter_blur_value_sigma">
    </form>
    <img src="<?php echo base_url(); ?>stuff/rav4.jpeg" id="filter_blur_image">
    <br><br>
    Blur Radius:
    <div id="slider_filter_blur_radius"></div>
    <p>
        <label for="amount">Value:</label>
        <input type="text" id="slider_filter_blur_radius_amount" style="border:0; color:#f6931f; font-weight:bold;" />
    </p>
    <br>
    Blur Sigma:
    <div id="slider_filter_blur_sigma"></div>
    <p>
        <label for="amount">Value:</label>
        <input type="text" id="slider_filter_blur_sigma_amount" style="border:0; color:#f6931f; font-weight:bold;" />
    </p>
</div>
</div>

<br><br>
<div id="image_manipulation">
    <div>
        Sharpen image <span id="sharpen_howto">*</span>
        <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="filter_sharpen_form">
            <input type="hidden" name="handler" value="filter_sharpen">
            <input type="hidden" name="radius" id="filter_sharpen_value_radius">
        </form>
        <img src="<?php echo base_url(); ?>stuff/rav4.jpeg" id="filter_sharpen_image">
        <br><br>
        sharpen Radius:
        <div id="slider_filter_sharpen_radius"></div>
        <p>
            <label for="amount">Value:</label>
            <input type="text" id="slider_filter_sharpen_radius_amount" style="border:0; color:#f6931f; font-weight:bold;" />
        </p>
    </div>
</div>
<br><br>
<div id="image_manipulation">
    <div>
        Scale image
        <form action="<?php echo base_url(); ?>demos/image_manipulations" method="POST" id="scale_image_form">
            <input type="hidden" name="handler" value="scale_image">
            <input type="hidden" name="scale_image_value" id="scale_image_value">
        </form>
        <img src="<?php echo base_url(); ?>stuff/rav4.jpeg" id="scale_image_image">
        <br><br>
        Scale percent:
        <div id="slider_scale_image"></div>
        <p>
            <label for="amount">Value:</label>
            <input type="text" id="slider_scale_image_amount" style="border:0; color:#f6931f; font-weight:bold;" />
        </p>
    </div>
</div>-->

