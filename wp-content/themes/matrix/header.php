<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tyler
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?>Green Gravel Comedy</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>
    <script type="text/javascript" src="//use.typekit.net/rsw2iqh.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <script>
    // Picture element HTML5 shiv
    document.createElement( "picture" );
    </script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/picturefill.js" async></script>
    </head>

<?php if (is_front_page() ) { ?>

<body class="home-page">
       
<?php } else { ?>
     
<body>
     
<?php } ?>
      

    <nav class="push-menu-right">
		<ul>
            <li><a href="<?php echo get_settings('home'); ?>" class="nav-home">Home</a></li>
            <?php if ( get_post_type() == 'festinfo' ) { ?>
		        <li><a href="#tickets" class="nav-tickets">Tickets</a></li>
            <?php } else { ?>
                <li><a href="<?php echo site_url(); ?>/festinfo#tickets" class="nav-tickets">Tickets</a></li>
            <?php } ?>
		    <?php if (is_front_page() ) { ?>
			    <li><a href="#news" class="nav-news">News</a></li>
			<?php } else { ?>
			    <li><a href="<?php echo get_settings('home'); ?>#news" class="nav-news">News</a></li>
			<?php } ?>
			<li><a href="<?php echo site_url(); ?>/festinfo" class="nav-festinfo">Fest Info</a></li>
			<li><a href="<?php echo site_url(); ?>/events" class="nav-calendar">Calendar</a></li>
			<li><a href="<?php echo site_url(); ?>/lineup" class="nav-lineup">Performers</a></li>
			<li><a href="<?php echo site_url(); ?>/submissions" class="nav-submissions">Submissions</a></li>
			<?php if ( get_post_type() == 'festinfo' ) { ?>
			    <li><a href="#press" class="nav-press">Press</a></li>
            <?php } else { ?>
                <li><a href="<?php echo site_url(); ?>/festinfo#press" class="nav-press">Press</a></li>
            <?php } ?>
		</ul>
	</nav>
	
	<button type="button" role="button" class="lines-button toggle-push-right"><span class="lines"></span></button>
    
    <div id="skrollr-body">

	<?php if(is_front_page() ) { ?>
	
            <header class="global-header">
                <a href="<?php echo get_settings('home'); ?>" class="logo"></a>
            </header>
    
    <?php } else {
			
        get_template_part( 'article', 'header' );
        
    } ?>

   <?php if ( get_post_type() == 'events' && is_singular() == 'events' ) {
        ?> <main class="events"> <?php
    } else {
        ?> <main> <?php
    } ?>