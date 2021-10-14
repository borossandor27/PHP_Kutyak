<?php 
if(filter_input(INPUT_POST, "VannakAdataok",FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    // 'Vannak adatok';
    $nev = filter_input(INPUT_POST, "nev", FILTER_SANITIZE_STRING);
    
    $fajta = filter_input(INPUT_POST, "fajta", FILTER_SANITIZE_STRING);
    
    $szuletett = filter_input(INPUT_POST, "szuletett", FILTER_SANITIZE_STRING);
    $szuletett = new DateTime($szuletett);
    $szuletett = $szuletett->format("Y-m-d");
//    var_dump($szuletett);

    $testsuly = filter_input(INPUT_POST, "testsuly", FILTER_SANITIZE_STRING);
    $testsuly = str_replace( ",",".", $testsuly);
    $testsuly = filter_var($testsuly, FILTER_VALIDATE_FLOAT);
//    var_dump($testsuly);


    $nem = filter_input(INPUT_POST, "nem", FILTER_SANITIZE_STRING);
    require_once './connect.php';
    $sql = "INSERT INTO `kutyak` (`id`, `nev`, `fajta`, `szuletett`, `testsuly`, `nem`) VALUES (NULL, ?, ?, ?, ?, ?);";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssds',$nev, $fajta,$szuletett,$testsuly,$nem );
    $stmt->execute();
}
?>


<h1>Új kutya</h1>
<form method="POST">
    <div class="form-group">
        <label for="nev">Kutya neve</label>
        <input type="text" class="form-control" id="nev" name="nev"  placeholder="A kutya neve">
    </div>
    <div class="form-group">
        <label for="fajta">Kutya fajtája</label>
        <input type="text" class="form-control" id="fajta" name="fajta"  placeholder="A kutya fajtája">
    </div>
    <div class="form-group">
        <label for="szuletett">Születési ideje</label>
        <input type="date" class="form-control" id="szuletett" name="szuletett"  placeholder="Születési dátuma" required >
    </div>
    <div class="form-group">
        <label for="testsuly">Kutya fajtája</label>
        <input type="text" class="form-control" id="testsuly" name="testsuly"  placeholder="A kutya súlya" required />
    </div>
   <div class="form-row align-items-center">
    <div class="col-12 my-1"> <!-- m- margin y - fuggőlegesen 1 egység távolság a többi elemtől -->
      <label class="mr-sm-2" for="nem">Neme</label>
      <select class="custom-select mr-sm-2" id="nem" name="nem">
        <option selected>Válasszon...</option>
        <option value="szuka">szuka</option>
        <option value="kan">kan</option>
      </select>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2" name="VannakAdataok" value="true">Rögzítés</button>
    </div>
</form>