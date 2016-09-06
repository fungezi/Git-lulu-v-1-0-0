
<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>喻希里</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/icons/favicon.png">

        <!--[if lt IE 9]>
          <script src="assets/js/minified/core/html5shiv.min.js"></script>
          <script src="assets/js/minified/core/respond.min.js"></script>
        <![endif]-->

        <!-- AgileUI CSS Core -->

        <link rel="stylesheet" type="text/css" href="assets/css/minified/aui-production.min.css">

        <!-- Theme UI -->


        <link id="layout-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/layouts/default.min.css">
        <link id="elements-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/elements/default.min.css">
        <!-- 新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="assets/js/bootstrap.min.css">
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
        <!-- AgileUI Responsive -->

        <link rel="stylesheet" type="text/css" href="assets/css/calendar.css">

        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/responsive.min.css">

        <!-- AgileUI Animations -->

        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/animations.min.css">

        <!-- AgileUI JS -->

        
        <script type="text/javascript" src="admin.js"></script>

    </head>
    <body class="fixed-sidebar fixed-header">
        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">知道了</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="assets/images/loader-dark.gif" alt="">
        </div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="page-wrapper" class="demo-example">

            <div id="page-sidebar">
                <div id="header-logo">
                    YXL-Blog-UI <i class="opacity-80">v1.0</i>

                    <a href="javascript:;" class="tooltip-button" data-placement="bottom" title="Close sidebar" id="close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" data-placement="bottom" title="Open sidebar" id="rm-close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" title="Navigation Menu" id="responsive-open-menu">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                </div>
                <div id="sidebar-search">
                    <input type="text" placeholder="Autocomplete search..." class="autocomplete-input tooltip-button" data-placement="right" title="Type &apos;j&apos; to see the available tags..." id="" name="">
                    <i class="glyph-icon icon-search"></i>
                </div>
                <div id="sidebar-menu" class="scrollable-content">
                    <ul>
                        
                    </ul>
                    <script>
    $(function(){
        $.ajax({
            type:"get",
            url:"http://localhost/thinkphp-cms/index.php/v1/admin/list",
            data:{},
            dataType:"json",
            success:function(data){
                if(data.flag){
                    // console.log(data.content);
                    var content = data.content;
                    var html = 
                    '<ul>'+
                    '</ul>';
                    
                    html = $(html);
                    trees(content,0);
                    console.log(html);
                    $("#sidebar-menu").html(html);
                    function sethtml(n,nodes){
                        var node = 
                        '<li>'+
                        '<a href="'+nodes['authpath']+'" title="'+nodes['authname']+'">'+
                            '<i class="glyph-icon icon-chevron-right"></i>'+
                            nodes['authname']+
                        '</a>'+
                        '<ul>'+
                        '</ul>'+
                        '</li>';
                        if(n==0){
                            node = 
                            '<li>'+
                            '<a href="javascript:;" title="'+nodes['authname']+'">'+
                                '<i class="glyph-icon icon-code"></i>'+
                                nodes['authname']+
                            '</a>'+
                            '<ul>'+
                            '</ul>'+
                            '</li>';
                            $(html).append($(node));
                        }else{
                            var ch= $(html).children("li");
                            ch = $($(ch)[ch.length-1]);
                            // console.log(ch);
                            for(var i =0;i<n;i++){
                                ch = ch.children("ul");
                                // ch = $($(ch)[ch.length-1]);
                            }

                            $(ch).append($(node));
                            
                        }
                        console.log(node);
                    }
                    function trees(tree,n){
                        for(var item in tree){
                            sethtml(n,tree[item]);
                            // console.log(n + "-"+tree[item]['authid']);

                            if(tree[item]['son']){
                                n = n + 1;
                                trees(tree[item]['son'],n);
                                n = n -1;
                            }
                        }
                    }
                }
            }
        })
    })
