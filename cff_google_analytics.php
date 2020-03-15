<?php
/**
 * Plugin Name: Beth the Web Builder Google Analytics
 * Description: Beth the Web Builder Google Analytics
 * Version: 1.0
 * Author: Bethany Fowler
 * Author URI: http://bethanyfowler.me/
 */

function btwb_google_analytics() {?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="<?php echo get_option('google_analytics_src'); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php echo get_option('google_analytics_tag'); ?>');
  </script>

<?php }
add_action('wp_head', 'btwb_google_analytics');
