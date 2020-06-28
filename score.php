<?php
require_once('scoreService.php');
require_once('navbar.php');
if (isset($_POST['score']))
    $tmpScore = $_POST['score'];
else
    $tmpScore = 0;
$ss = new ScoreService();
$stmt = $ss->GetScores($tmpScore);
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
            foreach ($stmt as $row) {
                echo '<tr>';
                echo '<td>' . $row['userName'] . '</td><td>' . $row['highestScore'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>