</script>
                    <div class="divider mrg5T mobile-hidden"></div>
                    <div class="text-center mobile-hidden">
                        <div class="button-group">
                            <a href="javascript:;" class="btn medium ui-state-default tooltip-button" data-placement="top" title="Top tooltip">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            <a href="javascript:;" class="btn medium ui-state-default tooltip-button" data-placement="bottom" title="Bottom tooltip">
                                <i class="glyph-icon icon-inbox"></i>
                            </a>
                            <a href="javascript:;" class="btn medium ui-state-default tooltip-button" data-placement="right" title="Right tooltip">
                                <i class="glyph-icon icon-hdd-o"></i>
                            </a>
                        </div>

                        <div class="divider"></div>
                    </div>
                </div>

            </div><!-- #page-sidebar -->
            
            <div id="page-main">

                <div id="page-main-wrapper">

                    <div id="page-header" class="clearfix">
                        <div id="page-header-wrapper" class="clearfix">
                            <div class="hide" id="black-modal-60" title="Modal window example">
                                <div class="pad20A">

                                    <div class="infobox notice-bg">
                                        <div class="bg-blue large btn info-icon">
                                            <i class="glyph-icon icon-bullhorn"></i>
                                        </div>
                                        <h4 class="infobox-title">Modal windows - shared on weidea.net</h4>
                                        <p>Thanks to the solid modular AgileUI arhitecture, modal windows customizations are very flexible and easy to apply.</p>
                                    </div>

                                    <h4 class="heading-1 mrg20T clearfix">
                                        <div class="heading-content" style="width: auto;">
                                            Icons
                                            <small>
                                                All icons across the AgileUI Framework use FontAwesome icons.
                                            </small>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="divider"></div>
                                    </h4>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-compass" href="../icon/compass"><i class="glyph-icon icon-compass"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-collapse" href="../icon/collapse"><i class="glyph-icon icon-collapse"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-collapse-top" href="../icon/collapse-top"><i class="glyph-icon icon-collapse-top"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-expand" href="../icon/expand"><i class="glyph-icon icon-expand"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-eur" href="../icon/eur"><i class="glyph-icon icon-eur"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-euro" href="../icon/eur"><i class="glyph-icon icon-euro"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-gbp" href="javascript:;"><i class="glyph-icon icon-gbp"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-usd" href="javascript:;"><i class="glyph-icon icon-usd"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-dollar" href="javascript:;"><i class="glyph-icon icon-dollar"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-inr" href="javascript:;"><i class="glyph-icon icon-inr"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-rupee" href="javascript:;"><i class="glyph-icon icon-rupee"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-jpy" href="javascript:;"><i class="glyph-icon icon-jpy"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-yen" href="javascript:;"><i class="glyph-icon icon-yen"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-cny" href="javascript:;"><i class="glyph-icon icon-cny"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-renminbi" href="javascript:;"><i class="glyph-icon icon-renminbi"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-krw" href="javascript:;"><i class="glyph-icon icon-krw"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-won" href="javascript:;"><i class="glyph-icon icon-won"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-btc" href="javascript:;"><i class="glyph-icon icon-btc"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-bitcoin" href="javascript:;"><i class="glyph-icon icon-bitcoin"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-file" href="javascript:;"><i class="glyph-icon icon-file"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-file-text" href="javascript:;"><i class="glyph-icon icon-file-text"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-alphabet" href="javascript:;"><i class="glyph-icon icon-sort-by-alphabet"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-alphabet-al" href="javascript:;"><i class="glyph-icon icon-sort-by-alphabet-alt"></i>t</a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-attributes" href="javascript:;"><i class="glyph-icon icon-sort-by-attributes"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-attribu" href="javascript:;"><i class="glyph-icon icon-sort-by-attributes-alt"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-order" href="javascript:;"><i class="glyph-icon icon-sort-by-order"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-sort-by-order-alt" href="javascript:;"><i class="glyph-icon icon-sort-by-order-alt"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-thumbs-up" href="javascript:;"><i class="glyph-icon icon-thumbs-up"></i></a>

                                    <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="icon-thumbs-down" href="javascript:;"><i class="glyph-icon icon-thumbs-down"></i></a>

                                </div>
                            </div>
                            <div class="button-group dropdown">
                                <a class="btn black-modal-60" href="javascript:;" title="Examples">
                                    <span class="button-content text-center float-none font-size-11 text-transform-upr">
                                        <i class="glyph-icon icon-check-sign float-left"></i>
                                        Page examples
                                    </span>
                                </a>
                                <a class="btn" href="javascript:;" data-toggle="dropdown">
                                    <span class="glyph-icon icon-separator">
                                        <i class="glyph-icon icon-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu push-left">
                                    <li class="dropdown-submenu">
                                        <a href="javascript:;" data-toggle="dropdown" title="">
                                            Login pages
                                        </a>
                                        <ul class="dropdown-menu bg-white no-shadow">
                                            <li>
                                                <a href="login.html" title="Login example 1">
                                                    Login example 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="login-alt.html" title="Login example 2">
                                                    Login example 2
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a href="javascript:;" title="">
                                                    Submenus
                                                </a>
                                                <ul class="dropdown-menu bg-white no-shadow">
                                                    <li>
                                                        <a href="javascript:;" title="">
                                                            Nav link 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" title="">
                                                            Nav link 2
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" title="">
                                                            Nav link 3
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="javascript:;" title="">
                                                    Dummy link
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="javascript:;" class="font-orange" title="Link example 1">
                                            <i class="glyph-icon icon-user mrg5R"></i>
                                            Different color link
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" title="Link example 2">
                                            <i class="glyph-icon icon-envelope font-red mrg5R"></i>
                                            <span class="font-italic">Link with red icon</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <span class="badge badge-absolute float-right radius-all-100 mrg5R bg-green tooltip-button" title="You can add badges even to dropdown menus!">7</span>
                                        <a href="badges.html" class="font-gray-dark tooltip-button" data-placement="right" title="Click for more badges examples!">
                                            <i class="glyph-icon icon-user mrg5R"></i>
                                            Link with badge
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="layout-demo" class="button-group dropdown">
                                <a class="btn white-modal-80 tooltip-button" data-placement="bottom" href="javascript:;" title="Click the right dropdown icon to switch to a fixed layout">
                                    <span class="button-content text-center float-none font-size-11 text-transform-upr">
                                        <i class="glyph-icon icon-sitemap float-left"></i>
                                        Layout options
                                    </span>
                                </a>
                                <a class="btn" href="javascript:;" data-toggle="dropdown">
                                    <span class="glyph-icon icon-separator">
                                        <i class="glyph-icon icon-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu float-right">
                                    <li class="header">
                                        Fixed Elements:
                                    </li>
                                    <li>
                                        <a class="add-fixed-sidebar" href="javascript:;" title="">
                                            Static sidebar
                                        </a>
                                        <a class="rm-fixed-sidebar hidden" href="javascript:;" title="">
                                            Fixed sidebar
                                        </a>
                                    </li>
                                    <li>
                                        <a class="add-fixed-header" href="javascript:;" title="">
                                            Static header
                                        </a>
                                        <a class="rm-fixed-header hidden" href="javascript:;" title="">
                                            Fixed header
                                        </a>
                                    </li>
                                    <li>
                                        <a class="add-fixed-footer" href="javascript:;" title="">
                                            Fixed footer
                                        </a>
                                        <a class="rm-fixed-footer hidden" href="javascript:;" title="">
                                            Static footer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="hide" id="white-modal-80" title="Dialog with tabs">
                                <div class="tabs remove-border opacity-80">
                                    <ul class="opacity-80">
                                        <li><a href="#example-tabs-1">First</a></li>
                                        <li><a href="#example-tabs-2">Second</a></li>
                                        <li><a href="#example-tabs-3">Third</a></li>
                                    </ul>
                                    <div id="example-tabs-1">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p>Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.
                                        </p>
                                    </div>
                                    <div id="example-tabs-2">
                                        <p>Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.
                                        </p>
                                        <p>Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.
                                        </p>
                                    </div>
                                    <div id="example-tabs-3">
                                        <p>Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.
                                        </p>
                                        <p>Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.
                                        </p>
                                    </div>
                                </div>
                                <div class="pad10A">
                                    <div class="infobox success-bg radius-all-4">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque</p>
                                    </div>
                                </div>
                                <div class="ui-dialog-buttonpane clearfix">

                                    <a href="dropdown_menus.html" class="btn medium float-left bg-blue">
                                        <span class="button-content text-transform-upr font-size-11">Dropdown menus</span>
                                    </a>
                                    <div class="button-group float-right">
                                        <a href="buttons.html" class="btn medium bg-black" title="View more buttons examples">
                                            <i class="glyph-icon icon-star"></i>
                                        </a>
                                        <a href="buttons.html" class="btn medium bg-black" title="View more buttons examples">
                                            <i class="glyph-icon icon-random"></i>
                                        </a>
                                        <a href="buttons.html" class="btn medium bg-black" title="View more buttons examples">
                                            <i class="glyph-icon icon-map-marker"></i>
                                        </a>
                                    </div>
                                    <a href="javascript:;" class="medium btn bg-green float-right mrg10R tooltip-button" data-placement="left" title="" data-original-title="Remove comment">
                                        <i class="glyph-icon icon-plus"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="top-icon-bar dropdown">
                                <a href="javascript:;" title="" class="user-ico clearfix" data-toggle="dropdown">
                                    <img width="36" src="assets/images/gravatar.jpg" alt="">
                                    <span>Horia Simon</span>
                                    <i class="glyph-icon icon-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu float-right">
                                    <li>
                                        <span class="badge badge-absolute float-left radius-all-100 mrg5R bg-green tooltip-button" title="" data-original-title="You can add badges even to dropdown menus!">7</span>
                                        <a href="javascript:;" title="">
                                            <i class="glyph-icon icon-user mrg5R"></i>
                                            Account Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" title="">
                                            <i class="glyph-icon icon-cog mrg5R"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="font-orange" href="javascript:;" title="">
                                            <i class="glyph-icon icon-flag mrg5R"></i>
                                            Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" title="">
                                            <i class="glyph-icon icon-signout font-size-13 mrg5R"></i>
                                            <span class="font-bold">Logout</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu float-left">
                                        <a href="javascript:;" data-toggle="dropdown" title="">
                                            Dropdown menu
                                        </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:;" title="">
                                                        Submenu 1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" title="">
                                                        Submenu 2
                                                    </a>
                                                </li>
                                                <li class="dropdown-submenu">
                                                    <a href="javascript:;" title="">
                                                        Submenu 3
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:;" title="">
                                                                Submenu 2-1
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" title="">
                                                                Submenu 2-2
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;" title="">
                                            Another menu item
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="top-icon-bar">
                                <a href="javascript:;" class="popover-button" data-placement="bottom" title="Messages Widget" data-id="#msg-box">
                                    <span class="badge badge-absolute bg-orange">18</span>
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </a>
                                <div id="msg-box" class="hide">

                                    <div class="scrollable-content scrollable-small">

                                        <ul class="no-border messages-box">
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <i class="glyph-icon icon-warning-sign font-red"></i>
                                                        <a href="javascript:;" title="Message title">Important message</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <i class="glyph-icon icon-tag font-blue"></i>
                                                        <a href="javascript:;" title="Message title">Some random email</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <a href="javascript:;" class="font-orange" title="Message title">Another received message</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <i class="glyph-icon icon-warning-sign font-red"></i>
                                                        <a href="javascript:;" title="Message title">Important message</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <i class="glyph-icon icon-tag font-blue"></i>
                                                        <a href="javascript:;" title="Message title">Some random email</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="messages-img">
                                                    <img width="32" src="assets/images/gravatar.jpg" alt="">
                                                </div>
                                                <div class="messages-content">
                                                    <div class="messages-title">
                                                        <a href="javascript:;" class="font-orange" title="Message title">Another received message</a>
                                                        <div class="messages-time">
                                                            3 hr ago
                                                            <span class="glyph-icon icon-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="messages-text">
                                                        This message must be read immediately because of it's high importance...
                                                    </div>
                                                </div> 
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="pad10A button-pane button-pane-alt">
                                        <a href="messaging.html" class="btn small float-left bg-gray">
                                            <span class="button-content text-transform-upr font-size-11">All messages</span>
                                        </a>
                                        <div class="button-group float-right">
                                            <a href="javascript:;" class="btn small primary-bg">
                                                <i class="glyph-icon icon-star"></i>
                                            </a>
                                            <a href="javascript:;" class="btn small primary-bg">
                                                <i class="glyph-icon icon-random"></i>
                                            </a>
                                            <a href="javascript:;" class="btn small primary-bg">
                                                <i class="glyph-icon icon-map-marker"></i>
                                            </a>
                                        </div>
                                        <a href="javascript:;" class="small btn bg-red float-right mrg10R tooltip-button" data-placement="left" title="Remove comment">
                                            <i class="glyph-icon icon-remove"></i>
                                        </a>
                                    </div>

                                </div>

                                <a href="javascript:;" class="popover-button" data-placement="bottom" title="" data-id="#notif-box">
                                    <span class="badge badge-absolute bg-green">5</span>
                                    <i class="glyph-icon icon-bell-o"></i>
                                </a>
                                <div id="notif-box" class="hide">

                                    <div class="popover-title display-block clearfix form-row pad10A">
                                        <div class="form-input">
                                            <div class="form-input-icon">
                                                <i class="glyph-icon icon-search transparent"></i>
                                                <input type="text" placeholder="Search notifications..." class="radius-all-100" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scrollable-content scrollable-small">

                                        <ul class="no-border notifications-box">
                                            <li>
                                                <span class="btn bg-red icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text">This is an error notification</span>
                                                <div class="notification-time">
                                                    a few seconds ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="btn bg-orange icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text">This is a warning notification</span>
                                                <div class="notification-time">
                                                    <b>15</b> minutes ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="bg-green btn icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text font-green font-bold">A success message example.</span>
                                                <div class="notification-time">
                                                    <b>2 hours</b> ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="btn bg-red icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text">This is an error notification</span>
                                                <div class="notification-time">
                                                    a few seconds ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="btn bg-orange icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text">This is a warning notification</span>
                                                <div class="notification-time">
                                                    <b>15</b> minutes ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="bg-blue btn icon-notification glyph-icon icon-user"></span>
                                                <span class="notification-text font-blue">Alternate notification styling.</span>
                                                <div class="notification-time">
                                                    <b>2 hours</b> ago
                                                    <span class="glyph-icon icon-time"></span>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="pad10A button-pane button-pane-alt text-center">
                                        <a href="notifications.html" class="btn medium ui-state-default">
                                            <span class="button-content">View all notifications</span>
                                        </a>
                                    </div>

                                </div>

                                <a href="javascript:;" class="popover-button" data-placement="bottom" title="" data-id="#prog-box">
                                    <span class="badge badge-absolute bg-red">21</span>
                                    <i class="glyph-icon icon-tasks"></i>
                                </a>
                                <div id="prog-box" class="hide">

                                    <div class="scrollable-content scrollable-small">

                                        <ul class="no-border progress-box">
                                            <li>
                                                <div class="progress-title">
                                                    Finishing uploading files
                                                    <b>23%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="23">
                                                    <div class="progressbar-value bg-blue">
                                                        <div class="progressbar-overlay"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    Roadmap progress
                                                    <b>91%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="91">
                                                    <div class="progressbar-value primary-bg">
                                                        <div class="progressbar-overlay"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    Images upload
                                                    <b>58%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="58">
                                                    <div class="progressbar-value bg-green"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    WordPress migration
                                                    <b>74%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="74">
                                                    <div class="progressbar-value bg-red"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    Agile development procedures
                                                    <b>91%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="91">
                                                    <div class="progressbar-value primary-bg">
                                                        <div class="progressbar-overlay"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    Systems integration
                                                    <b>58%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="58">
                                                    <div class="progressbar-value bg-green"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress-title">
                                                    Code optimizations
                                                    <b>97%</b>
                                                </div>
                                                <div class="progressbar-small progressbar" data-value="97">
                                                    <div class="progressbar-value bg-orange"></div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="pad10A button-pane button-pane-alt text-center">
                                        <a href="notifications.html" class="btn medium ui-state-default">
                                            <span class="button-content">View all</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div id="theme-demo" class="button-group mrg10R float-right tooltip-button" data-placement="left" title="Click to change theme">

                                <a class="btn popover-button" href="javascript:;" data-id="#theme-styling" data-toggle="popover" data-placement="bottom">
                                    <span class="button-content">
                                        <i class="glyph-icon icon-lightbulb-o float-left"></i>
                                        <i class="glyph-icon icon-caret-down float-right"></i>
                                    </span>
                                </a>

                            </div>

                            <div id="theme-styling" class="hide">
                                <div class="small-box">
                                    <div class="bg-gray text-transform-upr font-size-12 font-bold font-gray-dark pad10A">Layout Color Schemes:</div>
                                    <div class="pad10A clearfix change-layout-theme">
                                        <p class="font-gray-dark font-size-11 pad0B">Click to change the layout color scheme. You can associate different color schemes for layouts and main content elements.</p>
                                        <div class="divider mrg10T mrg10B"></div>
                                        <a href="javascript:;" class="choose-theme" elements-theme="default" layout-theme="default" title="Default">
                                            <span style="background: #37485D;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="black" layout-theme="black" title="Black">
                                            <span style="background: #333;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="orange" layout-theme="gray" title="Gray">
                                            <span style="background: #4a4a4a;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="blue-dark" layout-theme="gray-light" title="Gray Light">
                                            <span style="background: #eee;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="green" layout-theme="white" title="White">
                                            <span style="background: #fafafa;"></span>
                                        </a>
                                    </div>

                                    <div class="bg-gray text-transform-upr font-size-12 font-bold font-gray-dark pad10A">Elements Color Schemes:</div>
                                    <div class="pad10A clearfix change-layout-theme">
                                        <p class="font-gray-dark font-size-11 pad0B">When you select a layout color scheme the elements inherit the styles from it, but you can also choose a different color scheme only for elements.</p>
                                        <div class="divider mrg10T mrg10B"></div>
                                        <a href="javascript:;" class="choose-theme" elements-theme="default" layout-theme="" title="Default">
                                            <span style="background: #37485d;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="black" layout-theme="" title="Black">
                                            <span style="background: #333;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="blue-light" layout-theme="" title="Blue Light">
                                            <span style="background: #45b3ff;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="blue-dark" layout-theme="" title="Blue Dark">
                                            <span style="background: #0068c0;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="orange" layout-theme="" title="Orange">
                                            <span style="background: #f3491c;"></span>
                                        </a>
                                        <a href="javascript:;" class="choose-theme" elements-theme="green" layout-theme="" title="Green">
                                            <span style="background: #269100;"></span>
                                        </a>
                                    </div>
                                    <div class="pad10A button-pane button-pane-alt text-center">
                                        <a href="aui_theming.html" class="btn medium bg-black">
                                            <span class="button-content text-transform-upr font-bold font-size-11">Example button</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- #page-header -->

                    <div id="page-breadcrumb-wrapper">
                        <div id="page-breadcrumb">
                            <a href="javascript:;" title="Dashboard">
                                <i class="glyph-icon icon-dashboard"></i>
                                Dashboard
                            </a>
                            <a href="javascript:;" title="Elements">
                                <i class="glyph-icon icon-laptop"></i>
                                Elements
                            </a>
                            <span class="current">
                                Example breadcrumb
                            </span>
                        </div>
                        <div class="float-right">
                            <a href="buttons.html" class="btn medium bg-blue-alt tooltip-button mrg5R" data-placement="bottom" title="Example buttons in breadcrumb bar">
                                <span class="button-content">
                                    <i class="glyph-icon icon-question"></i>
                                </span>
                            </a>
                            <a href="datepicker.html" class="btn medium bg-orange mobile-hidden mrg5R" title="Datepicker in dropdown">
                                <i class="glyph-icon icon-calendar"></i>
                            </a>
                            <div class="dropdown">
                                <a href="javascript:;" class="btn medium bg-blue" title="Example dropdown" data-toggle="dropdown">
                                    <span class="button-content">
                                        <i class="glyph-icon icon-cog float-left"></i>
                                        <i class="glyph-icon icon-caret-down float-right"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu pad0A float-right">
                                    <div class="medium-box">
                                        <div class="bg-gray text-transform-upr font-size-12 font-bold font-gray-dark pad10A">Form example</div>
                                        <div class="pad10A">
                                            <p class="font-gray-dark pad0B">This <span class="label bg-green">dropdown box</span> uses the Twitter Bootstrap dropdown plugin.</p>
                                            <div class="divider mrg10T mrg10B"></div>

                                                <form id="demo-form" action="" class="col-md-12" method="">
                                                    <div class="form-row">
                                                        <div class="form-label col-md-4">
                                                            <label for="">
                                                                Name:
                                                                <span class="required">*</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-input col-md-8">
                                                            <input type="text" id="email" name="email" data-type="email" data-trigger="change" data-required="true" class="parsley-validated">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-label col-md-4">
                                                            <label for="">
                                                                Email:
                                                                <span class="required">*</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-input col-md-8">
                                                            <input type="text" id="email" name="email" data-type="email" data-trigger="change" data-required="true" class="parsley-validated">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-label col-md-4">
                                                            <label for="">
                                                                Website:
                                                            </label>
                                                        </div>
                                                        <div class="form-input col-md-8">
                                                            <input type="text" id="website" name="website" data-trigger="change" data-type="url" class="parsley-validated">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-label col-md-4">
                                                            <label for="" class="label-description">
                                                                Message:
                                                                <span>20 chars min, 200 max</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-input col-md-8">
                                                            <textarea id="message" name="message" data-trigger="keyup" data-rangelength="[20,200]" class="parsley-validated"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="form-row">
                                                        <input type="hidden" name="superhidden" id="superhidden">
                                                        <div class="form-input col-md-8 col-md-offset-4">
                                                            <a href="javascript:;" class="btn medium ui-state-default radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                                                                <span class="button-content">
                                                                    Validate the form above
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </form>

                                        </div>

                                        <div class="bg-black font-size-12 font-orange pad10A mrg5L mrg5R">Custom header example</div>
                                        <div class="pad15A">
                                            <p class="font-green text-center font-size-14 pad0B">AgileUI comes with powerful helpers that you can use to create virtually any style you want. Read the documentation about helper classes to find out more!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- #page-breadcrumb-wrapper -->










