<?php
/**
 * Types Clone WordPress Administration Template Footer
 *
 * @todo After leaving Thickbox this should be reviewed
 * @package Types WordPress clones
 * @subpackage Administration
 */
// don't load directly
if ( !defined( 'ABSPATH' ) )
    die( '-1' );

?>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter">
    <?php do_action( 'in_admin_footer' ); ?>
    <p id="footer-left" class="alignleft"><?php
    echo apply_filters( 'admin_footer_text',
            '<span id="footer-thankyou">' . __( 'Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.', 'wpcf' ) . '</span>' );

    ?></p>
<!--    <p id="footer-upgrade" class="alignright"><?php //echo apply_filters( 'update_footer', '' ); ?></p>-->
    <div class="clear"></div>
</div>
<?php
do_action( 'admin_footer', '' );
do_action( 'admin_print_footer_scripts' );
do_action( "admin_footer-" . $GLOBALS['hook_suffix'] );

// get_site_option() won't exist when auto upgrading from <= 2.7
//if ( function_exists( 'get_site_option' ) ) {
//    if ( false === get_site_option( 'can_compress_scripts' ) )
//        compression_test();
//}

?>

<div class="clear"></div></div><!-- wpwrap -->
</div><!-- #wpcf-ajax -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
