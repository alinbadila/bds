<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <title>B.D.S. - Calendar</title>
    <meta name='description' content='Calendar'>
    <meta name='keywords' content='website keywords, website keywords'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' href='../css/fullcalendar.css'>
    <script src='../js/jquery.js'></script>
	<script src='../js/moment.min.js'></script>
	<script src='../js/fullcalendar.js'></script>
	<script src="../js/ro.js"></script>
	<script>
	$(document).ready(function() {

    // page is now ready, initialize the calendar...

    	$('#calendar').fullCalendar({
        // put your options and callbacks here
        header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
		lang: 'ro',
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true // allow "more" link when too many events
    	})
	});
	</script>
</head>

<body>
    <div id='main'>
        <nav>
            <div id='menubar'>
                <ul id='nav'>
                    <li class='current'><a href='../index.php'>Acasă</a></li>

                    <li><a href='deconectare.php'>Ieșire</a></li>

                    <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
                </ul>
            </div><!--close menubar-->
        </nav>

        <div id='site_content'>
            <h2>Calendarul subunității</h2>
            <div class="calendar">
	        	<div id='calendar'></div>
            </div>

            <footer><a href='../index.php'>Acasă</a> | <a>Contact</a><br>
            <br></footer>
        </div>
    </div>
    <?php else: 
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
