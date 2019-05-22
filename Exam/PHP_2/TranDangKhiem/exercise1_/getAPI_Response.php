
<?php
$link = 1;
$page = $_GET["page"] ??1;
//echo $page;
$response = file_get_contents("https://reqres.in/api/users?page=$page");
$array = json_decode($response,true);
$array_data = (array) $array;
$mangnhanduoc = ($array_data["data"]);
?>
<html>
<head>
    <title>demo php</title>
    <style type="text/css">
        .body{
            margin: 0 auto;
        }
        #wrapper,content{
            text-align: center;
            margin: auto;
            padding: 2px;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            border: 1px solid #ddd;
            margin: 0 auto;
        }
        h1{
            margin: auto;
        }
        th, td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
        .content{
            margin: 0 auto;
        }
        #form1{
            margin: auto;
         }
        #page{
            margin: auto;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <h1>BAITAP_PHP</h1>
    <table border="1" >
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Avatar</th>
        </tr>
        <?php foreach($mangnhanduoc as $value){?>
            <tr>
                <td><?php echo $value["id"];?></td>
                <td><?php echo $value["email"];?></td>
                <td><?php echo $value["first_name"];?></td>
                <td><?php echo $value["last_name"];?></td>
                <td><img src="<?php echo $value["avatar"];?>"></td>
            </tr>
        <?php }?>
    </table>
</div>
<div class="content">
    <form action="bt1.php" method="get" id="form1" >
        <select name="page" id="page" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button>submit</button>
    </form>
</div>
</body>
</html>
