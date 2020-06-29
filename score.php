<?php
require_once('scoreService.php');
require_once('navbar.php');
$ss = new ScoreService();
$query = $ss->GetScore();
?>
<div style="text-align:center;">
    <h2>Scoreboard</h2>
    <table class="table table-striped" style="width: 40%;">
        <thead>
            <tr>
                <th scope="col">username</th>
                <th scope="col">score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i = 0; $i<count($query[0]); $i++){ 
                echo '<tr>';
                echo '<td>' . $query[0][$i] . '</td><td>' . $query[1][$i]. '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>