<?php // WordPress
	//require_once(dirname(__FILE__) . '/../../wordpress/wp-blog-header.php');
	// get_header();
?>
<?php
	$TITLE = "Timeline";
	$active = "nav_menu_apps";
	//require_once(dirname(__FILE__) . '/../../header.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <meta charset="utf-8">
    <title>
	<?php $TITLE ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Personal website of Damion with portfolio, blog, apps, music, and contact information.">
    <meta name="author" content="Damion Paul Hart">
	<!-- Facebook Open Graph Meta Tags -->
<meta property="og:title" content="Damion Paul Hart" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://dhart.co" />
<meta property="og:image" content="http://dhart.co/images/diamondheart_02.png" />
<meta property="og:site_name" content="Damion Paul Hart" />
<meta property="og:description" content="Personal website of Damion with portfolio, blog, apps, music, and contact information." />

    <!-- Le styles -->
    <link href="<?php __DIR__; ?> /content/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php __DIR__; ?> /content/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<?php if ($TITLE=="MEDIA"): ?>
    <link href="<?php __DIR__; ?> /content/assets/css/docs.css" rel="stylesheet">
	<?php endif; ?>
    <style>
html, body {
	height: 100%;
}
.wrapper > .container-fluid {
	padding-top: 60px;
}
.wrapper {
	min-height: 100%;
	height: auto !important; /* ie7 fix */
	height: 100%;
	margin: 0 auto -40px;
}
footer p {
	line-height: 40px;
	margin: 0;
}
footer {
	background-color: #2C2C2C;
	color:#eee;
	right:0;
	left:0;
	text-align: center;
}

/* media queries to support the bootstrap responsive stylesheet */

