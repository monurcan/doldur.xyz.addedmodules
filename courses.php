
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
	<link rel="stylesheet" href="/inc/style.css">
	<style type="text/css">
.rating-block-rating {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}

.rating-block-rating .star {
  stroke: #8e44ad;
  cursor: pointer;
}

.rating-block-rating .star.selected polygon {
  fill: #8e44ad;
}

.rating-block-rating.is-voted .star polygon {
  fill: #8e44ad;
}

.rating-block-rating.is-hover .star.selected ~ .star polygon, .rating-block-rating.is-voted .star.selected ~ .star polygon {
  fill: transparent;
}

.rating-block-rating.is-hover .star polygon {
  fill: #9b59b6;
}

</style>
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
							<li><a href="/gpa.html">C(GPA) Calculator</a></li>
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
<br>
<p>Search for a course or a lecturer.</p>
<input type="text" id="course-name" >
<div class="row expand collapse">
<div class="columns small-8">
<small>Course database last updated: <?php echo date ("d F Y H:i:s.", filemtime(getcwd()."/inc/data.json")); ?> Summer School 2018-2019 <div id="course-data-loading">Loading course data...</div><div id="place-data-loading">Loading place data...</div></small>
</div>
<div class="columns small-4">
<a href="/add.php" class="button expand">Add a comment</a>
</div>
</div>

<div id="course-details">

</div>

</div>
		
	<div id="about-modal" class="reveal-modal tiny" data-reveal aria-labelledby="About" aria-hidden="true" role="dialog">
		A tool for ratings. <br><br>If you encounter any problems: monurcan55@gmail.com<br/>
	</div>
	<script src="/inc/foundation/js/vendor/jquery.js"></script>
	<script src="/inc/jquery-ui/jquery-ui.min.js"></script>
	<script src="/inc/foundation/js/vendor/fastclick.js"></script>
	<script src="/inc/foundation/js/foundation.min.js"></script>
	<script src="/inc/courses.js"></script>
	<script>
		$(document).foundation('reflow');
	</script>
</body>
</html>
