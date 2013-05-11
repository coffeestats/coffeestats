<?php
include('auth/lock.php');
include_once('includes/common.php');
include_once('includes/validation.php');
include_once('includes/jsvalidation.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['coffeetime']) && (($coffeetime = sanitize_datetime($_POST['coffeetime'])) !== FALSE)) {
        register_coffee($_SESSION['login_id'], $coffeetime);
    }
    elseif (isset($_POST['matetime']) && (($matetime = sanitize_datetime($_POST['matetime'])) !== FALSE)) {
        register_mate($_SESSION['login_id'], $matetime);
    }
    else {
        errorpage(
            'Bad Request',
            'Your request contained bad data',
            '400 Bad Request');
    }
}
include("header.php");
?>
<div class="white-box">
    <h2>Coffee?</h2>
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="coffeeform" class="inlineform">
        <div>
            <img src="images/revert.png" alt="toggle coffee time input" class="toggle" data-toggle="coffeetime" />
            <input type="submit" value="Coffee!" />
            <input type="text" id="coffeetime" name="coffeetime" placeholder="<?php echo date('Y-m-d H:i', time()); ?>" class="hiddeninput datetime_field" />
        </div>
    </form>
</div>

<div class="white-box">
    <h2>Mate?</h2>
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="mateform" class="inlineform">
        <div>
            <img src="images/revert.png" alt="toggle mate time input" class="toggle" data-toggle="matetime" />
            <input type="submit" value="Mate!" />
            <input type="text" id="matetime" name="matetime" placeholder="<?php echo date('Y-m-d H:i', time()); ?>" class="hiddeninput datetime_field" />
        </div>
    </form>
</div>
<script type="text/javascript" src="../lib/jquery.min.js"></script>
<?php js_sanitize_datetime(); ?>
<script type="text/javascript">
$(document).ready(function() {
    $('img.toggle').click(function(event) {
        $('#' + $(this).attr('data-toggle')).toggle();
    });
    $('#coffeeform').submit(function(event) {
        return sanitize_datetime('input#coffeetime');
    });
    $('#mateform').submit(function(event) {
        return sanitize_datetime('input#matetime');
    });
});
</script>
<?php
include('footer.php');
?>
