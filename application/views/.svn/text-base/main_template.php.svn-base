<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>

        <script language="JavaScript1.2" type="text/javascript">
            function getBrowserInfo() {
                var t="",v = "";
                if (navigator.userAgent.indexOf('Chrome')>=0) t='Chrome';
                else if (window.opera) t = 'Opera';
                else if (document.all) {
                    t = 'IE';
                    var nv = navigator.appVersion;
                    var s = nv.indexOf('MSIE')+5;
                    v = nv.substring(s,s+1);
                }
                else if (navigator.appName) t = 'Netscape';
                return { type:t, version:v };
            }
 
            function bookmark(a){
                var url = window.document.location;
                var title = window.document.title;
                var b = getBrowserInfo();
                if (b.type == 'Chrome') {
                    alert("Нажмите CTRL+D для добавления страницы в Избранное");
                }
                else if (b.type == 'IE' && b.version >= 4) {
                    window.external.AddFavorite(url,title);
                }
                else if (b.type == 'Opera') {
                    a.href = url;
                    a.rel = "sidebar";
                    a.title = url+','+title;
                    return true;
                }
                else if (b.type == 'Netscape') {
                    window.sidebar.addPanel(title,url,"");
                }
                else alert("Нажмите CTRL+D для добавления страницы в Избранное");
                return false;
            }
        </script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/headway.css" type="text/css"/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon"/>
        <!--[if IE]>
        <link rel="stylesheet" href="css/ie.css" type="text/css"/>
<![endif]-->

        <title>Demos</title>
    </head>
    <body>
        <div class="content-all">
            <div class="main-page">
                <div class="page">
                    <div class="page-inner">
                        <!--HEADER ..Start..-->
                        <div class="header">
                            <div class="header-inner clear-block">
                                <div class="float en-net">
                                    <div class="en-ru">
                                        <a class="ru" href="" class="" title="">
                                            
                                        </a>
                                        <a class="en" href="" class="" title="">
                                            
                                        </a>
                                    </div>
                                    <div class="net">
                                        <div> <a class="net_1" href=""></a></div>
                                        <div> <a class="net_2" href=""></a></div>
                                        <div> <a class="net_3" href=""></a></div>
                                        <div> <a class="net_4" href=""></a></div>
                                        <div> <a class="net_5" href="javascript:void(0)" onclick="return bookmark(this)"></a></div>
                                    </div>
                                </div>
                                <div class="logo">
                                    <a href="<?php echo base_url(); ?>"><img alt="net_1" src="<?php echo base_url(); ?>img/logo.png"/></a>
                                </div>
                                <div class="header-2">
                                    <div id="menu">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>" class="home-menu<?php echo ($active_menu == "home") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                            <li><a href="<?php echo base_url(); ?>about" class="about-menu<?php echo ($active_menu == "about") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                            <li><a href="<?php echo base_url(); ?>portfolio" class="portfolio-menu<?php echo ($active_menu == "portfolio") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                            <li><a href="<?php echo base_url(); ?>demos" class="demos-menu<?php echo ($active_menu == "demos") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                            <li><a href="<?php echo base_url(); ?>feedbacks" class="feedbacks-menu<?php echo ($active_menu == "feedbacks") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                            <li><a href="<?php echo base_url(); ?>contact" class="contact-menu<?php echo ($active_menu == "contact") ? "-active" : ""; ?>" title=""></a></li>
                                            <li><img alt="img" src="<?php echo base_url(); ?>img/separate-menu.png"/></li>
                                        </ul>
                                    </div>
                                    <div class="slogan">
                                        <div class="slogan-txt">
                                            We're are web oriented company which creates web-sites and web solutions. We offer web development and services for more than 3 years.
                                        </div>
                                        <div class="float-right phone"><img alt="img" src="<?php echo base_url(); ?>img/phone.png"/></div>
                                    </div>
                                    <div class="number">
                                        <b>Tel:</b> +7 923 679 2777 (3812)378-470
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!--HEADER ..End..-->

                        <div class="main">
                            <div class="cont">
                                <?php $this->load->view($content); ?>
                            </div> <!-- /.cont -->
                        </div> <!-- /.main -->
                    </div> <!-- /.page-inner -->
                </div> <!-- /.page -->
                <div class="footer">
                    <div class="footer-indent">
                        <a href="" >home</a>  |  
                        <a href="" >about us</a>  |  
                        <a href="" >support</a>  |  
                        <a href="" >solution</a>  |  
                        <a href="" >testimonials</a>  |  
                        <a href="" >contact</a><br/>
                        <div>
                            headway-studio.com 2011 all right reserved 
                        </div>
                    </div>
                </div><!-- /.footer -->
            </div>

        </div> <!--content-all-->

    </body>
</html>