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

    <h4>Wednesday Night Bass League</h4>
    <section class="teamcontainer">
        
    <?php
    $leaderboardposition = 1;
    foreach(seasonLeaders(5,6) as $teamkey=>$pointvalue) {
        $team_loop = new WP_Query(array( 'p' => $teamkey ) );
        
        while ( $team_loop->have_posts() ) : $team_loop->the_post(); 
        
        $teamImage = get_field('team_image');
    ?>
            <div class="team">
                <div class="teamheader">
                    <img class="teamimage" src="<?php the_field('team_image'); ?>" alt="Team Image">
                    <h5>
                      <?php the_title(); ?>
                    </h5> 
                    
                    <div class="rank">
                        <div class="ranknumber">
                            <h3>
                              <?php echo $leaderboardposition ?>
                            </h3>
                        </div>
                        <p>RANK</p>
                    </div>   
                    <div class="topTen">
                        <p>Best 10:</p>                
                    </div>
                    <div class="topTen-points">
                       <p> <?php echo totalPoints(); ?> points</p>
                    </div>
                </div>
                <div class="teamstats" id="style-3">
                    <h5>Results</h5>
                    <div class="weeklystats">
                        
                            <?php 
                            for ($i = 1; $i <= 15; $i++) { ?>
                                <div class="statrow">  
                                    <div class="week">Week <?php echo $i ?>:</div>
                                    <div class="score"><?php echo the_field('week_' . $i . '_length') ?> pounds</div>
                                    <div class="points"><?php echo the_field('week_' . $i . '_points') ?> points</div>
                                </div>
                            <?php } ?>                    
                    </div> 
                   
                </div>
            </div>
        <?php endwhile; 
        $leaderboardposition++;
      }?>   
       
    </section> /**End of TeamContainer */
  </main>



<?php
get_sidebar();
get_footer();


