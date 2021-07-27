
<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/head.php"); ?>

<br/>
<br/>
<div class="row">
	<div class="col-xl-12">
		<h3 class="main-info">
            <?php
                if (!isset($_GET['type'])) {
                    $_GET['type'] = 'vanilla';
                }
                if ($_GET['type'] == 'vanilla') {
                    echo 'These worlds were generated without mods.';
                } else if ($_GET['type'] == 'rnwimod') {
                    echo 'These worlds were generated using Random New World Improvements mod.';
                }
            ?>
			<br/>
			<br/>
        </h3>
    </div>
</div>


<div class="row">
	<div class="col-xl-12">

        <?php
            $ITEMS_PER_PAGE = 40;

            $save_dir = "";
            if ($_GET['type'] == 'vanilla') {
                $save_dir = "vanilla";
            } else if ($_GET['type'] == 'rnwimod') {
                $save_dir = "rnw_mod";
            }

            $dir = new DirectoryIterator(dirname("public/saves/" . $save_dir . "/."));
            $len = iterator_count($dir);
            $max_pages = floor($len / $ITEMS_PER_PAGE);

            $start_index = 0;
            if (isset($_GET['page'])) {
                $page = max(0, $_GET['page']);
                $page = min($_GET['page'], $max_pages);

                $start_index = $ITEMS_PER_PAGE * ($page-1);
            } else {
                $_GET['page'] = 1;
            }

            $dirs = [];
            foreach ($dir as $fileinfo) {
                if (!$fileinfo->isDot()) {
                    array_push($dirs, $fileinfo->getFilename());
                }
            }   

            usort($dirs, function ($a, $b) {
                return (int)$a - (int)$b;
            });

            foreach (array_slice($dirs, $start_index, $ITEMS_PER_PAGE) as $filename) {
                $current_dir = "public/saves/" . $save_dir . "/" . $filename . '/'
                ?>

                <a href="/<?= $current_dir .  $filename . '.eu4' ?>">
                    <div class="row download-tile">
                        <div class="col-md-6">
                            <div class="preview-map-wrapper">
                                <img class="preview-map" src="<?= $current_dir .  $filename . '.png' ?>" ?/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p><?= $filename . '.eu4' ?></p>
                        </div>
                    </div>
                </a>        

                <?php
                
            }
        ?>

    </div>
</div>

<div class="row">
	<div class="col-xl-12">
        <div class="pages-main-container">
            <h4>Pages: </h4>
            <h4> 
                <?php foreach (range(1, $max_pages) as $page_no) { ?>
                    <?php $iscurrent = $page_no == $_GET['page']; ?>
                    <?php if (!$iscurrent) { ?>
                    <a href="?type=<?= $_GET['type'] ?>&page=<?= $page_no ?>">
                    <?php } ?>

                        <?= $page_no ?>
                    
                    <?php if (!$iscurrent) { ?>
                    </a>
                    <?php } ?>
                <?php } ?>
            </h4>
        </div>
    </div>
</div>












        
<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/foot.php"); ?>


        