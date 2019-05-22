<?php
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if($page<1) $page=1;
}
$response = file_get_contents('https://reqres.in/api/users?page=' . $page);
$response = json_decode($response);
print_r($response);
$total = $response->total_pages;
$user = $response->data;

?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        main {
            width: fit-content;
            margin: 0px auto;
        }

        img {
            width: 100px;
            height:: 100px;
        }

        table {
            border-collapse: collapse;
        }

        th, td, tr {
            border: black 1px solid;
        }

        th, td {
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        th {
            text-transform: uppercase;
        }
/*
        form{
            text-align: center;
            padding: 10px;
            background: bisque;

        }
*/      .links{
            text-align: center;
        }
        a{
            margin-left: 20px;
        }
    </style>
</head>
<html>
<body>
<main>
    <h1>List of user</h1>
    <table>
        <thead>
        <th>id</th>
        <th>email</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>avatar</th>
        </thead>
        <tbody>

        <?php

        foreach ($user as $item) {
            echo "<tr> <td>" . $item->id . "</td><td>" . $item->email . "</td><td>" . $item->first_name . "</td><td>"
                . $item->last_name . "</td><td><img src='" . $item->avatar . "'></td></tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="links">
        <?php
        if($page >1) echo "<a href='?page=".($page-1)."'>".($page-1)."</a>";
        echo "<a href=''>". $page. "</a>";
        if($page <$total) echo "<a href='?page=".($page+1)."'>".($page+1)."</a>";
        ?>
    </div>

 <!--   <form method="get">
        <input type="number" value="<?php /*echo $page */?>" name="page">
        <button type="submit" value="GET">GET</button>
    </form>-->
</main>
</body>
</html>
