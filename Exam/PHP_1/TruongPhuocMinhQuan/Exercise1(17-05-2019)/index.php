
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PHP Practice</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  	<?php
      function getData($pageNum){
    		$curl = curl_init();

    		curl_setopt_array($curl, array(
    		  CURLOPT_URL => "https://reqres.in/api/users?page=".$pageNum,
    		  CURLOPT_RETURNTRANSFER => true,
    		  CURLOPT_CUSTOMREQUEST => "GET",
    		));

        $response = json_decode(curl_exec($curl), true);
    		$err = curl_error($curl);
    		curl_close($curl);

        return $response;
      }

      if (isset($_GET['page'])) {
         $pnum = $_GET['page'];
         $res = getData($pnum);
      }
  	 ?>
    <div class="container">
    	<h1>
    	  Get API
    	</h1>
      <ul class="nav">
        <?php
            for($i=1;$i<=$res['total_pages'];$i++){
              if($pnum==$i) $active="style='text-decoration: underline'";
              else $active="";
              echo "<li class=\"nav-item\">
                      <a  class=\"nav-link\" ".$active."href=index.php?page=".$i.">Page ".$i."</a>
                    </li>";
            }
         ?>
      </ul>
      <table class="table table-inverse">
        <thead>
          <tr>
            <th>id</th>
            <th>email</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>avatar</th>
          </tr>
        </thead>
                <tbody>
        <?php
          foreach ($res["data"] as $user) {
              echo "<tr>
                      <td>".$user['id']."</td>
                      <td>".$user['email']."</td>
                      <td>".$user['first_name']."</td>
                      <td>".$user['last_name']."</td>
                      <td>
                        <img src=".$user['avatar']." class=\"img-fluid img-thumbnail\" alt=\"Responsive image\">
                      </td>
                    </tr>";
            } 
        ?>
        </tbody>
      </table>

    </div><!-- /.container -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
