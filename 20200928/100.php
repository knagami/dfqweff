<?php namespace Track;

function main($lines) {
  $total_all=0;
  $total_fuken=0;
  $total_tenpo=0;
  $fuken="";
  $tenpo="";
  $fuken_change=0;
  foreach ($lines as $index=>$value) {
    //printf("line[%s]: %s\n", $index, $value);
    $p = explode(",", $value);
    $total_all=$total_all+$p[2];
    if($fuken!=$p[0]){
      if($fuken!=""){
        printf("%s %s\n", $tenpo,$total_tenpo);
        printf("%s合計 %s\n", $fuken,$total_fuken);
      }
      $fuken=$p[0];
      $total_fuken=$p[2];
      $fuken_change=1;
      $tenpo="";
      printf("* %s\n", $fuken);
    }else{
      $total_fuken=$total_fuken + $p[2];
    }
    if($tenpo!=$p[1]){
      if($tenpo!="" && $fuken_change==0){
        printf("%s %s\n", $tenpo,$total_tenpo);
      }
      $fuken_change=0;
      $tenpo=$p[1];
      $total_tenpo=$p[2];
    }else{
      $total_tenpo=$total_tenpo + $p[2];
    }
  }
  printf("%s %s\n", $tenpo,$total_tenpo);
  printf("%s合計 %s\n", $fuken,$total_fuken);
  printf("全国合計 %s\n", $total_all);
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
