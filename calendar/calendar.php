<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- arquivos style -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/darkMode.css" rel="stylesheet">

  <title>Calendar</title>
</head>
  <!-- dark mode -->
  
  <div class="toggle">
    <input id="switch" type="checkbox" name="theme">
    <label for="switch">Toggle</label>
  </div>

<!-- -------- -->

<body>
  <div id="container">
      <div id="header">
        <div id="monthDisplay"></div>

        <div>
          <button id="backButton">Back</button>
          <button id="nextButton">Next</button>
        </div>
          
      </div>

      <div id="weekdays">
        <div>Sunday</div>
        <div>Monday</div>
        <div>Tuesday</div>
        <div>Wednesday</div>
        <div>Thursday</div>
        <div>Friday</div>
        <div>Saturday</div>
      </div>


      <!-- div dinamic -->
      <div id="calendar" ></div>

   
  </div>

  <div id="newEventModal">
    <h2>New Event</h2>

    <input id="eventTitleInput" placeholder="Event Title"/>

    <button id="saveButton"> Save</button>
    <button id="cancelButton">Cancel</button>
  </div>

  <div id="deleteEventModal">
    <h2>Event</h2>

    <div id="eventText"></div><br>


    <button id="deleteButton">Delete</button>
    <button id="closeButton">Close</button>
  </div>

  <div id="modalBackDrop"></div>


  <script src="../scripts/darkMode.js"></script>
  <script src="../scripts/main.js"></script>
  
</body>
</html>