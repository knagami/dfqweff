<?php namespace Track;

function main($lines) {
  foreach ($lines as $index=>$value) {
    $list=array();
    $list=explode(",",$value);
    $ALL[$list[0]][$list[1]]["sales"] += $list[2];
  }
  foreach ($ALL as $index1=>$value1){
    $store_sum = 0;
    printf("* ".$index1."\n");
    foreach ($value1 as $index2=>$value2){
      printf($index2." ");
      foreach ($value2 as $index3=>$value3){
        printf($value3."\n");
        $store_sum += $value3;
      }
    }
    printf($index1."合計 ".$store_sum."\n");
    $all_sum += $store_sum;
  }
  printf("全国合計 ".$all_sum."\n");
    
    //printf("line[%s]: %s\n", $index, $value);
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