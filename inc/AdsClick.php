
<?php
add_shortcode( "ads_show_post_id", array( 'utechiaads_shortcode_class', 'utechia_ads_shortcode_callback' ) );
class utechiaads_shortcode_class {

    public static function utechia_ads_shortcode_callback( $atts ) {

    $args = array(
        'post_type' => 'ads',
        'post__in'=>$atts,
        'post_status' => 'publish');
        $loop = new WP_Query( $args ); 
            
        while ( $loop->have_posts() ) : $loop->the_post(); 
                return "<a href='".get_the_permalink()."' post-id='". get_the_ID() ."'  class='widget-utechia-ads'><img class='img-fluid' src='".get_the_post_thumbnail_url() ."' ></img></a>";


        endwhile;
    
        wp_reset_postdata(); 
      
    }
     
    }


///update post meta 

add_action('wp_ajax_Utechia_Clicks_Ads', 'Utechia_Clicks_Ads');
add_action('wp_ajax_nopriv_Utechia_Clicks_Ads', 'Utechia_Clicks_Ads');

function Utechia_Clicks_Ads() {

    if (  isset( $_POST['post_id'] ) && isset($_POST['action']) )
     {
        $count = get_post_meta( $_POST['post_id'], 'Clicks', true );
        $count=esc_html($count);
        update_post_meta( sanitize_text_field($_POST['post_id']), 'Clicks', ( $count === '' ? 1 : $count + 1 ) );
    }
    exit();

}

///update post meta 


add_action( 'wp_head', 'Ads_ajax_link_click_head' );
function Ads_ajax_link_click_head()
 {
    // Global $wp_query;
    // if (get_post_type($wp_query->post->ID)=='ads') {
    //  ?>
      <script>
    //   jQuery(function ($) {
    //       $('article.type-ads').children().find('a.post-thumbnail-inner').addClass('utechia-ads');
    //   });
    //   </script>
      <?php
    // }
     ?>
    <script type="text/javascript" >
  
     jQuery(function ($) { 
       
        var ajax_options = 
        {
            action: 'Utechia_Clicks_Ads',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php'); ?>',
        };
            
            //Elementor widget

        $( 'a.widget-utechia-ads' ).on( 'click', function(e) 
        {
            var self = $( this );
            var postid=self.attr('post-id');
            ajax_options['post_id']= postid;
            $.post( ajax_options.ajaxurl, ajax_options, function() {
               window.location.href = self.attr( "href" );
            });
            return false;
        });

         //post type Element

        $( 'a.utechia-ads' ).on( 'click', function(e) 
        {
            e.preventDefault();
            var self = $( this );
            post_id=$(this).parent().closest("article").attr('id');
            post_id = post_id.replace('post-','');
           self.attr('post-id',post_id);
            postid=self.attr('post-id');
            ajax_options['post_id']=postid ;
            $.post( ajax_options.ajaxurl, ajax_options, function() {
               window.location.href = self.attr( "href" );
            });
            return false;
        });
    });

    </script>
<?php
    }