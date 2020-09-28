<?php namespace Track;

function main($lines) {
  $list = array();

  foreach ($lines as $index=>$value) {
    // printf("line[%s]: %s\n", $index, $value);
    // $value = 都道府県,店舗名,売上
    $values = explode(',', $value);

    $prefectures = $values[0];
    $store_name = $values[1];
    $sales = $values[2];

    // printf($prefectures);
    // printf($store_name);
    // printf($sales);

    if (!array_key_exists($prefectures, $list)) {
      // ない場合
      $list += array(
        $prefectures => array(
          $store_name => $sales
        )
      );

      // printf(0);
    } else {
      // ある場合
      // 店舗を検索
      if (!array_key_exists($store_name, $list[$prefectures])) {
        // ない場合
        $list[$prefectures] += array(
          $store_name => $sales
        );
      } else {
        // ある場合
        $list[$prefectures][$store_name] += $sales;
      }
      // printf(1);
    }
  }

  // 結果表示
  $country_total = 0; // 全国合計
  foreach ($list as $key => $values) {
    // 都道府県
    printf("* %s\n", $key);

    // 店舗
    $total = 0; // 都道府県合計
    foreach ($values as $name => $sales) {
      printf("%s %s\n", $name, $sales);

      $total += $sales;
    }

    // 都道府県合計
    printf("%s合計 %s\n", $key, $total);

    $country_total += $total;
  }

  // 全国合計
  printf("全国合計 %s\n", $country_total);
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
