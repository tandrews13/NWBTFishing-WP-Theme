<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WalleyeLeague
 */

get_header();
error_reporting(E_ALL);

?>
<div style="color:white">
<?php
for($n=0;$n<15;$n++) {
  if(isset($_POST['team-name'][$n])) {
    echo 'Data changed for '.$_POST['team-name'][$n]. ':</br>';
    for($i=0; $i < 15; $i++) {

      $weekNum = $i + 1;
      
      if(get_field('week_'.$weekNum.'_length',$_POST['post-id'][$n]) != $_POST['week'.$weekNum.'weight'][$n]) :
        echo 'Old Week '.$weekNum.' Weight: '.get_field('week_'.$weekNum.'_length',$_POST['post-id'][$n]).'</br>';
        echo 'Entered Value for Week '.$weekNum.' Weight: '.$_POST['week'.$weekNum.'weight'][$n].'</br>-</br>';
        update_field('week_'.$weekNum.'_length',$_POST['week'.$weekNum.'weight'][$n],$_POST['post-id'][$n]);
      endif;

      if(get_field('week_'.$weekNum.'_points',$_POST['post-id'][$n]) != $_POST['week'.$weekNum.'points'][$n]) :
        echo 'Old Week '.$weekNum.' Points: '.get_field('week_'.$weekNum.'_points',$_POST['post-id'][$n]).'</br>';
        echo 'Entered Value for Week '.$weekNum.' Points: '.$_POST['week'.$weekNum.'points'][$n].'</br><p>';
        update_field('week_'.$weekNum.'_points',$_POST['week'.$weekNum.'points'][$n],$_POST['post-id'][$n]);
      endif;
      
    }
  }
}




get_sidebar();
get_footer();


