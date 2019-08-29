$(function(){
	var course_data = null;
	var d1 = jQuery.get("inc/data.json?"+new Date().getTime(), function(data) {
		course_data = data;
		jQuery("#course-data-loading").append("Loaded.").fadeOut(1000);		
	});

	var locations = null;
	var d2 = jQuery.get("inc/places.json", function(data) {
		locations = data;
		jQuery("#place-data-loading").append("Loaded.").fadeOut(1000);
		
	});

	$.when(d1, d2).done(function() {
		if(window.location.hash){
			var hash = window.location.hash.substring(1);
			show_course(hash);
		}
	});

	$(window).on( 'hashchange', function( e ) {
    	if(window.location.hash){
			var hash = window.location.hash.substring(1);
			show_course(hash);
		}
	});


	$("#course-name").focus();

	// function bsearch(term,start,end) {
	// 	if(start == end && course_data[start]['n'].toLowerCase().indexOf(term.toLowerCase())==0)
	// 		return [start];
	// 	if(start >= end)
	// 		return [];
	// 	var idx = Math.floor((start+end)/2);
	// 	if(course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) {
	// 		while(idx>=0 && course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) idx--;
	// 		idx++;
	// 		var arr = [];
	// 		while(idx < course_data.length && arr.length < 10 && course_data[idx]['n'].toLowerCase().indexOf(term.toLowerCase())==0) {
	// 			arr.push(idx);
	// 			idx++;
	// 		}
	// 		return arr;
	// 	}
	// 	if(term.toLowerCase() < course_data[idx]['n'].toLowerCase())
	// 		return bsearch(term, start, idx-1);
	// 	return bsearch(term, idx+1, end);
	// }
	
	function normal_search(inp) {
		var result = [];
		var l = 0;
		for(var i = 0; i < course_data.length && l < 15; i++) {
			if(course_data[i]["n"].toLowerCase().indexOf(inp.toLowerCase()) !== -1) {
				result.push([false, i]);
				l++;
			}
			var past;
			for(var j = 0; j < course_data[i]["s"].length && l < 15; j++){
				if(course_data[i]["s"][j]["i"][0] != "STAFF" && past != course_data[i]["s"][j]["i"][0] && course_data[i]["s"][j]["i"][0].toLowerCase().indexOf(inp.toLowerCase()) !== -1) {
					result.push([true, course_data[i]["s"][j]["i"][0]]);
					past = course_data[i]["s"][j]["i"][0];
					l++;
				}
			}
		}
		return result;
	}
	function place_of(name){
		for (var i = 0, len = locations.length; i < len; i++) {
			var names = locations[i][2];
			for (var j = 0, leng = names.length; j < leng; j++) {
				if(name.indexOf(names[j]) >= 0) return [locations[i][1],locations[i][0]];
			}
		}
		
		return ["#","Not known"];
	}

	function get_rating_course(id){
		$.ajax({
			method: "POST",
			url: "get_rating_course.php",
			data: { id: id },
			dataType: 'json'
		}).done(function( msg ) {
			
			  var selectedCssClass = 'selected';
			  var $this = $(".rating-block-rating .star").eq(Math.round(msg[0])-1);
			  $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
			  $this
			    .addClass(selectedCssClass)
			    .parent().addClass('is-voted');

			   $("#course-point").html(msg[0] + " <small>("+msg[1]+")</small>");

			   $('.star').on({
			   	'mouseover': function() {
				  var selectedCssClass = 'selected';
				  var $this = $(this);
				  $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
				  $this
				    .addClass(selectedCssClass)
				    .parent().addClass('is-hover').removeClass('is-voted');
				},
				'mouseleave': function(){
					$this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
			  		$this.addClass(selectedCssClass).parent().removeClass('is-hover').addClass('is-voted');
				},
				'click': function(){
					window.location.href = "/add.php?cid="+window.location.hash.substring(1);
				}
				});
		});
	}

	var rated_profs = [];
	var no = 0;
	function get_rating_prof(id){
		for(var i = 0; i < rated_profs.length; i++)
			if(rated_profs[i] == id) return;
		rated_profs.push(id);
		$.ajax({
			method: "POST",
			url: "get_rating_prof.php",
			data: { id: id }
		}).done(function( msg ) {
			if(msg) $(".grade-"+id).text('('+msg+')');
		});
	}


	function show_course(idx){
		if(idx < 0 || idx >= course_data.length)
			return false;

		get_rating_course(idx);

		var content = '<hr><div class="row collapse"><div class="columns small-8"><strong>'+course_data[idx]['n']+'</strong></div><div class="columns small-4"><div class="rating-block-rating right row" data-rating><div class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37"><polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/></svg></div><div class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37"><polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/></svg></div><div class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37"><polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/></svg></div><div class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37"><polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/></svg></div><div class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 40 37"><polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/></svg></div></div></div></div><div class="row collapse"><div class="columns small-6">Code: <form action="https://oibs2.metu.edu.tr/View_Program_Course_Details_64/main.php" method="post" style="display:inline"><input type="hidden" name="SubmitCourseInfo" value="Course Info"><input type="hidden" name="hidden_redir" value="Course_List"><button type="submit" name="text_course_code" value="'+course_data[idx]['c']+'" class="tiny round">'+course_data[idx]['c']+'</button></form></div><div class="columns small-6 text-right">General rate: <strong id="course-point">0.0 <small>(0)</small></strong></div></div><br><table style="width:100%"><thead><tr><th style="max-width: 2rem">Sec</th><th>Lecturers</th><th>Time & Place</th><th>Constraint</th></tr></thead><tbody>';
		var section_idx_c = course_data[idx]["s"].length;
		var section_idxs = []
		for(var i = 0;i <section_idx_c ; i++) {
			section_idxs.push(i);
		}

		for(var i = 0;i < course_data[idx]["s"].length;i++) {
			var section = course_data[idx]["s"][i];
			content += "<tr><td>" + section["sn"] + "</td><td>";
			for(var j=0; j < section["i"].length; j++) {
				var instructor = section["i"][j];
				var instructorHash = instructor.hashCode();
				if(instructor!="STAFF"){
					content += (j+1) + ': <a href="/prof.php?id='+instructorHash+'">' + instructor + '</a> <span class="grade-'+instructorHash+'"></span><br>';
					get_rating_prof(instructorHash);
				}else content += (j+1) + ": STAFF<br>";
			}
			content += "</td><td>";
			for(var j = 0;j < section["t"].length; j++) {
				var time = section["t"][j];
				var exploded = time["b"].split("-");
				if(exploded[0] == 'mon') {
					content += "Monday ";
				} else if(exploded[0] == 'tue') {
					content += "Tuesday ";
				} else if(exploded[0] == 'wed') {
					content += "Wednesday ";
				} else if(exploded[0] == 'thu') {
					content += "Thursday ";
				} else if(exploded[0] == 'fri') {
					content += "Friday ";
				} else {
					continue;
				}
				
				content += (parseInt(exploded[1])+7) + ':40 - ' + (parseInt(exploded[1])+8) + ':40 (<a href="https://map.metu.edu.tr/place/'+place_of(time["p"])[0]+'" target="_blank" data-tooltip aria-haspopup="true" class="has-tip tip-right" title="'+
					place_of(time["p"])[1]
				+'">' + time["p"] + '</a>)<br>';
			}
			content += "</td><td>"
			for(var j=0; j < section["cs"].length; j++) {
				var constraint = section["cs"][j];
				content += constraint["ss"] + " - " + constraint["es"] + "(" + constraint["gd"] + ")<br/>"; 
			}
			content += "</td></tr>";
		}

		content += "</tbody></table><br>";
		$("#course-details").html(content);
		$(document).foundation('tooltip', 'reflow');
	}
	jQuery("#course-name").autocomplete({
		source: function(request, response) {
			var inp = request.term;
			//var result_idxs = bsearch(inp,0,course_data.length-1);
			var result_idxs = normal_search(inp);
			if(result_idxs.length == 0) {
				$.ajax({
					method: "POST",
					url: "search_db.php",
					data: { inp: inp.toUpperCase().hashCode() },
					dataType: 'json'
				}).done(function( msg ) {
					if(msg) {
						response([{value: inp.toUpperCase(), isProf: true}]);
					}
				});
			}else {
				var response_array = [];
				for(var i = 0; i<result_idxs.length; i++) {
					var label = result_idxs[i][0] ? result_idxs[i][1] : course_data[result_idxs[i][1]]['n'];
					response_array.push({value: label, courseId:result_idxs[i][1], isProf: result_idxs[i][0]});
				}
				response(response_array);
			}
		},
		select: function(event, ui) {
			event.preventDefault();
			jQuery("#course-name").val('');
			var selected=ui.item;
			if(selected.isProf){
				window.location.href="/prof.php?id="+selected.value.hashCode();
			}else {
				show_course(selected.courseId);
				window.location.hash = selected.courseId;
			}
		}
	});

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
});