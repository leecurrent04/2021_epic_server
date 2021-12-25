<?php
$conn = mysqli_connect(
  'localhost', // 주소
  'ID',
  'PW',
  'DB_NAME');

 echo '<h1>Database</h1>';

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    echo $row['grade'].'-'.$row['class'].'/'.$row['sel_grade'].str_pad($row['sel_class'],2,0,STR_PAD_LEFT).str_pad($row['sel_number'],2,0,STR_PAD_LEFT).'/'.$row['created'].'</br>';
}
?>
