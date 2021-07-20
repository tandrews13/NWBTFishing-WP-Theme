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

  <h4>Weekly League Result</h4>
  <?php
  $cat1 = $_GET['cat1'];
  $cat2 = $_GET['cat2'];
  $week = $_GET['week'];
  $lakeName = get_field('week_'.$week,$_GET['lakepost']);
  $sortArray = array();
  ?>
  
  <div class="weekly-results">
    <div class="weekly-results-title">Week <?php echo $week ?> Results - <?php echo $lakeName?></div>
    
      <?php
      
        $results_loop = new WP_Query(array( 'category__and' => array( $cat1, $cat2 ) ) );
    
          while ( $results_loop->have_posts() ) : $results_loop->the_post(); 

          
              $team = get_the_title();
              $weight = get_field('week_'.$week.'_length');
              $points = get_field('week_'.$week.'_points');

              $sortArray[] = array(
                'team' => $team,
                'weight' => $weight,
                'points' => $points
              );

          endwhile;

            usort($sortArray, function($a, $b) {
              return $a['points'] <=> $b['points'];
            });
            
            $numTeams = count($sortArray);

            

                for($i=count($sortArray);$i >= 1; $i--) {
                  $indexNum = $i - 1;

                ?>
                  <div class="weekly-results-teams">
                <?php
      
                  if ($i == 1) :
                    echo '<div class="wrt-1">'.$sortArray[$indexNum]['team'] . '</div><div class="wrt-2 borderbottom"> Weight:<span class="limecolor"> '.$sortArray[$indexNum]['weight'].'</span></div><div class="wrt-3 borderbottom"> Points:<span class="limecolor"> '.$sortArray[$indexNum]['points'].'</span></div>';
                  elseif($i == count($sortArray)):
                    echo '<div class="wrt-1-nobordertop">'.$sortArray[$indexNum]['team'] . '</div><div class="wrt-2"> Weight:<span class="limecolor"> '.$sortArray[$indexNum]['weight'].'</span></div><div class="wrt-3"> Points:<span class="limecolor"> '.$sortArray[$indexNum]['points'].'</span></div>';
                  else:    
                    echo '<div class="wrt-1">'.$sortArray[$indexNum]['team'] . '</div><div class="wrt-2"> Weight:<span class="limecolor"> '.$sortArray[$indexNum]['weight'].'</span></div><div class="wrt-3"> Points:<span class="limecolor"> '.$sortArray[$indexNum]['points'].'</span></div>';
                  endif;

                ?>
                  </div>
                <?php
                  }

                ?> 
      
      
   
  </div>
</main>

<?php

get_sidebar();
get_footer();