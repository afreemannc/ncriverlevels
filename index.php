<! doctype html>
<html>
<head>
  <title>Recreational River Levels</title>

  <link rel='stylesheet' href='/styles/main.css'>
</head>
<body>
  <div id='header'>

    <div id='nav-rail'>
      <a class='selected' href='/'>River Levels</a>
      <a href='/hazards'>Hazards & Safety</a>
      <a href='/about'>About NCRiverLevels.org</a>
    </div>
  </div>
  <div id='content'>
    <h1>Recreational river levels around the Triangle</h1>
    <p>Know before you row!</p>
    <div id='river-details'>
      <?php
        require_once('includes/show-levels.php');
        print show_levels();
      ?>
    </div>
    <div id='sidebar'>
      <p>
Each of these rivers is frequently paddled by recreational boaters. The Haw and the Cape Fear have both had major incidents requiring EMS intervention in the last year. High water, paddling drunk or stoned, and not wearing a life jacket are the most common contributing factors to life threatening accidents on our local rivers.
      </p>
    </div>
  </div>
  <div class='clear'></div>
  <div id='footer'>
    <p>
All information on these and associated pages, including (but not limited to) descriptions of hazards, avoidance strategies, and gauges and levels is subject to change without notice.
 Like a guidebook, these pages are intended as a service to the paddling community and should never be viewed as a substitute for careful river-reading, scouting, and assessment of skills.
    </p>
    <p> 
Recommendations about water levels do not constitute a determination of conditions under which a stream is “safe.” Most of the area rivers have significant objective hazards (wood, undercut rocks and banks, rapids, etc) present regardless of water level.
    </p>
    <p>
See the <a href='https://c.ymcdn.com/sites/www.americancanoe.org/resource/resmgr/sei-educational_resources/know_your_limits-aca.pdf'>American Canoe Association "Know Your Limits" brochure</a> for recommendations re. safe operation and descriptions of the International Scale of River Difficulty.

Neither NC River Levels .org, its officers, directors, employees, nor the volunteers who provide information in these pages can be held liable for any decisions based on the information provided in these pages. For questions or comments about content on this site email <a href='mailto:contact@ncriverlevels.org'>contact@ncriverlevels.org</a>.
    </p>
  </div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101262030-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>
