<?php
  define("TEHSITETITLE","Aleja Gwiazd");
  function mpi_header()
  {
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo "<title>" . TEHPAGETITLE . " - " . TEHSITETITLE . "</title>";
    echo "<link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css\">";
    echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>";
    echo "<script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js\"></script>";
    echo "<link rel=\"stylesheet\" href=\"/css/tehmichiglobalset.css\">";
    echo "<link rel=\"stylesheet\" href=\"/css/" . TEHPAGETITLE . ".css\">";
    echo "</head>";
    echo "<body>";
    mpi_navbar();
  }
  function mpi_container($inside)
  {
    return "<div class=\"container\">" . $inside . "</div>";
  }
  function mpi_jumbo($inside)
  {
    return "<div class=\"jumbotron\">" . mpi_container($inside) . "</div>";
  }
  function mpi_poem($codename, $poemtitle)
  {
    return mpi_poembutton($codename, $poemtitle) . mpi_poemmodal($codename, $poemtitle);
  }
  function mpi_poemmodal($codename, $poemtitle)
  {
    return "<div class=\"modal fade\" id=\"modal_".$codename."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modal_".$codename."_label\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title\"><span class=\"glyphicon glyphicon-book\"></span> ".$poemtitle."</h4></div><div class=\"modal-body\">" . mpi_readtextasset($codename) . "</div></div></div></div>";
  }
  function mpi_poembutton($codename, $poemtitle)
  {
    return "<a data-toggle=\"modal\" href=\"#modal_".$codename."\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-book\"></span> ".$poemtitle."</a>";
  }
  function mpi_readtextasset($filename)
  {
    $output = "";
    $file = fopen("assets/".$filename.".txt", "r");
    while(!feof($file))
    {
      $output = $output.fgets($file)."<br>";
    }
    fclose($file);
    return $output;
  }
  function mpi_footer()
  {
    echo "<footer class=\"container\">Code&design by <a href=\"http://ijestfajnie.pl\">Michcioperz</a>. Powered by <a href=\"http://github.com/michcioperz/AlejaGwiazd\">MPi Framework</a> reusable under terms of MIT license. All rights for assets and content reserved.</footer>";
    echo "</body>";
    echo "</html>";
  }
  function mpi_navbar_page($title)
  {
    echo "<li><a href=\"" . $title . "\">". $title . "</a></li>";
  }
  function mpi_navbar_start()
  {
    echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">";
    echo "<div class=\"navbar-header\">";
    echo "<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">";
    echo "<span class=\"sr-only\">Przełącz wyświetlanie menu</span>";
    echo "<span class=\"icon-bar\"></span>";
    echo "<span class=\"icon-bar\"></span>";
    echo "<span class=\"icon-bar\"></span>";
    echo "</button>";
    echo "<a class=\"navbar-brand\" href=\"/\">" . TEHSITETITLE . "</a>";
    echo "</div>";
    echo "<div class=\"collapse navbar-collapse navbar-ex1-collapse\">";
    echo "<ul class=\"nav navbar-nav\">";
  }
  function mpi_navbar_end()
  {
    echo "</ul>";
    echo "</div>";
    echo "</nav>";
  }
  function mpi_navbar()
  {
    mpi_navbar_start();
    mpi_navbar_page("Kasia");
    mpi_navbar_page("Michcioperz");
    mpi_navbar_end();
  }
  function mpi_carousel($id, $items)
  {
    $carie = "<div id=\"" . $id . "\" class=\"carousel slide\"><ol class=\"carousel-indicators\">";
    $indic = 0;
    foreach ($items as $indk) {
      if ($indic == 0)
      {
	$carie = $carie."<li class=\"active\" data-target=\"#".$id."\" data-slide-to=\"".$indic."\"></li>";
      } else {
	$carie = $carie."<li data-target=\"#".$id."\" data-slide-to=\"".$indic."\"></li>";
      }
      $indic++;
    }
    $carie = $carie."</ol><div class=\"carousel-inner\">";
    $indic = 0;
    foreach ($items as $k => $v)
    {
      if ($indic++ == 0){
	$carie = $carie . mpi_carousel_item($k, $v, true);
      } else {
	$carie = $carie . mpi_carousel_item($k, $v, false);
      }
    }
    $carie = $carie."</div><a class=\"left carousel-control\" href=\"#".$id."\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-fast-backward\"></span></a><a class=\"right carousel-control\" href=\"#".$id."\" data-slide=\"next\"><span class=\"glyphicon glyphicon-fast-forward\"></span></a></div>";
    return $carie;
  }
  function mpi_carousel_item($person, $description, $active)
  {
    if ($active)
    {
      return "<div class=\"item active\"><img src=\"assets/".$person."-carousel.png\" alt=\"".$person."\"><div class=\"carousel-caption\"><h3>".$person."</h3><p>".$description."</p></div></div>";
    } else {
      return "<div class=\"item\"><img src=\"assets/".$person."-carousel.png\" alt=\"".$person."\"><div class=\"carousel-caption\"><h3>".$person."</h3><p>".$description."</p></div></div>";
    }
  }
  function mpi_showcase($inside)
  {
    return "<div class=\"row\">".$inside."</div>";
  }
  function mpi_showcase_person($name)
  {
    return "<div class=\"col-xs-6 col-md-4 showcase-person\"><a href=\"".$name."\"><img class=\"img-thumbnail img-responsive\" alt=\"".$name."\" src=\"assets/".$name."-avatar.png\" /></a><h4>".$name."</h4></div>";
  }
?>
