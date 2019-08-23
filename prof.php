

<?php
function details(){
require_once("db.php");

$id = isset($_GET["id"]) ? $_GET["id"] : '';
if(!is_numeric($id)){echo("Lecturer does not exist.");return;}

$prepared = $pdo->prepare("SELECT * FROM comments WHERE prof_id=:id");
$prepared->bindValue(':id', $id);
$prepared->execute();
if (($count = $prepared->rowCount()) == 0){echo "No comment has been made about the lecturer.<br><br><a href='/add.php?pid=".$_GET["id"]."' class='button expand'>ADD A COMMENT</a>"; return;}
$c = $prepared->fetchAll(PDO::FETCH_ASSOC);
$means = array(0, 0, 0, 0, 0, 0);
foreach ($c as $rate){
  $means[0] += $rate["pr0"];
  $means[1] += $rate["pr1"];
  $means[2] += $rate["pr2"];
  $means[3] += $rate["pr3"];
  $means[4] += $rate["pr4"];
  $means[5] += $rate["pr5"];
}
$means = array_map(function ($val) use ($count){return number_format((float)($val/$count), 2, '.', '');}, $means);
?>
<h5><strong>Average Ratings <?php echo "<small>over ".$count." peoples</small>"; ?></strong></h5>
    <div class="card rating">
      <div class="card-section">
        <?php ?>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">Does s/he give good grades?</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[0])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[0]; ?></div>
      </div>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">Is s/he helpful?</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[1])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[1]; ?></div>
      </div>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">Does s/he give homeworks? (Yes: 1, No: 5)</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[2])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[2]; ?></div>
      </div>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">Does s/he take attendence? (Yes: 1, No: 5)</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[3])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[3]; ?></div>
      </div>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">Is s/he a good lecturer?</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[4])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[4]; ?></div>
      </div>
      <div class="rating-block row collapse">
        <div class="columns small-6">
          <p class="ratings-type">General rate of the lecturer</p>
        </div>
        <div class="columns small-5" >
          <div class="rating-block-rating right is-voted" data-rating>
            <?php 
              for($i = 1; $i<6; $i++){
            ?>
          <div class="star <?php if($i==round($means[5])) echo "selected"; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
              <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
          </div>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="columns small-1" style="padding-left: 10px;"><?php echo $means[5]; ?></div>
      </div>
    </div>
</div>
<h5><strong>Comments</strong></h5>
<?php foreach ($c as $comment){ ?>
<div class="row collapse comment" data-equalizer>
  <div class="columns small-3" data-equalizer-watch>
    <strong><?php echo $comment["date"] ?></strong>
    <ul>
      <li><strong class="s<?php echo $comment["pr0"] ?>"><?php echo $comment["pr0"] ?></strong><small>GRADING</small></li>
      <li><strong class="s<?php echo $comment["pr1"] ?>"><?php echo $comment["pr1"] ?></strong><small>HELPFUL</small></li>
      <li><strong class="s<?php echo $comment["pr2"] ?>"><?php echo $comment["pr2"] ?></strong><small>NO HWS</small></li>
      <li><strong class="s<?php echo $comment["pr3"] ?>"><?php echo $comment["pr3"] ?></strong><small>NO ATD</small></li>
      <li><strong class="s<?php echo $comment["pr4"] ?>"><?php echo $comment["pr4"] ?></strong><small>LECTURING</small></li>
      <li><strong class="s<?php echo $comment["pr5"] ?>"><?php echo $comment["pr5"] ?></strong><small>GENERAL</small></li>
    </ul>
  </div>
  <div class="columns small-9" data-equalizer-watch>
    <p><?php echo $comment["comments"] ?></p>
    <table>
      <thead><th><a href="/courses.php#<?php echo $comment["course_id"] ?>" class="courselink"><?php echo $comment["course_id"] ?></a></th><th>Averages</th><th>Commenter's</th></thead>
      <tbody><tr>
        <td>Rate: <?php echo $comment["cr6"] ?></td>
        <td>MT1: <?php echo $comment["av_mt1"] ?> MT2: <?php echo $comment["av_mt2"] ?> FIN: <?php echo $comment["av_final"] ?></td>
        <td>Overall: <?php echo $comment["your_overall"] ?> Grade: <strong><?php echo $comment["your_grade"] ?></strong></td>
      </tr></tbody>
    </table>
  </div>
</div>
<?php } ?>

<a href="/add.php?pid=<?php echo $id ?>&cid=<?php echo $c[0]["course_id"] ?>" class="button expand success">ADD YOUR COMMENT</a>
<blockquote>
  To sustain this environment, please make contributions by grading your profesors which can be done under a minute.
</blockquote>


<?php } ?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Scheduler for METU courses.">
  <meta name="keywords" content="METU,ODTÜ,schedule,scheduler">
  <title>doldur.xyz</title>
  <link rel="stylesheet" href="/inc/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="/inc/foundation/css/normalize.css">
  <link rel="stylesheet" href="/inc/foundation/css/foundation.min.css">
  <link rel="stylesheet" href="/inc/prof.css">
  <link rel="icon" type="image/png" href="/inc/img/fav.png">
  <script src="/inc/foundation/js/vendor/modernizr.js"></script>
</head>
<body>
<nav class="top-bar sc-nav" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="./"><b>doldur.xyz</b></a></h1>
    </li>
    <li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="left">
      
          <li class=""><a href="#" data-reveal-id="about-modal">About</a></li>
          <li class="has-dropdown">
            <a href="#">Goodies</a>
            <ul class="dropdown">
              <li><a href="/">Scheduler</a></li>
              <li><a href="/courses.php">Course/Teacher Ratings</a></li>
              <li><a href="https://oibs2.metu.edu.tr//View_Course_Capacity_158/main.php">Course Capacity</a></li>
              <li><a href="/grade.html">Grade Calculator</a></li>
              <li><a href="http://105.metutrolls.com/">PHYS105 Solutions</a></li>
            </ul>
          </li>
      
    </ul>
    <!-- Left Nav Section -->
  </section>
</nav>
<div style="max-width:50rem" class="row">

<?php details(); ?>


</div>
		
	<div id="about-modal" class="reveal-modal tiny" data-reveal aria-labelledby="About" aria-hidden="true" role="dialog">
		A tool to calculate GPA and CGPA. <br><br>If you encounter any problems: monurcan55@gmail.com<br/>
	</div>
	<script src="/inc/foundation/js/vendor/jquery.js"></script>
	<script src="/inc/jquery-ui/jquery-ui.min.js"></script>
	<script src="/inc/foundation/js/vendor/fastclick.js"></script>
  <script src="/inc/foundation/js/foundation.min.js"></script>
	<script>
    $(function(){
      jQuery.get("inc/data.json?"+new Date().getTime(), function(data) {
        $(".courselink").each(function(){
          var course = data[$(this).text()]['n'];
          $(this).text(course.substr(0, course.indexOf('-')));
        });
      });
    });

		$(document).foundation('reflow');
	</script>
</body>
</html>
