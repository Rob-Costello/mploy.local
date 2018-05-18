
<ul  class="nav nav-pills nav-background">

<?php foreach($tabs as $key => $tab): ?>
	<?php $class=""; ?>
	<?php if ( $tab!=="" && strpos($_SERVER['REQUEST_URI'],$tab)!==false ) $class= 'class="active"';  ?>

	<li <?php echo $class; ?> >
			<a href="/youngpeople/view/<?php echo $id?>/<?php echo $tab; ?>" > <?php echo $key; ?> </a>
		</li>

<?php endforeach ?>



</ul>
