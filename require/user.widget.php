<?php 
class lethil_user_widget extends WP_Widget {
  function __construct() {
    parent::__construct(
      // ID
      'lethil_user_widget', 
      // Name
      'User',
      // Description
      array( 
        'description' => 'Login, Avatar & RSS!'
      ) 
    );
  }
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    // if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    ?>
    <ul>
    <?php if ( is_user_logged_in() ) : $user = wp_get_current_user(); ?>
      <li class="user">
        <div>
          <?php 
            if (is_numeric($instance['avatar']) and $instance['avatar'] > 0) {
              echo get_avatar($user->ID, $instance['avatar']); 
            }
            echo str_replace('Site Admin',$user->display_name,wp_register('','',0));
          ?>
        </div>
      </li>
      <li class="logout"><?php wp_loginout(); ?></li> 
    <?php else: ?>
      <li class="login"><?php wp_loginout(); ?></li> 
      <?php wp_register('<li class="register">', '</li>'); ?> 
    <?php endif; ?>
    <?php 
    switch ($instance['rss']) : 
      case 1 : ?>
        <li class="rss entries">
          <a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate using RSS'); ?>">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
        </li>
        <li class="rss feed">
          <a href="<?php bloginfo('comments_rss2_url'); ?>" target="_blank">Comments <abbr title="Really Simple Syndication">RSS</abbr></a> 
        </li>
      <?php break; case 2 : ?>
        <li class="rss entries">
          <a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate using RSS'); ?>">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
        </li>
      <?php break; case 3 : ?>
        <li class="rss feed">
          <a href="<?php bloginfo('comments_rss2_url'); ?>" target="_blank">Comments <abbr title="Really Simple Syndication">RSS</abbr></a> 
        </li>
      <?php break; 
    endswitch; ?>
    </ul>
    <?php
    echo $args['after_widget'];
  }
  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( 'Dashboard', 'lethil' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'avatar' ); ?>">Avatar size ($ > 0)=NO</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'avatar' ); ?>" name="<?php echo $this->get_field_name( 'avatar' ); ?>" type="text" value="<?php echo esc_attr($instance['avatar']); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Really Simple Syndication' ); ?></label> 
      <select class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>">
        <option value="0" <?php selected(0, $instance['rss']); ?>>None</option>
        <option value="1" <?php selected(1, $instance['rss']); ?>>Entries and Comments</option>
        <option value="2" <?php selected(2, $instance['rss']); ?>>Entries only</option>
        <option value="3" <?php selected(3, $instance['rss']); ?>>Comments only</option>
      </select>
    </p>
  <?php 
  }
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';
    $instance['avatar'] = ( ! empty( $new_instance['avatar'] ) ) ? strip_tags( $new_instance['avatar'] ) : '';
    return $instance;
  }
}

// Register and load the widget
function lethil_user_widget_load() {
	register_widget( 'lethil_user_widget' );
}
add_action( 'widgets_init', 'lethil_user_widget_load' );
?>