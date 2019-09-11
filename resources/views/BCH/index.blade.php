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
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <!--[if IE]>
    <script src="/js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" class="home-bg-clr">
    <div class="home-bg">
    @include('layouts.header')


    <!-- chain-blk start here -->
        <section class="chain-blk">
            <div class="container">
                <div class="row">
                    <div class="chainblk-info">
                        <h1>The easiest <strong>multi-blockchain</strong> explorer</h1>
                        <form role="search" method="post" action="/bch/search">

                            <div class="chain-form clear">
                                <input type="text"  name="search_string" placeholder="Type your address here">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="chain-select">
                                    <select id="mycomp" class="clear" onchange="location = this.value;">
                                    <option value="/" title="images/biticon.png">BTC</option>
                                    <option selected value="/bch" title="images/bch.png">BCH</option>
                                    <option value="/eth" title="images/eth.png">ETH</option>
                                    <option value="/ltc" title="images/ltc.png">LTC</option>
                                    <option value="/dash" title="images/dash.png">DASH</option>
                                    </select>
                                </div>
                                <input type="submit" style="position: absolute; left: -9999px"/>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </section>
        <!-- chain-blk end here -->


    </div>
    <div class="push"></div>
</div>
<!-- footer start here -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="ftr-lft col-md-6 col-sm-6 col-xs-12">
                <p>Copyright BlockExplorer. All rights reserved.</p>
                <a href="#">PRIVACY Policy</a>
                <a href="#">TERMS & Conditions</a>
            </div>
            <div class="ftr-rgt col-md-6 col-sm-6 col-xs-12">
            </div>
        </div>
    </div>
</footer>
<!-- footer end here -->
<!-- /container -->

<!--JS-->
<script src="js/vendor/jquery-3.1.0.min.js"></script>
<script src="js/jquery.dd.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/respond.min.js"></script>
<script>
    $(document).ready(function() {
        $(".menu-icon").click(function(){
            $("nav").slideToggle();
        });
        $("select").msDropdown({roundedBorder:false});
        createByJson();
    });
</script>
</body>
</html>