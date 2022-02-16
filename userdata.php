<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head> 
<body>
    <br>
    <div style="width:80%;margin:0 auto; text-align:center;"> 
        <h1>User Data With a Subject </h1>
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        require("php/database.php");
                        $check_data_sql = "SELECT * FROM `mail`";
                        if($result = mysqli_query($con,$check_data_sql))
                        {
                                $r = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                //print_r ( $r );
                                foreach ($r as $key => $value) {
                                    echo "</br>";
                                    echo "<tr>
                                            <td>".$value["id"]."</td>
                                            <td>".$value["name"]."</td>
                                            <td>".$value["email"]."</td>
                                            <td>".$value["subject"]."</td>
                                            <td>".$value["message"]."</td>
                                            <td>
                                                <p>
                                                    <a href='#'>
                                                        <span class='glyphicon glyphicon-edit'></span>
                                                    </a>
                                                </p>
                                            </td>
                                            <td>
                                                <p >
                                                    <a href='#' style='color:red'>
                                                        <span class='glyphicon glyphicon-remove'></span>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>";
                                }
                        }
                        ?>

                
                
                </tbody>
            </table>
        </div>
  

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</html>
