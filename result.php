  <?php

  include ('./head.php');

  //récupérer le contenu du pad
  $padUrl = 'https://lite6.framapad.org/p/JcA306Aere';
  $datas = file_get_contents($padUrl.'/export/html');

  // Récupérer les catégories
  preg_match_all("/\<code style=\"font-family: monospace\"\>(.*?)\<\/code>/", $datas, $bigCats);
  preg_match_all("/====(.*?)====/", $datas, $bigCatsNb);

  // récupérer et parser le contenu
  preg_match_all("/%%%%%%%%%%(.*?)%%%%%%%%%%/", $datas, $contents);


  echo '<div class="menu">';
    echo '<h1><a href="index.php">Ressources</a>&thinsp;: </h1>';
    // Grandes catégories
    echo '<ul class="bigCat">';
    echo '<li class="cat current"><a href="?go=all&sub=all">vue globale</span></li>';
      foreach($bigCats as $i => $bigCats){
        if ($i == 0) continue;
        foreach($bigCats as $i => $bigCat){
          $cap = array('É', 'À', 'È', 'Ç', 'Ù', 'Ô');
          $low = array('é', 'à', 'è', 'ç', 'ù', 'ô');
          $bigCat = str_replace($cap, $low, $bigCat);
          $bigCat = preg_replace("/\((.*?)\)/", "", $bigCat);
          echo '<li class="other cat'.$i.'"><a href="?go='.$i.'&sub=all">'.strtolower($bigCat).'</a></li>';
        }
      }
      echo '</ul>';

      // sous-catégories
      //preg_match_all("/--------------------<\/li><li><strong>(.*?)<\/strong>/", $datas, $smallCats);
      //preg_match_all("/==(.*?)==/", $datas, $smallCatsNb);


          if ($_GET){
            if ($_GET['go'] === 'all') {
              echo '<a class="pourquoi" href="about.php">&thinsp;?</a>';
              echo '</div>';
              echo '<div class="content">';
                include ('./formater.php');
                echo $datasOK;
              echo '</div>';

            } else {
              foreach ($contents as $i => $content){
                if ($i == 0) continue;
                foreach ($content as $j => $datas){
                  if ($_GET['go'] == $j) {
                    preg_match_all("/--------------------<\/li><li><strong>(.*?)<\/strong>/", $datas, $smallCats);
                      echo '<span class="virgule">, </span><ul class="smallCat">';
                        echo '<li class="sousCat current"><a href="?go='.$j.'&sub=all">vue globale</a></li>';
                        foreach ($smallCats as $l => $smallCats){
                          if ($l == 0) continue;
                          foreach ($smallCats as $m => $smallCat){
                            $cap = array('É', '&#201;', '&#233;', 'À', '&#192;', '&#194;', 'È', '&#200;', '&#202;', 'Ç', 'Ù', 'Ô', '&#212;');
                            $low = array('é', 'é', 'é',           'à', 'à',      'â',      'è', 'è',      'ê',      'ç', 'ù', 'ô', 'ô');
                            $smallCat = str_replace($cap, $low, $smallCat);
                            $smallCat = preg_replace("/\((.*?)\)/", "", $smallCat);
                            echo '<li class="other sousCat'.$m.'"><a href="?go='.$j.'&sub='.$m.'">'.strtolower($smallCat).'</a></li>';
                          }
                        }
                      echo '</ul>';
                    echo '<a class="pourquoi" href="about.php">&thinsp;?</a>';
                    echo '</div>';

                    if ($_GET['sub'] === 'all'){
                      echo '<div class="content">';
                      include ('./formater.php');
                      echo $datasOK;
                      echo '</div>';
                    } else {
                      preg_match_all("/\*\*\*\*\*\*\*\*\*\*(.*?)\*\*\*\*\*\*\*\*\*\*/", $datas, $subContents);
                      foreach ($subContents as $n => $subContent){
                        if ($n == 0) continue;
                        foreach ($subContent as $o => $datas){
                          if ($_GET['sub'] == $o) {
                            echo '<div class="content">';
                            include ('./formater.php');
                            echo $datasOK;
                            echo '</div>';
                          }
                        }
                      }
                    }
                    /*
                    echo '<div class="content">';
                    include ('./formater.php');
                    echo $datasOK;
                    echo '</div>';
                    */
                  }
                }
              }
            }
          }


        include ('./footer.php');
