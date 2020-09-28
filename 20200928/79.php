function main($lines) {
  $salesList = [];
  foreach ($lines as $index=>$value) {
    // printf("line[%s]: %s\n", $index, $value);
    $data = explode(",", $value);
    if (!array_key_exists($data[0], $salesList)) { $salesList[$data[0]] = []; }
    $salesList[$data[0]][$data[1]] += $data[2];
  }
  $all = 0;
  foreach ($salesList as $pref=>$item) {
    echo "* {$pref}\n";
    $sum = 0;
    foreach ($item as $name=>$sales) {
      $sum += $sales;
      echo "{$name} {$sales}\n";
    }
    $all += $sum;
    echo "{$pref}合計 {$sum}\n";
  }
  echo "全国合計 {$all}";
}

$array = array();
while (true) {
  $stdin = fgets(STDIN);
  if ($stdin == "") {
    break;
  }
  $array[] = rtrim($stdin);
}
main($array);
