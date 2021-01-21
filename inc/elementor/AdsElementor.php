<?php
use Elementor\Widget_Base;
class AdsElementor extends Widget_Base
{

    public $domain = 'AdsElementor';


    public function get_name()
    {
        return 'AdsElementor ';
    }

    public function get_title()
    {
        return __('AdsElementor', $this->domain);
    }

    public function get_icon()
    {
        return 'fa fa-gg-circle';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [

                'label' => __( 'Content', '$this->domain' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $args = array('post_type' => 'ads',
            'post_status' => 'publish');

        $loops = new WP_Query( $args ); 
        $options=[];
        $adverts=$loops->get_posts($args);
        foreach ($adverts as $key=>$item){
        $options[$item->ID]=$item->post_title;
          
        }
		$this->add_control(
			'AdsElimgID',
			[
				'label' => __( 'ADS', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
                'options' =>   $options ,
			]
		);
        $this->end_controls_section();

    }

    protected function render()
    {
        $id = $this->get_settings_for_display('AdsElimgID');
        $post=get_post($id);
        $img=get_the_post_thumbnail_url($id);
        $url = get_post_meta( $post->ID, '_utechia_Adress_meta_key', true );
        ?>
        <a class="widget-utechia-ads" href="<?= $url; ?>" post-id="<?= $id ; ?>">
        <img class="img-fluid" src="<?= $img ?>"></img>
        </a>
        <?php
    }
}