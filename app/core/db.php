<?php
require_once 'config.php';
function koneksi()
{
  // code...
  // require_once 'config.php';
  $servername = DB_HOST;
  $database = DB;
  $username = DB_USER;
  $pass = DB_PASS;

  // Create connection
  $con_croudUser = mysqli_connect($servername, $username, $pass, $database);
  // Check connection

  if (!$con_croudUser) {
    die("<script>

    alert('Connection failed');

    </script>" . mysqli_connect_error());
  }else {
    return $con_croudUser;
  }
}

