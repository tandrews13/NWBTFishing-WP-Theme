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

    <h4>Thursday Night Walleye League</h4>
    <section class="weekly-lake">
    <div class="weekly-lake-header">WEEKLY LAKE</div>
        <?php
            $lake_loop = new WP_Query( array('cat' => 7));
                while( $lake_loop ->have_posts() ) : $lake_loop->the_post();
                 ?>
                    <div class="lakedisplay">  
                    <?php for ($i = 1; $i <= 15; $i++) { ?>
                        <?php if (get_field('week_' . $i)) { ?>
                            <div class="lake-week"><div class="lakenumber-left"></div><div class="lake-week-number"><?php echo $i ?></div> <div class="lake-name"><?php echo '<a href="/week-results?week='.$i . '&cat1=3&cat2=5&lakepost=635">'?><?php echo the_field('week_' . $i) ?></a></div></div>
                        <?php } ?>
                    <?php } ?>
                    </div>
                <?php
                endwhile;
        ?>
    </section>

    <section class="teamcontainer">
    <div class="weekly-lake-header">TEAM STANDINGS</div>
    <?php
    $leaderboardposition = 1;

     /** 
     * Calls the seasonLeaders function in functions.php which loops through all posts for the specific categories and returns
     * them in an array.  $leaderboardposition starts at 1 to set the Rank for the first team in the array (should be top points team)
     * and then increments by 1 after the while loop for each post found.
     */

    foreach(seasonLeaders(5,3) as $teamkey=>$pointvalue) {
      //this loop just searches for a single post by the current ID pulled from the seasonLeaders array
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
                    <div class='teamname'>
                        <p><?php echo the_field('team_name'); ?></p>
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
                            //Each Team Post has 15 pairs of Advanced Custom Fields for weight and score.
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


