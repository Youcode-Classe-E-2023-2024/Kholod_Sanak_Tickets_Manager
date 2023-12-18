<?php
require_once "../../model/Tag.php";
$TagModel = new Tag();

$tags = $TagModel->getAllTags();

// Display tags
foreach ($tags as $tag) {
    echo '<div class="tag-container">
            <span class="tag">' . $tag->libelle . '</span>
          </div>';
}
?>
