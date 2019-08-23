<?php


if(isset($_POST["prof-id"]) && is_numeric($_POST["prof-id"])
&& isset($_POST["course-id"]) && is_numeric($_POST["course-id"])
&& isset($_POST["pr0"]) && is_numeric($_POST["pr0"])
&& isset($_POST["pr1"]) && is_numeric($_POST["pr1"])
&& isset($_POST["pr2"]) && is_numeric($_POST["pr2"])
&& isset($_POST["pr3"]) && is_numeric($_POST["pr3"])
&& isset($_POST["pr4"]) && is_numeric($_POST["pr4"])
&& isset($_POST["pr5"]) && is_numeric($_POST["pr5"])
&& isset($_POST["cr6"]) && is_numeric($_POST["cr6"])
&& isset($_POST["av_mt1"])
&& isset($_POST["av_mt2"])
&& isset($_POST["av_fin"])
&& isset($_POST["your_overall"])
&& isset($_POST["your_grade"])
&& isset($_POST["comments"])
){
require_once("db.php");
$av_mt1 = $_POST["av_mt1"] == '' ? 100 : $_POST["av_mt1"];
$av_mt2 = $_POST["av_mt2"] == '' ? 100 : $_POST["av_mt2"];
$av_fin = $_POST["av_fin"] == '' ? 100 : $_POST["av_fin"];
$your_overall = $_POST["your_overall"] == '' ? 100 : $_POST["your_overall"];

$prepared = $pdo->prepare("INSERT INTO comments (course_id, prof_id, pr0, pr1, pr2, pr3, pr4, pr5, cr6, comments, av_mt1, av_mt2, av_final, your_overall, your_grade, date) VALUES (:course_id, :prof_id, :pr0, :pr1, :pr2, :pr3, :pr4, :pr5, :cr6, :comments, :av_mt1, :av_mt2, :av_final, :your_overall, :your_grade, CURDATE() )");
$prepared->execute([
  ':course_id' => $_POST["course-id"],
  ':prof_id' => $_POST["prof-id"],
  ':pr0' => $_POST["pr0"],
  ':pr1' => $_POST["pr1"],
  ':pr2' => $_POST["pr2"],
  ':pr3' => $_POST["pr3"],
  ':pr4' => $_POST["pr4"],
  ':pr5' => $_POST["pr5"],
  ':cr6' => $_POST["cr6"],
  ':comments' => $_POST["comments"],
  ':av_mt1' => $av_mt1,
  ':av_mt2' => $av_mt2,
  ':av_final' => $av_fin,
  ':your_overall' => $your_overall,
  ':your_grade' => $_POST["your_grade"]
]);
header("Location: /prof.php?id=".$_POST["prof-id"]);
die();
}

