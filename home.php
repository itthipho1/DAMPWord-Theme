<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="styles.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<?php	
		global $NHP_Options;
		$NHP_Options->show('2');
		echo "<br />";
		$NHP_Options->show('editor2');
?>


<?php

if (has_nav_menu('top_menu')) {  
	 wp_nav_menu(	array(
					  'theme_location'  => 'top_menu',
					  'container'       => 'nav', 
					  'container_class' => 'inner', 
					  'container_id'    => 'topNav',
					  'menu_class'      => 'blueBar', 
					  'items_wrap'      => '<ul class="%2$s">%3$s</ul>' ) ); 
} else {
	
	
}					  

?>




</body>
</html>