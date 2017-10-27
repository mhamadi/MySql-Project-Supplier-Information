<html>
<head>
  <title> Query 4 </title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <a href="index.html" id="title">
      <h1> MySql Project </h1>
      <h2> Done by Moe(Mohamad) Hamadi </h2>
    </a>
  </header>
  <div id="outer">
    <div id="inner">
        <h2> Answer: </h2>

  <?php
  if (isset($_POST['color'])) {

       $color=$_POST['color'];
  };
  if (isset($_POST['address'])) {

       $address=$_POST['address'];
  };



   $con = mysqli_connect("mysql.cs.mun.ca", "cs4754_mmh623", "passwordHere");
   mysqli_select_db($con, "cs4754_mmh623");
   $sql = "select Distinct P.pname  from Parts P, Catalog C, Suppliers S where P.pid=C.pid and S.sid=C.sid and
   P.color= '$color' and S.address= '$address' ";
   $result = mysqli_query($con, $sql);

   $pname = array();
   while($row = $result->fetch_assoc()){
     $pname[] = $row['pname'];
   }
   //check if the query returned a result or not
   if($pname == null){
     echo "No results found";
   }
  //echo the results of the query
   else{
   for($i=0; $i<count($pname) ; $i++){

   echo "$pname[$i] \n";
   echo "<br>";
   echo "<br>";
   }
  }
 ?>
 </div>
</div>
</body>

</html>
