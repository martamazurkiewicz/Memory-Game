<?php
require_once('navbar.php');
?>
<div style="text-align:center;">
    <img src="memorygame.jpg">
    <h4> Memory game with self drown pictures. Written mostly in php. </h4>
    <button type="button" class="btn btn-warning btn-lg" style="width: 160px;" onClick="document.location.href='game.php'">Play</button>
    <?php
    if (!isset($_SESSION['username'])) {
    ?>
        <p> or </p>
        <button type="button" class="btn btn-primary" style="width: 100px;" onClick="document.location.href='login.php'">Sign In</button>
        <button type="button" class="btn btn-primary" style="width: 100px;" onClick="document.location.href='register.php'">Sign Up</button>
    <?php
    }
    ?>
    </form>
</div>
</body>

</html>