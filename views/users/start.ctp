<h2><?php echo __("Your information"); ?></h2>

<p>&nbsp;</p>
<div id="resume">
    <?php
    foreach($results as $result) {
        $total = $result['incoming'] - $result['outgoing'];
        echo "<div>";
        echo "<h3>{$result['name']} ( {$total} )</h3>";
        echo "</div>";
    }
    ?>
</div>