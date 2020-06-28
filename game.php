<?php
require_once('gameModel.php');
$game = new GameModel();
require_once('navbar.php');

?>
<div class="game">
    <table id="board">
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
    <div class="score">
    <button type="button" class="btn btn-warning" id="finished" style="visibility: hidden;">Score board</button>
    </div>
</div>
</body>

</html>