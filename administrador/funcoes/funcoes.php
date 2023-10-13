<?php
function mediaEstrelasDeAvaliacao($media_avaliacoes){
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $media_avaliacoes) {
            echo '<span class="star" data-rating="' . $i . '" style="color: yellow;">&#9733;</span>';
        } else {
            echo '<span class="star" data-rating="' . $i . '">&#9733;</span>';
        }
    }
}
?>