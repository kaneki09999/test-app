<?php

use Config\Database;
use App\Models\UserModel;
require dirname(__DIR__).'/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <!-- <form action="http://localhost/OOP/app/requests/calculator.request.php" method="post">
        <select name="operator" id="">
            <option value="addition">Addition</option>
            <option value="subtraction">Substraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select>
        <input type="number" name="first_number" placeholder="First Number">
        <input type="number" name="second_number" placeholder="Second Number">
        <input type="submit" name="btn_submit">
    </form> -->
    <p>
        INSERT
    </p>
    <form action="http://localhost/OOP/app/requests/calculator.request.php" method="post">
       
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="age" placeholder="Age" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="address" required>
        <input type="text" name="contact" placeholder="contact" required>
        <input type="submit">
    </form> 
    <p> </p>

        <?php


            $conn = ((new Database)->connect());
            $sql = "SELECT * FROM users";
            $stmt = $conn->query($sql);

            if ($stmt->rowCount() > 0) {
                echo "<table class='table table-success table-hover'><tr class = 'table-dark'><th>ID</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Email</th><th>Address</th><th>Contact</th></tr></thead>";
                
                while($row = $stmt->fetch()) {
                    echo "<tbody style = 'border: 1px solid black;'><tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["first_name"]) . "</td><td>" . htmlspecialchars($row["last_name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["address"]) . "</td><td>" . htmlspecialchars($row["contact"]) . "</td></tr></tbody>";
                }   
                echo "</table>";
            } else {
                echo "0 results";
            }


            ?>

<p>
    UPDATE
</p>

<form action="http://localhost/OOP/app/requests/updaterequest.php" method="post">
       
       <input type="text" name="id" placeholder="id" required>
       <input type="text" name="first_name" placeholder="First Name" required>
       <input type="text" name="last_name" placeholder="Last Name" required>
       <input type="text" name="age" placeholder="Age" required>
       <input type="text" name="email" placeholder="Email" required>
       <input type="text" name="address" placeholder="address" required>
       <input type="text" name="contact" placeholder="contact" required>
       <input type="submit">
   </form> 

<p>
    DELETE
</p>
   <form action="http://localhost/OOP/app/requests/deleterequest.php" method="get">
       
       <input type="text" name="id" placeholder="Input ID" required>

       <input type="submit" value="Delete" >
       
   </form> 
<br>
   <p>
    SEARCH
   </p>
   <form method="get" action="index.php">
    <input type="text" name="search" placeholder="Search for names" required>
    <input type="submit" value="Search">
</form>
<br>

<h1></h1>
<?php

//result
$obj = new UserModel();
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = $obj->search($search, 'users');

    if ($result) {
        echo "<table class='table table-success table-hover'>
                <thead>
                    <tr class = 'table-dark'>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($result as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['first_name']) . "</td>
                    <td>" . htmlspecialchars($row['last_name']) . "</td>
                    <td>" . htmlspecialchars($row['age']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['contact']) . "</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "
        <table class='table-success' style='width: 100%; text-align: center; border: 1px solid black;'>
                <thead>
        <tr>
        <th> WALANG LAMAN </th>
        </tr>
        ";
    }
}







// REQUEST HTTP POST
           





// input: 
// output: id = :id and 
// output II: id = :id and name = :name

// function get_where(array $param){

//     $result = array();
//     foreach ($param as $key) {
//         $result[] = $key .' = :'.$key;
//     }
//     $imp = implode(' and ',$result);
//     $sql = 'SELECT * FROM users WHERE '.$imp;
//     return $sql;
// }

// $data = array(
//     'id',
//     'email'
// );
// print_r(get_where($data));

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>




