
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.flip.min.js"></script>
<script type="text/javascript" src="js/flip_init.js"></script>


<style>

    .sponsorListHolder{
        margin-bottom:30px;
    }

    .sponsor{
        width:180px;
        height:180px;
        float:left;
        margin:4px;

        /* Giving the sponsor div a relative positioning: */
        position:relative;
        cursor:pointer;
    }

    .sponsorFlip{
        /*  The sponsor div will be positioned absolutely with respect
                to its parent .sponsor div and fill it in entirely */

        position:absolute;
        left:0;
        top:0;
        width:100%;
        height:100%;
        border:1px solid #ddd;	
        background:url("images/flip/background.jpg") no-repeat center center #f9f9f9;
    }

    .sponsorFlip:hover{
        border:1px solid #999;

        /* CSS3 inset shadow: */
        -moz-box-shadow:0 0 30px #999 inset;
        -webkit-box-shadow:0 0 30px #999 inset;
        box-shadow:0 0 30px #999 inset;
    }

    .sponsorFlip img{
        /* Centering the logo image in the middle of the sponsorFlip div */

        position:absolute;
        top:50%;
        left:50%;
        margin:-70px 0 0 -70px;
    }

    .sponsorData{
        /* Hiding the .sponsorData div */
        display:none;
    }

    .sponsorDescription{
        font-size:11px;
        padding:80px 10px 20px 20px;
        font-style:italic;
    }

    .sponsorURL{
        font-size:10px;
        font-weight:bold;
        padding-left:20px;
    }

    .clear{
        /* This class clears the floats */
        clear:both;
    }
</style>

<div class="back-long">
    <div class="border-billet-top"></div>
    <div class="home-center">
        <div class="padding-header">
            <span class="header-services-1">Live demos -</span> <span class="header-services-2">We provide such services and technologies</span>
        </div>
    </div>
    <div class="border-billet-bottom"></div>
</div>
<div class="background-center-main">
    <div class="background-center-main-2">
        <div class="general-container">
            <div id="bodyPan">
                <div style="text-align: center">

                    <table id="contact_table">
                        <tr>
                            <td>
                                <div class="sponsor" title="Click to flip">
                                    <div class="sponsorFlip">
                                        <img src="<?php echo base_url() . "images/flip/sponsors/yahoo.png"; ?>" alt="yahoo ID" />
                                    </div>

                                    <div class="sponsorData">
                                        <div class="sponsorDescription">
                                            <span id="contact_yahoo">sbushinskii</span>   
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="sponsor" title="Click to flip">
                                    <div class="sponsorFlip">
                                        <img src="<?php echo base_url(); ?>images/flip/sponsors/skype_logo_online.png"  alt="Skype Me™!" />
                                    </div>
                                    <div class="sponsorData">
                                        <div class="sponsorDescription">
                                            <span id="contact_skype">sbushinskii</span>   
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="sponsor" title="Click to flip">
                                    <div class="sponsorFlip">
                                        <img src="<?php echo base_url(); ?>images/flip/sponsors/gmail.png"  alt="Gmail!" />
                                    </div>
                                    <div class="sponsorData">
                                        <div class="sponsorDescription">
                                            <span id="contact_gmail">sbushinskii@gmail.com</span>   
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>


<!--                <div class="contact_find_me">
                    <img src="<?php echo base_url(); ?>images/find-me.png" alt="Find me" title="Places you can find me" height="16" width="54">
                    <a href="http://twitter.com/sbushinskii" title="Find me in tTwitter" target="_blank">
                        <img src="<?php echo base_url(); ?>images/twitter.png" alt="twitter" class="social-icon" height="16" width="16">
                    </a>

                    <a href="http://www.facebook.com/sbushinskii" title="Become my virtual friend!" target="_blank">
                        <img src="<?php echo base_url(); ?>images/facebook.png" alt="Facebook" class="social-icon" height="16" width="16">
                    </a>

                    <a href="http://www.youtube.com/sbushinskii" title="My moview on YouTube" target="_blank">
                        <img src="<?php echo base_url(); ?>images/youtube.png" alt="YouTube" class="social-icon" height="16" width="16">
                    </a>

                    <a href="http://www.flickr.com/photos/64678947@N08/" title="Hit me up on Flickr" target="_blank">
                        <img src="<?php echo base_url(); ?>images/flickr.png" alt="flickr" class="social-icon" height="16" width="16">
                    </a>
                    <a href="http://www.linkedin.com/in/sbushinskii" title="Link in with me" target="_blank">
                        <img src="<?php echo base_url(); ?>images/linkedin.png" alt="linkedin" class="social-icon" height="16" width="16">
                    </a>
                    <a href="http://vkontakte.ru/id8068650" title="Link in with me" target="_blank">
                        <img src="<?php echo base_url(); ?>images/vkontakte.jpg" alt="vkontakte" class="social-icon" height="16" width="16">
                    </a>
                </div>-->
                <div style="text-align: center; margin-top: 10px">
                    You are <img src="http://hitwebcounter.com/counter/counter.php?page=225664&style=0027&nbdigits=7&type=ip" title="Hard Drive" Alt="Hard Drive"   border="0" > visitor
                </div>

            </div>
        </div>
    </div>
</div>