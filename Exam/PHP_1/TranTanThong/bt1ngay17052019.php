<?php
$page =1;
if(isset($_POST['page'])){
    $page = $_POST['page'];
}else{
    $page = 1;
}

$response = file_get_contents("https://reqres.in/api/users?page=".$page);
$data = json_decode($response)->data;

$array_data = (array)$data;

?>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
        <div>
            <form action="bt1ngay17052019.php" method="post">
                <select name="page">
                    <option value="1">Page 1</option>
                    <option value="2">Page 2</option>
                    <option value="3">Page 3</option>
                    <option value="4">Page 4</option>
                </select>
                <input type="submit" value="submit">
            </form>
        </div>
        <div id="result">
            <table style="width:100%" >

                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Avatar</th>
                </tr>
                <?php foreach ($array_data as $value){ ?>
                    <tr>
                            <td><?php echo $value->id ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->first_name ?></td>
                            <td><?php echo $value->last_name ?></td>
                            <td><img src="<?php echo $value->avatar ?>"></td>
                    </tr>
                <?php }?>
            </table>
        </div>
</body>









