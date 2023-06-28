<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
  require_once "config.php"; 
  require_once DBAPI; 
	include(HEADER_TEMPLATE);
if (isset($_POST['submit'])) {
  $secret = "YOUR_SECRET_KEY";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data = file_get_contents($url);
  $row = json_decode($data, true);

  if ($row['success'] == "true") {
    echo "<script>alert('Wow you are not a robot 😲');</script>";
  } else {
    echo "<script>alert('Oops you are a robot 😡');</script>";
  }
}

?>



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Google Recaptcha v2 - Brave Coder</title>


  <form method="post" class="container">
    <h5>Google Recaptcha</h5>
    <br>
    <div class="row">
      <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz"></div>
    </div>
    <button class="btn wave-effect wave-light" type="submit" name="submit">Check</button>
  </form>

  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
	<script src="<?php echo BASEURL; ?>js/jquery-3.6.0.min.js"></script>
	 <script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>

