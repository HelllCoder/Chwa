<?php
session_start;
function printr ($e, $ret=false) {
	$r = "<pre>".print_r($e,1)."</pre>";
	if ($ret) return $r;
	echo $r;
}

	$_SESSION['finished'] = 5;
	$_SESSION['unfinished'] = 5;
	$_SESSION['complete'] = 10;

	$_SESSION['finished'] = $_POST['finished'];
	$_SESSION['unfinished'] = $_POST['unfinished'];

$_SESSION['complete'] = $_SESSION['finished'] + $_SESSION['unfinished'];
$prc =  ($_SESSION['finished'] / $_SESSION['complete'])*100;
?>
<header class="subhead">
	<div class="container">
    </div>
</header>
<div class="container" style="padding-top:10px;">
    <div id="data" style="display:none; margin-top:20px;">
	<?php printr($_SESSION); ?>
    </div>
	<div class="progress progress-striped active" style="margin-top:5px;">
    	<div class="bar" style="width: <?=$prc?>%;"><?=$prc?>%</div>
    </div>
    <div id="form" style="display:none; margin-top:20px;">
        <form class="form-horizontal" action="" method="post">
        <fieldset>
            <div class="control-group" id="fieldFinished">
                <label class="control-label" for="inputFinished">Dokončeno</label>
                <div class="controls">
                    <input type="text" name="finished" id="inputFinished" required>
                </div>
            </div>
            <div class="control-group" id="fieldUnfinished">
                <label class="control-label" for="inputUnfinished">Zbývá</label>
                <div class="controls">
                    <input type="text" name="unfinished" id="inputUnfinished">
                </div>
            </div>
            <div class="form-actions">
            </div>
        </fieldset>
        </form>
    </div>
</div>
<script src="/js/jquery.js" ></script>
<script src="/css_test/bootstrap.js"></script>
<script>
$("#formAccess").click(function() {
	$("#form").slideToggle();
});
$("#dataAccess").click(function() {
	$("#data").slideToggle();
});
</script>