function details(){
?>
<form method="POST" data-abide>
<h5><strong>Rate your lecturer</strong></h5>
<input type="text" id="prof-name" placeholder="Name of the lecturer" required>
<small class="error">Lecturer's name is required.</small>
<input type="hidden" name="prof-id" id="prof-id">
<div class="card rating">
  <div class="card-section">
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">Does s/he give good grades?</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr0" value="5">
  </div>
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">Is s/he helpful?</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr1" value="5">
  </div>
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">Does s/he give homeworks? (Yes: 1, No: 5)</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr2" value="5">
  </div>
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">Does s/he take attendence? (Yes: 1, No: 5)</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr3" value="5">
  </div>
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">Is s/he a good lecturer?</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr4" value="5">
  </div>
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">General rate of the lecturer</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="pr5" value="5">
  </div>
</div>

<h5><strong>Rate your course</strong></h5>
<input type="text" id="course-name" placeholder="Name of the course" required>
<small class="error">Course name is required.</small>
<input type="hidden" name="course-id" id="course-id">
<div class="card rating">
  <div class="card-section">
  <div class="rating-block row collapse">
    <div class="columns small-6">
      <p class="ratings-type">General rate of the course</p>
    </div>
    <div class="columns small-5" >
      <div class="rating-block-rating right is-voted" data-rating>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      <div class="star selected">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37">
          <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
      </div>
      </div>
    </div>
    <div class="columns small-1" style="padding-left: 10px;">5</div>
    <input type="hidden" name="cr6" value="5">
  </div>
</div>
<span>Average scores in your semester</span>
<div class="row">
<div class="columns small-4"><input type="number" name="av_mt1" placeholder="MT1"></div>
<div class="columns small-4"><input type="number" name="av_mt2" placeholder="MT2"></div>
<div class="columns small-4"><input type="number" name="av_fin" placeholder="FINAL"></div>
</div>
<span>Your grades</span>
<div class="row">
<div class="columns small-6"><input type="number" name="your_overall" placeholder="Overall"></div>
<div class="columns small-6">
<select name="your_grade">
  <option value="AA">AA</option>
  <option value="BA">BA</option>
  <option value="BB">BB</option>
  <option value="CB">CB</option>
  <option value="CC">CC</option>
  <option value="DC">DC</option>
  <option value="DD">DD</option>
  <option value="FD">FD</option>
  <option value="FF">FF</option>
  <option value="NA">NA</option>
</select>
</div>
</div>
<h5><strong>Your comments</strong></h5>
<textarea rows="5" style="resize: vertical" name="comments"></textarea>
<button class="small button expand" type="submit">FINISH</button>
</form>


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
<style type="text/css">
  img[alt="www.000webhost.com"]{display:none;}
  .star {cursor: pointer;}

.ui-menu {
  padding: 3px 0;
}

.ui-menu .ui-menu-item {
  padding:0 3px !important;
  font-size:13px;
}
</style>
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
<div style="max-width:50rem" class="row collapse">

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

  function bsearch(term,start,end) {
   if(start == end && course_data[start]['n'].toLowerCase().indexOf(term.toLowerCase())==0)
     return [start];
   if(start >= end)
     return [];
   var idx = Math.floor((start+end)/2);
   if(course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) {
     while(idx>=0 && course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) idx--;
     idx++;
     var arr = [];
     while(idx < course_data.length && arr.length < 10 && course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) {
       arr.push(idx);
       idx++;
     }
     return arr;
   }
   if(term.toLowerCase() < course_data[idx]['n'].toLowerCase())
     return bsearch(term, start, idx-1);
   return bsearch(term, idx+1, end);
  }
  
  function normal_search(inp) {
    var result = [];
    var l = 0;
    for(var i = 0; i < course_data.length && l < 10; i++) {
      if(course_data[i]["n"].toLowerCase().indexOf(inp.toLowerCase()) !== -1) {
        result.push(i);
        l++;
      }
    }
    return result;
  }

  function normal_search_prof(inp) {
    var result = [];
    var l = 0;
    for(var i = 0; i < course_data.length && l < 10; i++) {
      var past;
      for(var j = 0; j < course_data[i]["s"].length && l < 10; j++){
        if(course_data[i]["s"][j]["i"][0] != "STAFF" && past != course_data[i]["s"][j]["i"][0] && course_data[i]["s"][j]["i"][0].toLowerCase().indexOf(inp.toLowerCase()) !== -1) {
          result.push([i, j]);
          past = course_data[i]["s"][j]["i"][0];
          l++;
        }
      }
    }
    return result;
  }

    String.prototype.hashCode = function() {
    var hash = 0, i, chr;
    if (this.length === 0) return hash;
    for (i = 0; i < this.length; i++) {
      chr   = this.charCodeAt(i);
      hash  = ((hash << 5) - hash) + chr;
      hash |= 0; // Convert to 32bit integer
    }
    return hash;
  };
      var course_data;
      jQuery.get("inc/data.json?"+new Date().getTime(), function(data) {
        course_data = data;
        <?php if(isset($_GET["pid"])){ if(isset($_GET["cid"])){?>
          var course = course_data[<?php echo $_GET["cid"]; ?>]['s'];
          for(var i = 0; i < course.length; i++)
            if(course[i]['i'][0].hashCode() == <?php echo $_GET["pid"]; ?>){
              $("#prof-name").val(course[i]['i'][0]);
              $("#prof-id").val(<?php echo $_GET["pid"]; ?>);
              break;
            }
          
        <?php }else { ?>
          for(var j = 0; j < course_data.length; j++){
            var course = course_data[j]['s'];
            for(var i = 0; i < course.length; i++)
              if(course[i]['i'][0].hashCode() == <?php echo $_GET["pid"]; ?>){
                $("#prof-name").val(course[i]['i'][0]);
                $("#prof-id").val(<?php echo $_GET["pid"]; ?>);
                return;
              }
          }
        <?php }} if(isset($_GET["cid"])){ ?> 
          $("#course-name").val(course_data[<?php echo $_GET["cid"]; ?>]['n']);
          $("#course-id").val(<?php echo $_GET["cid"]; ?>);
        <?php } ?>
      });
      $('.star').click(function(){
          var selectedCssClass = 'selected';
          var $this = $(this);
          $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
          $this
            .addClass(selectedCssClass)
            .parent().addClass('is-voted');
          $this.parent().parent().siblings('.small-1').text($this.index()+1);
          $this.parent().parent().siblings('input').val($this.index()+1);
      });
      jQuery("#course-name").autocomplete({
        source: function(request, response) {
          var inp = request.term;
          var result_idxs = bsearch(inp,0,course_data.length-1);
          if(result_idxs.length == 0) {
            result_idxs = normal_search(inp);
          }

          var response_array = [];
          for(var i = 0; i<result_idxs.length; i++) {
            var label = course_data[result_idxs[i]]['n'];
            response_array.push({value: label, course_id: result_idxs[i]});
          }
          response(response_array);
        },
        select: function(event, ui) {
          event.preventDefault();
          var selected=ui.item;
          jQuery("#course-name").val(selected.value);
          $("#course-id").val(selected.course_id);
        }
      });

      jQuery("#prof-name").autocomplete({
        source: function(request, response) {
          var inp = request.term;
          var result_idxs = normal_search_prof(inp);
          var response_array = [];
          for(var i = 0; i<result_idxs.length; i++) {
            var label = course_data[result_idxs[i][0]]["s"][result_idxs[i][1]]["i"][0];
            response_array.push({value: label, prof_id: label.hashCode()});
          }
          response(response_array);
        },
        select: function(event, ui) {
          event.preventDefault();
          var selected=ui.item;
          jQuery("#prof-name").val(selected.value);
          $("#prof-id").val(selected.prof_id);
        }
      });
    });

		$(document).foundation('reflow');
	</script>
</body>
</html>
