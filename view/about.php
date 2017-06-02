<?php

$title = "About";
include "header.php"
?>

<div class="container content">
  <section class="section">
    <pre>
    <?php
    $json = file_get_contents('https://oc1.api.riotgames.com/lol/static-data/v3/champions?dataById=true&api_key=RGAPI-12409ba4-3bb9-44d8-abd3-46263eecc0f1');
    $data = json_decode($json, TRUE);
    print_r($data);
    ?>
    </pre>
  </section>
</div>

<?php
include "footer.php"
?>
