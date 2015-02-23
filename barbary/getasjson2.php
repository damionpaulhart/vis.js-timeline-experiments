<?php 

//header("Content-type: text/xml"); 
header('Content-Type: application/json; charset="utf-8"');

$host = "localhost"; 
$user = "dhart219_admin"; 
$pass = "1z2x3c4v"; 
$database = "dhart219_timeline"; 

$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host."); 
mysql_select_db($database, $linkID) or die("Could not find database."); 

// Create GET requests if not in URL 
$from = !isset($_GET['from']) ? '-9999' : $_GET['from'];
$to = !isset($_GET['to']) ? '9999' : $_GET['to'];
$filter = !isset($_GET['filter']) ? '' : $_GET['filter'];


$query = "
	SELECT DISTINCT tl_events.event_id, tl_events.title, tl_events.description, tl_events.event_start_year, tl_events.event_start_month,	tl_events.event_start_day, tl_events.event_start_time, tl_events.event_end_year, tl_events.event_end_month, tl_events.event_end_day, tl_events.event_end_time, tl_tags.tag_id, tl_tags.tag 
	FROM tl_events
	INNER JOIN tl_events_tags ON tl_events.event_id = tl_events_tags.event_id
	INNER JOIN tl_tags ON tl_events_tags.tag_id = tl_tags.tag_id
	WHERE tl_events.CATEGORY NOT IN ('Personal', 'song', 'Fujitsu', 'test')
	AND tl_events.event_start_year BETWEEN " . $from . " 
	AND " . $to .  " 
	AND (tl_events.title LIKE '%" . $filter . "%' OR tl_events.description LIKE '%" . $filter . "%' OR tl_tags.tag LIKE '%" . $filter . "%')
	ORDER BY tl_events.event_start_year ASC";
/*
$query = "
	SELECT tl_events.event_id, tl_events.title, tl_events.description, tl_events.event_start_year, tl_events.event_start_month,	tl_events.event_start_day, tl_events.event_start_time, tl_events.event_end_year, tl_events.event_end_month, tl_events.event_end_day, tl_events.event_end_time, tl_tags.tag_id, tl_tags.tag 
	FROM tl_events, tl_events_tags, tl_tags
	WHERE tl_events_tags.event_id = tl_events.event_id
	AND tl_events_tags.tag_id = tl_tags.tag_id
	AND	tl_events.CATEGORY NOT IN ('Personal', 'song', 'Fujitsu', 'test')
	AND tl_events.event_start_year BETWEEN " . $from . " 
	AND " . $to .  " 
	AND (tl_events.title LIKE '%" . $filter . "%' OR tl_events.description LIKE '%" . $filter . "%' OR tl_tags.tag LIKE '%" . $filter . "%')
	ORDER BY tl_events.event_start_year ASC";
	*/
//$query = "SELECT * FROM test";
$resultID = mysql_query($query, $linkID) or die("Data not found."); 
$json_output = '[';
/* $xml_output = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"; 
 $xml_output .= "<data date-time-format=\"iso8601\" wiki-url=\"http://damionhart.com/wiki\" wiki-section=\"\">\n";
*/

