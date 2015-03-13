<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Répertoire</title>
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
    <script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57073793-1', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
    <body>

    <?php

    // DEBUG
    ini_set('display_errors', 'On');

    //récupérer le contenu du framapad
    $padUrl = "http://urlDu/Framapad";
    $datas = file_get_contents($padUrl.'/export/html');

    // Récupérer les catégories
    // grandes catégories
    preg_match_all("/\<code style=\"font-family: monospace\"\>(.*?)\<\/code>/", $datas, $bigCats);
    preg_match_all("/====(.*?)====/", $datas, $bigCatsNb);
    preg_match_all("/====(.*?)====(.*?)====(.*?)====/", $datas, $contents);

    echo '<div class="menu">';
      echo '<h1>Répertoire&thinsp;: </h1>';
      echo '<ul class="bigCat">';
        echo '<li class="cat0 current"><span>filtrer</span></li>';
        foreach($bigCats as $i => $bigCats){
            if ($i == 0) continue;
            foreach($bigCats as $i => $bigCat){
              $cap = array('É', 'À', 'È', 'Ç', 'Ù', 'Ô');
              $low = array('é', 'à', 'è', 'ç', 'ù', 'ô');
              $bigCat = str_replace($cap, $low, $bigCat);
              $bigCat = preg_replace("/\((.*?)\)/", "", $bigCat);
              echo '<li class="other cat'.$i.'"><a href="?go=cat'.$i.'">'.strtolower($bigCat).'</a></li>';
            }
          }
      echo '</ul>, ';
      // sous-catégories
      preg_match_all("/--------------------<\/li><li><strong>(.*?)<\/strong>/", $datas, $smallCats);
      preg_match_all("/==(.*?)==/", $datas, $smallCatsNb);

      echo '<ul class="smallCat">';
        echo '<li class="cat0 current"><span>filtrer</span></li>';
        foreach($smallCats as $i => $smallCats){
          if ($i == 0) continue;
          foreach($smallCats as $i => $smallCat){
            $cap = array('É', '&#201;', '&#233;', 'À', '&#192;', '&#194;', 'È', '&#200;', '&#202;', 'Ç', 'Ù', 'Ô', '&#212;');
            $low = array('é', 'é', 'é',           'à', 'à',      'â',      'è', 'è',      'ê',      'ç', 'ù', 'ô', 'ô');
            $smallCat = str_replace($cap, $low, $smallCat);
            $smallCat = preg_replace("/\((.*?)\)/", "", $smallCat);
            echo '<li class="other cat'.$i.'"><span>'.strtolower($smallCat).'</span></li>';
          }
        }
      echo '</ul>';
      echo '<a class="pourquoi" href="about.php">&thinsp;?</a>';
    echo '</div>';


    // retirer toute la merde du début
    $rawDatas = strstr($datas, '###############################################');

    //Nettoyage
    $datasOK = str_replace('<left style="">', "", $rawDatas);
    $datasOK = str_replace("><&#x2F;left>", "", $datasOK);
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

    echo '<div class="content">';
      echo $datasOK;
    echo '</div>';
