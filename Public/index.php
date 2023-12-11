<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
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

<?php

// input: 
// output: id = :id and 
// output II: id = :id and name = :name

function get_where(array $param){

    $result = array();
    foreach ($param as $key) {
        $result[] = $key .' = :'.$key;
    }
    $imp = implode(' and ',$result);
    $sql = 'SELECT * FROM users WHERE '.$imp;
    return $sql;
}

$data = array(
    'id',
    'email'
);
print_r(get_where($data));

?>

</body>
</html>




