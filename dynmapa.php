<?php
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
	<title>Dennyland</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="css/main.css" type="text/css" />

	<!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
		<script src="js/IE8.js" type="text/javascript"></script><![endif]-->	
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

</head>

<body id="index" class="home">
	
	<header id="banner" class="body">
		<h1><a href="#">__Dennyland__ <strong>Dennyland - český minecraft server v roce <ins>2021</ins></strong></a></h1>
		<nav><ul>
			<li><a href="index.php">Domů</a></li>
			<li><a href="pravidla.php">Pravidla</a></li>
			<li><a href="ateam.php">A-Team</a></li>
      <li><a href="novinky.php">Novinky</a></li>
      <li class="active"><a href="#">VIP</a></li>
      <li><a href="soc-site.php">Sociální Sítě</a></li>
		</ul></nav>
	</header>

<section id="comments" class="body">

<iframe src="http://zombie.hostify.cz:47399/" width="100%" height="1200">
  <p>Your browser does not support iframes.</p>
</iframe>

</section>
  
	<section id="comments" class="body">
	  <header>
			<h2>Komentáře</h2>
		</header>

    <ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
      <li class="no-comments">Buď první, který přidá Komentář.</li>
      <?php
        foreach ($comments as &$comment) {
          ?>
          <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">	
    				<footer class="post-info">
    					<abbr class="published" title="<?php echo($comment['date']); ?>">
    						<?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
    					</abbr>

    					<address class="vcard author">
    						Od <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
    					</address>
    				</footer>

    				<div class="entry-content">
    					<p><?php echo($comment['comment']); ?></p>
    				</div>
    			</article></li>
          <?php
        }
      ?>
		</ol>
		
		<div id="respond">

      <h3>Napište nám Komentář</h3>

      <form action="post_comment.php" method="post" id="commentform">

        <label for="comment_author" class="required">Jméno</label>
        <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
        
        <label for="email" class="required">Email</label>
        <input type="email" name="email" id="email" value="" tabindex="2" required="required">

        <label for="comment" class="required">Vaše zpráva</label>
        <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

        <input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
        <input name="submit" type="submit" value="Odeslat Komentář" />
        
      </form>
      
	</section>
	
	<footer id="contentinfo" class="body">
		
		<p>2021 <a href="#">Dennyland</a></p>
	</footer>

</body>
</html>