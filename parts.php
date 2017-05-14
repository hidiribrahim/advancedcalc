<?php
error_reporting(E_ERROR);

class Part {

public $partNum;
public $revision;
public $cavities;
public $cycletime;
public $weightpershot;

// Display the Part info into a neat table.
function displayPartTableInfo() {

  $table = "<p align='center'><strong>Part Info</strong></p>";

  $tableHeaders = "<tr><th>Part No</th><th>Revision</th><th>Cavities</th><th>Cycle Time</th><th>Weight per Shot</th></tr>";
  $tableData = "<tr align='center'><td>" . $this->partNum . "</td><td>";
  $tableData .= $this->revision . "</td><td>";
  $tableData .= $this->cavities . "</td><td>";
  $tableData .= $this->cycletime . "</td><td>";
  $tableData .= $this->weightpershot . "</td></tr>";


  $table .= "<table border='black' style='width:100%'>";
  $table .= $tableHeaders;
  $table .= $tableData . "</table>";
  return $table;


}

// Quantity = (Min/(Cycle Time/60)*Cavities)
function productionMinOutput($prodMin) {
  $a = $this->cycletime/60;
  $b = $prodMin / $a;
  $c = $b * $this->cavities;
  $minuteOutput = "Quantity from " . $prodMin . " minute input: <u><strong>" . round($c,2) . "</u></strong>";
  return $minuteOutput;
} //end of productionMinOutput();
// Quantity = (Hour/(Cycle Time/3600)*Cavities)
function productionHrOutput($prodHr) {
  $a = $this->cycletime/3600;
  $b = $prodHr / $a;
  $c = $b * $this->cavities;
  $hourOutput = "Quantity from " . $prodHr . " hour input : <u><strong>" . round($c,2) . "</u><strong>";
  return $hourOutput;

} //end of productionHrOutput()
// Min = (Qty / Cavity) * (Cycle Time / 60)
function quantityToTime($qty) {
  $a = $qty / $this->cavities;
  $b = $this->cycletime/60;
  $c = $this->cycletime/3600;
  $d = $this->cycletime/86400;
  $min = $a * $b;
  $hr = $a * $c;
  $day = $a *$d;

  $minOutput = "<strong><u>" . round($min,2) . "</strong></u> minutes to produce " . $qty . "<br/>";
  $hrOutput = "<strong><u>" . round($hr,2) . "</strong></u> hours  to produce " . $qty . "<br/>";
  $dayOutput = "<strong><u>" . round($day,3) . "</strong></u> days to produce " . $qty . "<br/>";
  $finalOutput = $minOutput . $hrOutput . $dayOutput;

  return $finalOutput;

}

// Shots = Quantity / Cavaties
// Materials Used = (Shots * Weightpershot) /  1000
function quantityToMaterial($qty,$availMat) {
  $shots = $qty / $this->cavities;

  $a = $shots * $this->weightpershot;
  $materialUsed = $a/1000;

  $consumeDays = $availMat/$materialUsed;
  $consumeMonths = $consumeDays/20;


  $quantityOutput = "From " . $qty . " quantity per day<br/>";
  $materialOutput = "Material Used(kg) : <strong><u>" . round($materialUsed,2) . "</strong></u></br>";
  $shotsOutput = "Shots per day : <strong><u>" . round($shots,2) . "</strong></u></br>";
  $consumeOutput = "Consumed in <strong><u>" . round($consumeDays,2) . "</strong></u> days & <strong><u>" . round($consumeMonths,2) . "</strong></u> months";


  $output = $quantityOutput . $shotsOutput . $materialOutput . $consumeOutput;
  return $output;

} //end of quantityToMaterial();




} // end of Part class

?>
