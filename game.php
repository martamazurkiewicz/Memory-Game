<?php
require_once('gameModel.php');
$game = new GameModel();
require_once('navbar.php');

?>
<div class="game">
    <table>
        <tbody>
            <?php
            $i = 0;
            for ($row = 0; $row < 5; $row++) {
                echo '<tr>';
                for ($column = 0; $column < 4; $column++) {
                    echo '<td>';
                    echo '<button type="button" id="' . $row . $column . '" class="tile" onclick="Uncover(this.id)">';
                    echo '<img src="tiles/' . $game->tiles[$i] . '.jpg" name="' . $game->tiles[$i] . '" style="visibility: hidden;width: 100%;">';
                    echo '</button>';
                    echo '</td>';
                    $i++;
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <div id="scoreDiv" style="text-align:center;">
        Score: 20
    </div>
    <div style="text-align:center; width:10%;margin:30px auto;">
        <form action="POST" action="score.php">
            <input type="text" id="score" name="score" style="visibility: hidden;"></input>
            <button type="submit" class="btn btn-warning" id="finished" style="visibility: hidden;">Scoreboard</button>
        </form>
    </div>
</div>
</body>

</html>