@media (max-width: 979px) {
 .wrapper > .container-fluid {
 padding-top:0;
}
 .wrapper {
 height:auto;
 margin:auto;
 min-height: 0;
}
footer p {
	line-height: 40px;
	margin: 0;
}
footer {
	background-color: #2C2C2C;
	color:#eee;
	right:0;
	left:0;
	width:100%;
	text-align: center;
}
​/*
// makes all borders part of the box
span4 {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
*/
</style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php __DIR__; ?>/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="content/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="content/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="content/assets/ico/apple-touch-icon-57-precomposed.png">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
    <meta name="description" content="Dynamic Timeline of human history">
    <meta name="author" content="Damion Paul Hart">
	<!-- Facebook Open Graph Meta Tags -->
<meta property="og:title" content="dhart Timeline" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://dhart.co/vis/demo/timeline.html" />
<meta property="og:image" content="http://dhart.co/vis/demo/example2.jpg" />
<meta property="og:site_name" content="dhart.co" />
<meta property="og:description" content="Dynamic Timeline of human history" />

  <title>Timeline</title>
  <link href="../vis/dist/vis.css" rel="stylesheet" type="text/css" />
  <style>
    body, html {
      font-family: arial, sans-serif;
      font-size: 11pt;
    }

    textarea {
      width: 800px;
      height: 200px;
    }

    .buttons {
      margin: 20px 0;
    }

    .buttons input {
      padding: 10px;
    }
	
  </style>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <script src="../vis/dist/vis.js"></script>
    </head>
    
    	<body data-spy="scroll" data-target=".subnav" data-offset="100">
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		<?php include_once("analyticstracking.php") ?>

	
<!-- data-spy used in media.php -->
<div class="navbar navbar-fixed-top">
					<div class="navbar-inner">
								<div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
								<a class="brand" style="vertical-align:middle;" href="/index.php">
								<img style="height:20px; margin-right:20px; vertical-align:bottom;" src="/images/diamondheart-forum.gif" />DAMION</a>
													<div class="nav-collapse">
																<ul class="nav">
																					<li id="nav_menu_home"><a id="menu_home" href="/index.php">Home</a></li>
																					<li id="nav_menu_blog"><a id="menu_blog" href="<?php __DIR__; ?>/wordpress/">Blog</a></li>
																					<li class="dropdown" id="nav_menu_apps"> <a class="dropdown-toggle" data-toggle="dropdown" href="menu_apps"> Apps <b class="caret"></b> </a>
																								<ul class="dropdown-menu">
                                                                                                					<li><a href="<?php __DIR__; ?>/games/">All Apps & Games</a></li>
                                                                                                					<li class="divider"></li>
																													<li><a href="<?php __DIR__; ?>/index_timeline.php">Chronologia</a></li>
																													<li><a href="<?php __DIR__; ?>/content/spaceshark.php">Space Shark : The Game</a></li>
																													<li><a href="<?php __DIR__; ?>/index_manvshippy.php">Man vs Hippy</a></li>
                                                                                                                    <li><a href="<?php __DIR__; ?>/games/jcracing/index.php">Virtual JC Racing</a></li>
																													<li class="divider"></li>
																													<li class="nav-header">The Lab</li>
																													<li><a href="<?php __DIR__; ?>/content/lab/control/index.html">Touch (only) Game Joystick</a></li>
																								</ul>
																				    </li>
																	
																				    <li class="dropdown" id="menu2"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2"> Media <b class="caret"></b> </a>
																								<ul class="dropdown-menu">
																										<li><a href="<?php __DIR__; ?>/content/media.php">Music & Video</a></li>
																								</ul>
																					</li>
                                                                                    <!--<li class="dropdown" id="menu3"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3"> Members <b class="caret"></b> </a>
																								<ul class="dropdown-menu">
																										<li><a href="<?php __DIR__; ?>/videodb/">videoDB</a></li>
                                                                                                        <li><a href="<?php __DIR__; ?>/photos/">photos</a></li>
																								</ul>
																					</li>-->
																					<li id="nav_menu_resume"><a id="menu_resume" target="_new" href="http://damionpaulhart.github.com/">Resume</a></li>
																</ul>
												</div>
													<!-- /.nav-collapse --> 
									</div>
								<!-- /container --> 
				</div>
					<!-- /navbar-inner --> 
	</div>
<!-- /navbar -->
<div class="wrapper clearfix">
    <div class="container-fluid">
    


<h1>Human History Timeline</h1>
<p>Here is an image, you can interact with the timeline further down... </p>
<p><img src="timeline.jpg" width="400" height="93" alt="timeline" style="border:solid 1px black;">
</p>
<p><a href="example2.html">Go Directly to Full Version</a></p>
<h2>Intro</h2>
<p>Timeline uses the  <a href="http://visjs.org/index.html">vis.js</a> visualization library to dynamically display events throughout human history. </p>
<p>The events are from my own data. I combine my data with the vis.js timeline; together they make the dhart Timeline.</p>
<p>Almost 1000 events are displayed from <strong>-3500BC &quot;Writing develops&quot;</strong> to <strong>2016AD &quot;Juno spacecraft arrives at Jupiter&quot;</strong></p>
<p>A larger goal of this project is using data from anywhere such as wikipedia, data that organizations have themselves, and for individuals to document their own lives.</p>
<h2>Display</h2>
<p><strong>Understanding:</strong> Because of the number of events, it is not possible to display everything at once. You can scroll <strong>across</strong> and <strong>up/down</strong> and also zoom <strong>in/out</strong> of specific times. You can view  thousands of years or down to milliseconds.</p>
<p>The timeline can be set  with different display options. Currently, there are 2 examples for you.</p>
<h2>Example 1</h2>
<p><strong>First example:</strong> The first timeline example  is directly below. It is set to a fixed size to allow you to familiarize yourself with using the timeline. The second example further down shows the timeline expanded and is a much grander vision of history.</p>
<ul>
  <li>On a <strong>computer</strong>, use your <strong>mouse</strong> to <strong>drag</strong> the timeline <strong>across</strong> time and your <strong>scroll-wheel</strong> to zoom <strong>in/out</strong> of specific dates. </li>
  <li>On a <strong>tablet</strong> or <strong>phone</strong>, use your <strong>finger</strong> to <strong>drag</strong> the timeline <strong>across</strong> time and <strong>pinch</strong> gestures to zoom <strong>in/out</strong> of specific dates.</li>
</ul>
<p><em>Play with the timeline to get exactly the view you want.</em></p>
<div id="visualization"></div>
<p>In Example 1, when zoomed out, you may have noticed sometimes there are <strong>no events displayed on the timeline</strong>. This is because <strong>most of the events are within 1900AD to 2000AD. </strong>Because the events are stacked, it creates a vertical scrolling issue. <strong>You can zoom-in and out to fix that</strong>. Play with the timeline to get exactly the view you want. These types of display issues will be corrected in code over time, but they are also part of displaying many events.</p>
<h2>Deeper Understanding</h2>
<p>There are many features which the first example does not show.</p>
<ul>
  <li>It is possible to <strong>add</strong> and <strong>edit</strong> events by clicking directly on the timeline.</li>
  <li>Events can be <strong>links</strong> to wikipedia pages, or other online resources.</li>
  <li><strong>Images</strong>, <strong>video</strong>, <strong>audio</strong> can be used</li>
  <li>With an editable timeline the changes can be saved to a database, cloud, or file.</li>
</ul>
<p>The above features as well as a wide range of display options and  &quot;app-like&quot; functionality will be added over time. I upload my code to <a href="https://github.com/damionpaulhart/vis.js-timeline-experiments">github</a> and programmers may fork the code there.</p>
<h2>Example 2: Bigger and Better</h2>
<p>Example 2 is on a seperate page. Example 2 is large, it is not fixed-size. It will expand vertically to display as many events as it can at once. You may have to scroll up and down as well as across. Example 2 works better on a computer screen than a tablet/phone.</p>
<p>You may have to use the<em> right-hand scroll-bar</em> of the window <strong>as well as</strong> dragging within the timeline to see everything.</p>
<p>Click here to <a href="example2.html">View Example 2</a></p>
<p><a href="example2.html"><img src="example2.jpg" width="201" height="151" alt="example2" style="border:1px solid black; width:201; height:151;"></a></p>
<p>&nbsp;</p>
<h2>Further Links</h2>
<p><strong>That is all for now.</strong> You can close this tab/window. <strong>OR</strong></p>
<p>View my <a href="http://dhart.co/index_timeline.php">original version of the timeline</a> &quot;<strong>CHRONOLOGIA</strong>&quot; which used code from the <a href="http://www.simile-widgets.org/">MIT SIMILE project</a>. <a href="http://dhart.co/index_timeline.php">CHRONOLOGIA</a> may not display correctly on all devices as the code is from 2009, but it has many features which are not available in the vis.js version.</p>
<p><a href="http://dhart.co/index_timeline.php"><img src="chronologia.jpg" width="201" height="151" alt="example2" style="border:1px solid black; width:201; height:151;"></a><br>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script>
  
  // jQuery
  // make sure JSON is not cached
  $.ajaxSetup({ cache:false });



  // Create an empty DataSet.
  // This DataSet is used for two way data binding with the Timeline.
  var items = new vis.DataSet();

  // create a timeline
  var container = document.getElementById('visualization');
  var options = {
	  selectable: true,
    //editable: true,
	//type: 'point',
	align: 'left',
	maxHeight: '200px',
	stack: 'false',
    onUpdate: function (item, callback) {
      item.content = prompt('Edit items text:', item.content);
      if (item.content != null) {
        callback(item); // send back adjusted item
      }
      else {
        callback(null); // cancel updating the item
      }
    }
  };
  var timeline = new vis.Timeline(container, items, options);

  function loadData () {
    // get and deserialize the data
    //var data = JSON.parse(txtData.value);
	//var timelinedata;
	//$.getJSON('data.js', function(data) {  alert(data[0].content);});
	$.getJSON('getDBasJSON.php', handleData);
  }
  function loadDataTextArea () {
    // get and deserialize the data
    //var data = JSON.parse(txtData.value);
	handleData(data);
	//var timelinedata;
	//$.getJSON('data.js', function(data) {  alert(data[0].content);});
	//$.getJSON('data.js', handleData);
  }
  

function handleData(data)
{
		//alert(data[0].content);
 // update the data in the DataSet
    //
    // Note: when retrieving updated data from a server instead of a complete
    // new set of data, one can simply update the existing data like:
    //
    //   items.update(data);
    //
    // Existing items will then be updated, and new items will be added.
    items.clear();
    items.add(data);

    // adjust the timeline window such that we see the loaded data
    timeline.fit();
	//txtData.value = JSON.stringify(data, null, 2);
}
  
  
  //btnLoad.onclick = loadData;
  //btnLoadTextArea.onclick = loadDataTextArea;

  function saveData() {
    // get the data from the DataSet
	
    // Note that we specify the output type of the fields start and end
    // as ISODate, which is safely serializable. Other serializable types
    // are Number (unix timestamp) or ASPDate.
    //
    // Alternatively, it is possible to configure the DataSet to convert
    // the output automatically to ISODates like:
    //
    //   var options = {
    //     type: {start: 'ISODate', end: 'ISODate'}
    //   };
    //   var items = new vis.DataSet(options);
    //   // now items.get() will automatically convert start and end to ISO dates.
    //
    var data = items.get({
      type: {
        start: 'ISODate',
        end: 'ISODate'
      }
    });
	
	//alert(JSON.stringify(data, null, 2));

    // serialize the data and put it in the textarea
    txtData.value = JSON.stringify(data, null, 2);
	//var dama = "test=5&action=test";
	var dama = JSON.stringify(data, null, 2);
	var someJSON = { "apiKey": "23462", "method": "example", "ip": "208.74.35.5" };
	//dph
	// jQuery ajax attempt to write to server
	$.ajax({
            type: "POST",
            url: "write-to-file.php",
            data: dama,
        dataType: "json",
            success: function(result) {
                alert("success");
				//$('#notification').append(result)
                //.fadeIn(1500, function() {
				//});
			}
        });
  }
  //btnSave.onclick = saveData;

  // load the initial data
  loadData();
  

</script>
    </div><!-- /container -->
</div> <!-- /wrapper -->
<?php
	require_once(dirname(__FILE__) . '/../../footer.php');
	// get_header();
?>