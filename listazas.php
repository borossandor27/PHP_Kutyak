<h1>Regisztrált kutyák listája</h1>
<table class="table-striped col-6">
    <thead>
        <tr>
            <th>id</th>
            <th>Név</th>
            <th>Fajta</th>
            <th>Született</th>
            <th>Magasság</th>
            <th>Neme</th>
        </tr>
    </thead>
    <tbody>
    <?php
    require_once './connect.php';
    $sql = "SELECT `id`,`nev`,`fajta`,`szuletett`,`testsuly`,`nem` FROM `kutyak` WHERE 1";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["id"]."</td>";
        echo '<th>'.$row["nev"]."</th>";
        echo '<td>'.$row["fajta"]."</td>";
        echo '<td>'.$row["szuletett"]."</td>";
        echo '<td>'.$row["testsuly"]."</td>";
        echo '<td>'.$row["nem"]."</td>";
        echo '</tr>';
    }

    ?>
    </tbody>

</table>