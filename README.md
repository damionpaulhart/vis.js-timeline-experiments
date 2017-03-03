# vis.js-timeline-experiments


<a href="http://visjs.org/">vis.js</a>, PHP, JSON based stand-alone files (no database).

<h2>Use</h2>
<ul>
<li>Load on PHP server, </li>
<li>Browse to index.html</li>
<li>Follow links on index.html to get to the subfolders containing the pages with timelines.</li>
<li>Update and edit timelines using the buttons on each individual timeline page</li>
</ul>
To create new timelines, copy one of the subfolders and paste with new name. Edit the new files following the vis.js documentation.

<h2>Flow</h2>
<ul>
<li>Pages are loaded with buttons to [load] and [save] JSON from a file on the server.</li>
<li>vis.js is used to format the JSON as a timeline.</li>
<li>Below the timeline, a textarea displays the JSON which can be edited and saved back to the file on the server. NOTE: file is overwritten on every save.</li>
</ul>








