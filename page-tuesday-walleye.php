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

    <h4>Tuesday Night Walleye League Testing</h4>
    <section class="teamcontainer">
        
        <?php 
        $team_loop = new WP_Query(array( 'category__and' => array( 5, 4 ) ) );
        
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
                            <?php $rankClass = 'ranknumbervalue' . get_the_id(); ?>
                            <h3 class="<?php echo $rankClass; ?>">
                             
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
                    <div class="hidden-rank">
                      <?php $hiddenRankClass = 'hiddenrankvalue' . get_the_id(); ?>
                      <p class="<?php echo $hiddenRankClass ?>"><?php echo teamRank(get_the_title(),5,4); ?></p>
                      <script type="text/javascript">
                          document.querySelector('<?php echo "." . $rankClass; ?>').textContent = document.querySelector('<?php echo "." . $hiddenRankClass; ?>').textContent;
                      </script>
                    </div>   
                </div>
            </div>
        <?php endwhile; ?>   
       
    </section> /**End of TeamContainer */
  </main>



<?php
get_sidebar();
get_footer();

