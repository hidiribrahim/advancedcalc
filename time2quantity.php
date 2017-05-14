<link rel="stylesheet" type="text/css" href="styles.css">

<?php
include 'parts.php';
$results = '';

// Check if a form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["partNum"])) {
      if($_POST["partNum"] == "Part1") {

        // open part 1
        $Part1 = new Part;
        $Part1->partNum = '46515563000';
        $Part1->revision = "A";
        $Part1->cavities = 64;
        $Part1->cycletime = 32;
        $Part1->weightpershot = 3;

        // Only publish data if either minute or hour is filled.
        if(($_POST["inputMins"]) != "")
          $results = $Part1->productionMinOutput($_POST["inputMins"]);
        if(($_POST["inputHr"]) != ""){
          $results .= "<br/><br/>";
          $results .= $Part1->productionHrOutput($_POST["inputHr"]);
        }
        // Load table data of selected part
        $tabledata = $Part1->displayPartTableInfo();
  }   // end of Part 1

        // open part 2
        elseif($_POST["partNum"] == "Part2") {
          $Part2 = new Part;
          $Part2->partNum = '46517893000';
          $Part2->revision = "B";
          $Part2->cavities = 16;
          $Part2->cycletime = 32.7;
          $Part2->weightpershot = 6.4;

          if(($_POST["inputMins"]) != "")
            $results = $Part2->productionMinOutput($_POST["inputMins"]);
          if(($_POST["inputHr"]) != ""){
            $results .= "<br/><br/>";
            $results .= $Part2->productionHrOutput($_POST["inputHr"]);
          }
            // Load table data of selected part
            $tabledata = $Part2->displayPartTableInfo();

          } // end of part2


        // open part 3
        elseif($_POST["partNum"] == "Part3") {
          $Part3 = new Part;
          $Part3->partNum = '87404003';
          $Part3->revision = "02";
          $Part3->cavities = 64;
          $Part3->cycletime = 32;
          $Part3->weightpershot = 3.0032;

          if(($_POST["inputMins"]) != "")
            $results = $Part3->productionMinOutput($_POST["inputMins"]);
          if(($_POST["inputHr"]) != "") {
            $results .= "<br/><br/>";
            $results .= $Part3->productionHrOutput($_POST["inputHr"]);
          }
            // Load table data of selected part
            $tabledata = $Part3->displayPartTableInfo();

          } // end of part 3

  } // end of if partNum is set
} // end of if  FORM SUBMITTED

?>



<div align="center">
<p><strong>Production Time to Quantity Converter</strong></p>
<form action="time2quantity.php" method="post">
  <p>PART NUMBER:
  <select name="partNum">
  <option disabled selected value style="display:none"></option>
   <option value="Part1">465-15563-000</option>
   <option value="Part2">465-17893-000</option>
   <option value="Part3">874-04003</option>
 </select>
 </p>

 <p>INPUT MINUTES <input type="number" name="inputMins" value=""></p>
 <p>INPUT HOURS <input type="number" name="inputHr" value=""></p>
<input type="submit" value="Submit">
</form>
</div>

<hr/>

<p align="center"><strong>Results</strong></p>
<p>
<?php
  echo $results;
  echo "<br/>";
  echo $tabledata;
 ?>
</p>
