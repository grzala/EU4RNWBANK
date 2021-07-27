<!-- php -S localhost:8000 */ -->


<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/head.php"); ?>

<div class="row">
	<div class="col-xl-12">
		<h3 class="main-info">
			EU4 random new world is a place where you can preview and download interesting random new worlds instead of tediously generating them over and over.
			<br/>
			<br/>
			The maps can be downloaded as save files. The save files were made as Castile with the initial game conditions on the initial start date. Fantasy elements were set
			to frequent. All save games are made using version 1.31.5.
			Conquest of Paradise DLC is required, I had some other DLCs turned on while doing this, because I forgot to turn them off (lol sorry). I don't know if this is game breaking, but 
			if you have the DLC subscription it should work fine. 
			<br/>
			<br/>
			I experimented with other ways to do this, but there was no other way to recreate a once created new world. I tried recreating new worlds using seeds, but 
			even when using one seed the world was different each time. I don't know if this is intended behaviour of the game. 
			<br/>
			<br/>
			<br/>
			Choose on of the options below to check out the new worlds I generated.
			<br/>
			<br/>
		</h3>
	</div>
</div>


<div class="row">
	<div class="col-xl-12">
		<h1><a href="/worlds.php?type=vanilla">Random new worlds (no mods)</h1>
		<h1><a href="/worlds.php?type=rnwimod">Random new worlds (generated using Random New World Improvements mod)</h1>
		<!-- <h1><a href="/worlds.php?type=all">All worlds</h1> -->
	</div>
</div>

        
<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/foot.php"); ?>


        