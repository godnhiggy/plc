<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.item1 { grid-area: header; }
.item2 { grid-area: left; }
.item3 { grid-area: main; }
.item4 { grid-area: right; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left left main main right right'
    'footer footer footer footer footer footer';
  grid-gap: 0px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
</head>
<body>


<div class="grid-container">
  <div class="item1">PLC Admin Home Page</div>
  <div class="item2"></div>
  <div class="item3">

      <br>
      <a href="record_plc.php">Record Minutes</a>
      <br>
      <a href="team_input_plc.php">Team Builder</a>
  </div>
  <div class="item4"></div>
  <div class="item5"></div>
</div>

</body>
</html>
