<?php

  // retirer toute la merde du début
  if (strpos($datas, '###############################################')) {
    $datas = strstr($datas, '###############################################');
  }
  //Nettoyage
  $datasOK = str_replace('<left style="">', "", $datas);
  $datasOK = str_replace("><&#x2F;left>", "", $datasOK);
  $datasOK = str_replace("%%%%%%%%%%<br>", "", $datasOK);
  $datasOK = str_replace("**********<br>", "", $datasOK);
  $datasOK = str_replace("###############################################", "", $datasOK);
  $datasOK = preg_replace("/--------------------(.*?)--------------------/", "", $datasOK);
  $datasOK = str_replace("&nbsp;", "", $datasOK);
  $datasOK = str_replace(") | ", ") ", $datasOK);
  $datasOK = str_replace(" | ", ", ", $datasOK);
  $datasOK = str_replace(">-", ">➞ ", $datasOK);
  $datasOK = str_replace('<14 style="font-size: 14;"></14>', "", $datasOK);
  $datasOK = str_replace('<center style=""></center>', "", $datasOK);
  $datasOK = str_replace('<ul class="indent"><li><br></li><li></li></ul>', "", $datasOK);
  $datasOK = str_replace("<br><br><br>", "", $datasOK);
  $datasOK = str_replace("<br><br>", "", $datasOK);
  $datasOK = str_replace("!", "&#33;", $datasOK);


  // Raccourcir les liens
  $http = "/^(https?:\/\/)?(.+)$/";
  $datasOK = str_replace(">http:&#x2F;&#x2F;", ">", $datasOK);
  $datasOK = str_replace(">https:&#x2F;&#x2F;", ">", $datasOK);
  $datasOK = str_replace(">www.", ">", $datasOK);

  // Traitement des langues
  /*
  preg_match_all("/\((.*?)\)/", $datasOK, $langues);
  //print_r ($langues);
  $isFirst = true;
  foreach ($langues as $langue){
    if ($isFirst) {
      $isFirst = false;
      continue;
    }
    echo '<h1>ofienzkljn</h1>';
    foreach($langue as $langue){
      echo '<sup>'.$langue.'</sup>';
    }
  }
  */
