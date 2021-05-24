

<?php 
$args = array (
    'category' => array(2,3,)
);

$team_loop = new WP_Query($args);

while ( $team_loop->have_posts() ) : $team_loop->the_post(); 

$teamImage = get_field('team_image');

?>

    <div class="team">
        <div class="teamheader">
            <img class="teamimage" src=""<?php echo esc_url($teamImage['url']); ?>"" alt="Team Image">
            <h5>Team 1</h5> 
            
            <div class="rank">
                <div class="ranknumber">
                    <h3>2</h3>
                </div>
                <p>RANK</p>
            </div>    
        </div>
        <div class="teamstats">
            <h5>Results</h5>
            <div class="weeklystats">
                <div class="statrow"><div class="week">Week 1:</div><div class="score">100 inches</div></div>
                <div class="statrow"><div class="week">Week 2:</div><div class="score">50 inches</div></div>
                <div class="statrow"><div class="week">Week 3:</div><div class="score">34 inches</div></div>
                <div class="statrow"><div class="week">Week 4:</div><div class="score">71 inches</div></div>
                <div class="statrow"><div class="week">Week 5:</div><div class="score">15 inches</div></div>
                <div class="statrow"><div class="week">Week 6:</div><div class="score">66 inches</div></div>
                <div class="statrow"><div class="week">Week 7:</div><div class="score">45 inches</div></div>
                <div class="statrow"><div class="week">Week 8:</div><div class="score">105 inches</div></div>
            </div>
        </div>    
    </div>

<?php endwhile; ?>    