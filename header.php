<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WalleyeLeague
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Neucha&family=Passion+One&family=BenchNine:wght@300&family=Encode+Sans&display=swap" rel="stylesheet">
  <title>Northwoods Fishing Leagues</title>
  <?php wp_head(); ?>
</head>

<body>

  <div class="vidcontainer">
    <video class="videobackground" autoplay muted loop>
      <source src="https://nwbtfishing.club/wp-content/uploads/2021/04/walleyes_short.mp4">
    </video>
    <div class="pagetitle">
        
      <h3>Northwoods Bait & Tackle</h3>
      <h1>Fishing Leagues</h1>
    </div>
    <div class="leaguenav-hr"></div>
    <nav class="leaguenav">
      <div class="menuitem">
        <a href="/tuesday-walleye"><p>Tuesday</p></a>
      </div>
      <div class="menuitem">
      <a href="wednesday-bass"><p>Wednesday</p></a>
      </div>
      <div class="menuitem">
      <a href="/thursday-walleye"><p>Thursday</p></a>
      </div>
      <div class="menuitem">
        <p>Champs</p>
      </div>
      <!-- Wait until rules are complete
      <div class="menuitem">
        <a href="/league-rules"><p>Rules</p></a>
      </div> 
      -->
      <div class="menuitem">
      <a href="/photo-board"><p>Photos</p></a>
      </div>
    

    </nav>
  </div>