// Cycle through each row of the results
for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++)
{
	$row = mysql_fetch_assoc($resultID); 
	
	//------------------------------------
	//   TEMP- MANUALLY REMOVING DUPLICATES OF events FROM DB RESULTS
	//
	if (empty($previousID))
	{
		$previousID = $row['event_id'];
		$userow = true;
	}
	else 
	{
		if($previousID == $row['event_id'])
		{
			$userow = false; // skip this row,  it is a repeat
		}
		else
		{
			$previousID = $row['event_id'];
			$userow = true;
		}
	}
	if ($userow)
	{ 
		
		//
		//---------------------------------------------------------------
		
		
		
		
		//$xml_output .= "\t<event ";
		//$xml_output .= "event_id=\"" . $row['event_id'] . "\" ";
		// append comma except firsttime. this prevents comma after last item
		if($x != 0) {$json_output .= ',';};
		$json_output .= '{';
		$json_output .= '"id": ';
		$json_output .= '"' . $row["event_id"] . '"';
		
	
		// correct start year
		// BC dates
		if (strpos($row['event_start_year'], "-") !== false){ // has -
			if (strlen($row['event_start_year']) == 2) {
				$event_start_year = str_replace("-", "-00000", $row['event_start_year']);
			}
			elseif (strlen($row['event_start_year']) == 3) { //-53
				$event_start_year = str_replace("-", "-0000", $row['event_start_year']);	
			}
			elseif (strlen($row['event_start_year']) == 4) { //-100
				$event_start_year = str_replace("-", "-000", $row['event_start_year']);	
			}
			elseif (strlen($row['event_start_year']) == 5) { //-1000
				$event_start_year = str_replace("-", "-00", $row['event_start_year']);	
			}
			elseif (strlen($row['event_start_year']) == 6) { //-10000
				$event_start_year = str_replace("-", "-0", $row['event_start_year']);	
			}
		}
		else { // AD dates
			if (strlen($row['event_start_year']) == 1) {
				$event_start_year =  "000" . $row['event_start_year'];
			}
			elseif (strlen($row['event_start_year']) == 2) {
				$event_start_year =  "00" . $row['event_start_year'];
			}
			else {
				$event_start_year = $row['event_start_year'];
			}
/*			if (strlen($row['event_start_year']) == 4) {
				$event_start_year = "00" . $row['event_start_year'];
			}
			elseif (strlen($row['event_start_year']) == 3) {
				$event_start_year =  "000" . $row['event_start_year'];
			}
			elseif (strlen($row['event_start_year']) == 2) {
				$event_start_year =  "0000" . $row['event_start_year'];
			}
			elseif (strlen($row['event_start_year']) == 1) {
				$event_start_year =  "00000" . $row['event_start_year'];
			}*/
			
		}
	
		
		//$xml_output .= 'start="' . $event_start_year . $row['event_start_month'] . $row['event_start_day'] . ' ' . $row['event_start_time'] . '" ';
		$json_output .= ', "start": ';
		$json_output .= '"' . $event_start_year;
		if (!empty($row['event_start_month'])){
			$json_output .= '-' . $row['event_start_month'];
		};
		if (!empty($row['event_start_day'])){
			$json_output .= '-' . $row['event_start_day'];
		};
		if (!empty($row['event_start_time'])){
			$json_output .= 'T' . $row['event_start_time'];
		};
		$json_output .= '"';
		
		
		
		
		
		
		
		
		
		
		
		/*//------------------------------------------------
		// correct end year
		//-------------------------------------------------
		if ($row['event_end_year'] != '') 
		{
			if (strpos($row['event_end_year'], "-") !== false)
			{ // has -
				if (strlen($row['event_end_year']) == 5) 
				{ //-1000
					$event_end_year =  str_replace("-", "-", $row['event_end_year']);
				}
				elseif (strlen($row['event_end_year']) == 4) 
				{ //-100
					$event_end_year =  str_replace("-", "-0", $row['event_end_year']);
				}
				elseif (strlen($row['event_end_year']) == 3) 
				{
					$event_end_year =  str_replace("-", "-00", $row['event_end_year']);
				}
				elseif (strlen($row['event_end_year']) == 2) 
				{
					$event_end_year =  str_replace("-", "-000", $row['event_end_year']);
				}
			}
			else {
				if (strlen($row['event_end_year']) == 4) {
					$event_end_year =  '' . $row['event_end_year'];
				}
				elseif (strlen($row['event_end_year']) == 3) {
					$event_end_year =  '0' . $row['event_end_year'];
				}
				elseif (strlen($row['event_end_year']) == 2) {
					$event_end_year =  '00' . $row['event_end_year'];
				}
				elseif (strlen($row['event_end_year']) == 1) {
					$event_end_year =  '000' . $row['event_end_year'];
				}
			}*/
			
			
			
			//$xml_output .= 'end="' . $event_end_year . $row['event_end_month'] . $row['event_end_day'] . " " . $row['event_end_time'] . 'Z" ';
		
		
		
		
		
		
		
		//}

		// end hack
		
		
		
		
		
		
		
		
		
		
		//$row['title'] = htmlspecialchars($row['title'], ENT_QUOTES, 'utf-8', $double_encode = false );
		
		//$xml_output .= "durationEvent=\"" . $row['durationEvent'] . "\" ";
		//$xml_output .= "title=\"" . $row['title'] . "\" ";
		$json_output .= ', "content": ';
		$json_output .= '"' . $row['title'] . '"';
		//$xml_output .= ">";
		$json_output .= '}';
		// Escaping illegal characters 
			//$row['description'] = htmlspecialchars($row['description'], ENT_QUOTES, 'utf-8', $double_encode = false );
	
			
		//$xml_output .= $row['description'];
		//$xml_output .= "</event>\n";
		
		
		
		
		
		
	}
} 

$json_output .= ']'; 

echo $json_output;

//$json_string = json_encode($json_output, JSON_PRETTY_PRINT);

//echo $json_string;

?>