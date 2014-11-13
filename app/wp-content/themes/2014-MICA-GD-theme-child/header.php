<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- /\/\/ ndrwwltrs.com  -->

<title><?php wp_title(); ?></title>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="Created by" content="Erica Bech + Andrew Walters" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script type="text/javascript" src="//use.typekit.net/dwd8sui.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="http://micagraphicdesign.org/c/<?php echo(rand(1,4)); ?>.css" />" type="text/css" media="screen" />
</head>

<body <?php body_class() ?>>
	
	<script type="text/javascript">
	function testScroll(ev){
    	if(window.pageYOffset>240) {
    		document.getElementById("bot").style.position="fixed";
    		document.getElementById("bot").style.top="222px";
			}
		else {  
			document.getElementById("bot").style.position="absolute";
    		document.getElementById("bot").style.top="auto";
    		document.getElementById("bot").style.bottom="40px";
			}
	}
	window.onscroll=testScroll
	
	
	/*
	$(function(){
        // Check the initial Position of the Sticky Header
        $(window).scroll(function(){
                if( $(window).scrollTop() > 240) {
                        $('#bot').css({position: 'fixed', top: '222px'});
                } else {
                        $('#bot').css({position: 'absolute', top: 'auto', bottom: '40px'});
                }
        });
       
	});*/
	</script>




	<header id="header">
			<div id="headwrap">
					<a class="home" href="<?php echo home_url( '/' ); ?>" id="site-title" rel="home">MICA GD</a>
					<nav id="access">
						<a class="nav-show" href="#access">Show Navigation</a>
						<a class="nav-hide" href="#nogo">Hide Navigation</a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary_nav' ) ); ?>
					</nav><!-- #access -->
					<?php get_search_form(); ?>
					<div class="clear"></div>
			</div><!-- #headwrap -->
		</header><!-- #header -->
		<?php the_meta(); ?>
		<div id="all">
		<div id="wrapper">