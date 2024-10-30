<?php
/**
 * Plugin Name: Marketpress Count Sales Product
 * Description: Easily show off the total number of products, your Marketpress store has sold,in a shortcode.
 * Author: Subhash Nagda
 * Version:1.0
 */
function mp_count_sales(){
global $wpdb,$mp;
global $switched;
$blog_id = $GLOBALS['current_blog']->blog_id;
$main=0;

//$blog_list = get_blog_list( 0, 'all' );





    $table1 = $wpdb->get_blog_prefix($blog_id) . 'posts';

    $table2 = $wpdb->get_blog_prefix($blog_id) . 'postmeta';

    global $wpdb;

    $post_id = $wpdb->get_results("SELECT * FROM $table2 INNER JOIN $table1 ON $table2.post_id = $table1.ID  WHERE post_status = 'order_received' AND meta_key='mp_order_items' ");

		

                        for($i=0; $i<count($post_id); $i++){

		                $post_id[$i]->meta_value."</br>";

                        $main = $post_id[$i]->meta_value + $main;	

                        }



 ?>

<span class="total-sales-count"><?php echo $main; ?></span>


 
<?php } ?>

<?php add_shortcode('MPCSP', 'mp_count_sales'); ?>