<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title>BlockExplorer</title>
    <meta charset="utf-8">
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSS -->
    <link rel="icon" href="/images/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/print.css">

    <!--[if IE]>
    <script src="/js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" class="accout-page">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="header-top clear">
                    <div class="logo col-md-4 col-sm-4 col-xs-12">
                        <a href="/">
                            <img src="/images/Logo-acc.png" alt="logo" />
                        </a>
                    </div>
                    <div class="menu col-md-8 col-sm-8 col-xs-12 align-right">

                        <div class="men-icon">
                            <a href="#"><img src="/images/men-icon.png" alt="icon" /></a>
                        </div>
                        <form role="search" method="post" action="/dash/search">

                            <div class="header-form">
                                <input type="text" name="search_string" placeholder="Type your address here">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <input type="submit" style="position: absolute; left: -9999px"/>

                            </div>
                        </form>
                        <div class="menu-icon">
                            <img src="/images/menu-icon.png" alt="icon" />
                        </div>
                        <nav>
                            <ul class="clear">
                                <li><a href="/btc">Bitcoin</a></li>
                                <li><a href="/bch">Bitcoin Cash</a></li>
                                <li><a href="/eth">Ethereum</a></li>
                                <li><a href="/ltc">Litecoin</a></li>
                                <li><a href="/dash">Dash</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">

                <div class="header-btm clear">
                    <div class="header-btm-lft col-md-6 col-sm-6 col-xs-12">
                        <img src="/images/b-icon.png" alt="image" />
                        <div class="btm-lft-info">
                            <h2>Viewing Block Height</h2>
                            <p>  {{$block->height}}</p>
                        </div>
                    </div>
                    <div class="header-btm-rgt col-md-6 col-sm-6 col-xs-12">
                        <ul>
                            <li>
                                <a href="#"><img src="/images/copy-url.png" alt="image" />COPY URL</a>
                            </li>
                            <li class="active">
                                <a href="#"><i class="fa fa-star" aria-hidden="true"></i>SAVE TO FAVORITES</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- graph-blk start here -->
    <section class="graph-blk">
        <div class="container">
            <div class="row">
                <div class="lft-graph-blk col-md-12 col-sm-12 col-xs-12">
                    <ul>
                        <div class="col-md-4">
                        <li>
                            <h6>Block Height</h6>
                            <p> {{$block->height}}</p>
                        </li>
                        </div>


                        <div class="col-md-4">

                        <li>
                            <h6>Received Time</h6>
                            <p>{{$block_time}}</p>
                        </li>
                        </div>

                        <div class="col-md-4">

                                <li>
                            <h6>Total Transactions</h6>
                            <p>{{$block->n_tx}}</p>
                        </li>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- graph-blk end here -->

    <!-- account-tabs blk start here -->
    <div class="account-tabs">
        <div class="account-tab-head">
            <div class="container">
                <div class="row">
                    <ul>
                        <li class="active"><a href="#">Block Details</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="account-tab-info">
            <div class="container">
                <div class="row">
                    <div class="account-tab-in">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Height</th>
                                    <td>
                                        {{$block->height}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Version</th>
                                    <td>
                                        {{$block->ver}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Merkle Root</th>
                                    <td>
                                        {{$block->mrkl_root}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bits (difficulty target)</th>
                                    <td>
                                        {{$block->bits}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nonce</th>
                                    <td>
                                        {{$block->nonce}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hash</th>
                                    <td>
                                        {{$block->hash}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>
                                        {{$block->size}}
                                    </td>
                                </tr>



                                </tbody></table><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- account-tabs blk end here -->
</div>
<!-- footer start here -->
<footer class="account-footer">
    <div class="footer-bg">
        <div class="container">
            <div class="row">
                <div class="footer-top">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="/images/Logo.png" alt="image" />
                            </a>
                        </li>
                        <li>
                            <h5>About</h5>
                            <a href="#">Who we are</a>
                            <a href="#">Our Team</a>
                            <a href="#">Press Kit</a>
                        </li>
                        <li>
                            <h5>Data</h5>
                            <a href="#">Charts</a>
                            <a href="#">Statistics</a>
                            <a href="#">Markets</a>
                        </li>
                        <li>
                            <h5>Support</h5>
                            <a href="#">Help Center</a>
                            <a href="#">Resources</a>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-btm clear">
                    <div class="ftr-lft col-md-6 col-sm-6 col-xs-12">
	                <p>Copyright BlockExplorer. All rights reserved.</p>
                        <a href="#">PRIVACY Policy</a>
                        <a href="#">TERMS & Conditions</a>
                    </div>
                    <div class="ftr-rgt col-md-6 col-sm-6 col-xs-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end here -->
<!-- /container -->

<!--JS-->
<script src="/js/vendor/jquery-3.1.0.min.js"></script>
<script src="/js/jquery.dd.js"></script>
<script src="/js/retina.min.js"></script>
<script src="/js/respond.min.js"></script>
<script>
    $(document).ready(function() {
        $(".menu-icon").click(function(){
            $("nav").slideToggle();
        });

        $(window).on("scroll", function() {
            if($(window).scrollTop() > 10) {
                $("header").addClass("stycky_header");
            } else {
                $("header").removeClass("stycky_header");
            }
        });
        $("select").msDropdown({roundedBorder:false});
        createByJson();
    });
</script>
</body>
</html>