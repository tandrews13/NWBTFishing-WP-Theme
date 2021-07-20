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

<main>

    <h4>Tuesday Night Walleye League</h4>
  
    <form action="https://nwbtfishing.club/update-scores/" method="post">
      <table class="mass-edit">
        <tr>
          <th style="color:white">Team</th>
          <?php
          for($k=1;$k<=15;$k++) {
            ?>
            <th style="color:white" colspan="2"><?php echo 'Week '. $k ?></th>
            <?php
          }
          ?>

        </tr>
        <?php
        /* Start the Loop */
        $tuesday_loop = new WP_Query(array( 'category__and' => array(5, 4 ) ) );

          while( $tuesday_loop ->have_posts() ) : $tuesday_loop->the_post();

            $teamName = get_the_title();
            $postID = get_the_ID();
            for($i=1;$i<=15;$i++) {
              $weekWeight[$i] = get_field('week_' . $i . '_length');
              $weekPoints[$i] = get_field('week_' . $i . '_points');
            }
          ?>
              <tr>
                <td><input style="width:100px;"type="text" name="team-name[]" value="<?php echo $teamName ?>"></td>
                <?php
                for($j=1;$j<=15;$j++) {
                  ?>
                  <td><input style="width:35px;" type="text" name='<?php echo 'week'.$j.'weight[]' ?>' value="<?php echo $weekWeight[$j] ?>"></td>
                  <td><input style="width:15px;" type="text" name='<?php echo 'week'.$j.'points[]' ?>' value="<?php echo $weekPoints[$j] ?>"></td>
                  <?php
                }
                ?>
                <td><input style="width:20px;" type="text" name="post-id[]" readonly="readonly" value="<?php echo $postID ?>"></td>
              </tr>
          <?php

          endwhile;
          ?>
          
          
        </table>
      <input type="submit" value="Save">
  </form>





  <h4 style="margin-top:30px">Wednesday Night Bass League</h4>
  
  <form action="https://nwbtfishing.club/update-scores/" method="post">
    <table class="mass-edit">
      <tr>
        <th style="color:white">Team</th>
        <?php
        for($k=1;$k<=15;$k++) {
          ?>
          <th style="color:white" colspan="2"><?php echo 'Week '. $k ?></th>
          <?php
        }
        ?>

      </tr>
      <?php
      /* Start the Loop */
      $tuesday_loop = new WP_Query(array( 'category__and' => array(5, 6 ) ) );

        while( $tuesday_loop ->have_posts() ) : $tuesday_loop->the_post();

          $teamName = get_the_title();
          $postID = get_the_ID();
          for($i=1;$i<=15;$i++) {
            $weekWeight[$i] = get_field('week_' . $i . '_length');
            $weekPoints[$i] = get_field('week_' . $i . '_points');
          }
        ?>
            <tr>
              <td><input style="width:100px;"type="text" name="team-name[]" value="<?php echo $teamName ?>"></td>
              <?php
              for($j=1;$j<=15;$j++) {
                ?>
                <td><input style="width:35px;" type="text" name='<?php echo 'week'.$j.'weight[]' ?>' value="<?php echo $weekWeight[$j] ?>"></td>
                <td><input style="width:15px;" type="text" name='<?php echo 'week'.$j.'points[]' ?>' value="<?php echo $weekPoints[$j] ?>"></td>
                <?php
              }
              ?>
              <td><input style="width:20px;" type="text" name="post-id[]" readonly="readonly" value="<?php echo $postID ?>"></td>
            </tr>
        <?php

        endwhile;
        ?>
        
        
      </table>
    <input type="submit" value="Save">
</form>


<div> </div>


<h4 style="margin-top:30px">Thursday Night Walleye League</h4>
  
  <form action="https://nwbtfishing.club/update-scores/" method="post">
    <table class="mass-edit">
      <tr>
        <th style="color:white">Team</th>
        <?php
        for($k=1;$k<=15;$k++) {
          ?>
          <th style="color:white" colspan="2"><?php echo 'Week '. $k ?></th>
          <?php
        }
        ?>

      </tr>
      <?php
      /* Start the Loop */
      $tuesday_loop = new WP_Query(array( 'category__and' => array(5, 3 ) ) );

        while( $tuesday_loop ->have_posts() ) : $tuesday_loop->the_post();

          $teamName = get_the_title();
          $postID = get_the_ID();
          for($i=1;$i<=15;$i++) {
            $weekWeight[$i] = get_field('week_' . $i . '_length');
            $weekPoints[$i] = get_field('week_' . $i . '_points');
          }
        ?>
            <tr>
              <td><input style="width:100px;"type="text" name="team-name[]" value="<?php echo $teamName ?>"></td>
              <?php
              for($j=1;$j<=15;$j++) {
                ?>
                <td><input style="width:35px;" type="text" name='<?php echo 'week'.$j.'weight[]' ?>' value="<?php echo $weekWeight[$j] ?>"></td>
                <td><input style="width:15px;" type="text" name='<?php echo 'week'.$j.'points[]' ?>' value="<?php echo $weekPoints[$j] ?>"></td>
                <?php
              }
              ?>
              <td><input style="width:20px;" type="text" name="post-id[]" readonly="readonly" value="<?php echo $postID ?>"></td>
            </tr>
        <?php

        endwhile;
        ?>
        
        
      </table>
    <input type="submit" value="Save">
</form>


<?php
get_sidebar();
get_footer();


