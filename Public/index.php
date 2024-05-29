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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body style="background-color: #fdfdfd;">
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

       
  

    <p> </p>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 w-100 text-center" id="staticBackdropLabel">Insert Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="http://localhost/OOP/app/requests/calculator.request.php" method="post">
           
        <div class="row">
            <div class="col-md-6">
                <label for="first_name" class="col-form-label">Firstname:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="col-form-label">Lastname:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="age" class="col-form-label">Age:</label>
            <input type="text" class="form-control" name="age" id="age" required>
          </div>

          <div class="col-md-6">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" required>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="address" class="col-form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>

            <div class="col-md-6">
                <label for="contact" class="col-form-label">Contact:</label>
                <input type="text" class="form-control" name="contact" id="contact" required>
            </div>        
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form> 

    </div>
  </div>
</div>


        <form method="get" action="index.php">
                <div class="input-group mb-7" style="width: 35%; position: relative; left: 110px; margin-top: 40px; margin-bottom: 20px;">
                    <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Search" aria-describedby="button-addon2" style="border-radius: 18px 0px 0px 18px; border: 1px solid gray;">
                    <button class="btn btn-info" type="submit" id="button-addon2" style="border-radius: 0px 18px 18px 0px;
                    border: 1px solid gray;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        <?php


            $conn = ((new Database)->connect());
            $sql = "SELECT * FROM users";
            $stmt = $conn->query($sql);

            if ($stmt->rowCount() > 0) {
                echo "<div class = 'container' style='background-color: #DFDFDF; padding: 20px; border: 3px solid black; border-radius: 10px; box-shadow: 0px 20px 15px grey;'>
               
                <button type='button' class='btn btn-primary' style ='margin-bottom: 10px; margin-left: 95%;' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                    <i class='fa-solid fa-user-plus'></i>
                </button>
                
                <div class='input-group-text' style='background-color: #f1f1f1;'><table class='table table-light table-hover'><tr class = 'table-info'><th>ID</th><th>Firstname</th><th>Lastname</th><th>Age</th><th>Email</th><th>Address</th><th>Contact</th><th>Action</th></tr></thead>";
                
//result
$obj = new UserModel();
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = $obj->search($search, 'users');

    if ($result) {
        foreach ($result as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['first_name']) . "</td>
                    <td>" . htmlspecialchars($row['last_name']) . "</td>
                    <td>" . htmlspecialchars($row['age']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['contact']) . "</td>
                    <td><button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#MODAL_ID_". htmlspecialchars($row["id"]) ."'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </button> <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#MODAL_ID_DEL". htmlspecialchars($row["id"]) ."'>
                <i class='fa-solid fa-trash'></i>
                </button></td>
                </tr>
                <div class='modal fade' id='MODAL_ID_". htmlspecialchars($row["id"]) ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5 w-100 text-center' id='staticBackdropLabel1'>Update Data</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' style=' text-align:left;'>
                    <form action='http://localhost/OOP/app/requests/updaterequest.php' method='post'>
                        
                        <div class='row'>
                        <input type='hidden' class='form-control' name='id' id='id' value= '" . htmlspecialchars($row["id"]) . "' required>
                            <div class='col-md-6'>
                                <label for='first_name' class='col-form-label'>Firstname:</label>
                                <input type='text' class='form-control' name='first_name' id='first_name' value= '" . htmlspecialchars($row["first_name"]) . "' required>
                            </div>
                            <div class='col-md-6'>
                                <label for='last_name' class='col-form-label'>Lastname:</label>
                                <input type='text' class='form-control' name='last_name' id='last_name' value= '" . htmlspecialchars($row["last_name"]) . "' required>
                            </div>
                        </div>

                        <div class='row'>
                        <div class='col-md-6'>
                            <label for='age' class='col-form-label'>Age:</label>
                            <input type='text' class='form-control' name='age' id='age' value= '" . htmlspecialchars($row["age"]) . "' required>
                        </div>

                        <div class='col-md-6'>
                            <label for='email' class='col-form-label'>Email:</label>
                            <input type='text' class='form-control' name='email' id='email' value= '" . htmlspecialchars($row["email"]) . "' required>
                        </div>
                        </div>

                        <div class='row'>
                            <div class='col-md-6'>
                                <label for='address' class='col-form-label'>Address:</label>
                                <input type='text' class='form-control' name='address' id='address'  value= '" . htmlspecialchars($row["address"]) . "' required>
                            </div>

                            <div class='col-md-6'>
                                <label for='contact' class='col-form-label'>Contact:</label>
                                <input type='text' class='form-control' name='contact' id='contact' value= '" . htmlspecialchars($row["contact"]) . "' required>
                            </div>        
                        </div>



                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-warning'>Update</button>
                    </div>
                    </form> 

                    </div>
                </div>
                </div>


                <div class='modal fade' id='MODAL_ID_DEL". htmlspecialchars($row["id"]) ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5 w-100 text-center' id='staticBackdropLabel1'>Delete Data</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' style=' text-align:left;'>

                    <form action='http://localhost/OOP/app/requests/deleterequest.php' method='post'>
                        <h6 class='text-center'>Are you sure you want to delete this record?</h6>
                        <input type='hidden' name='id' placeholder='Input ID' value= '" . htmlspecialchars($row["id"]) . "' required>                            
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </div>
                    </form> 

                    </div>
                </div>
                </div>

                
                
                ";
        }

        echo "</tbody></table>";
    } else {
        echo "
        <tr>
        <th colspan = 8> Wala sa List</th>
        </tr>
        ";
    }
}               else {
                while($row = $stmt->fetch()) {
                    echo "<tbody><tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["first_name"]) . "</td><td>" . htmlspecialchars($row["last_name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["address"]) . "</td><td>" . htmlspecialchars($row["contact"]) . "</td><td><button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#MODAL_ID_". htmlspecialchars($row["id"]) ."'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </button> <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#MODAL_ID_DEL". htmlspecialchars($row["id"]) ."'>
                <i class='fa-solid fa-trash'></i>
                </button></td></tr></tbody>
                    

                <div class='modal fade' id='MODAL_ID_". htmlspecialchars($row["id"]) ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel1' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5 w-100 text-center' id='staticBackdropLabel1'>Update Data</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' style=' text-align:left;'>
                        <form action='http://localhost/OOP/app/requests/updaterequest.php' method='post'>
                            
                            <div class='row'>
                            <input type='hidden' class='form-control' name='id' id='id' value= '" . htmlspecialchars($row["id"]) . "' required>
                                <div class='col-md-6'>
                                    <label for='first_name' class='col-form-label'>Firstname:</label>
                                    <input type='text' class='form-control' name='first_name' id='first_name' value= '" . htmlspecialchars($row["first_name"]) . "' required>
                                </div>
                                <div class='col-md-6'>
                                    <label for='last_name' class='col-form-label'>Lastname:</label>
                                    <input type='text' class='form-control' name='last_name' id='last_name' value= '" . htmlspecialchars($row["last_name"]) . "' required>
                                </div>
                            </div>

                            <div class='row'>
                            <div class='col-md-6'>
                                <label for='age' class='col-form-label'>Age:</label>
                                <input type='text' class='form-control' name='age' id='age' value= '" . htmlspecialchars($row["age"]) . "' required>
                            </div>

                            <div class='col-md-6'>
                                <label for='email' class='col-form-label'>Email:</label>
                                <input type='text' class='form-control' name='email' id='email' value= '" . htmlspecialchars($row["email"]) . "' required>
                            </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='address' class='col-form-label'>Address:</label>
                                    <input type='text' class='form-control' name='address' id='address'  value= '" . htmlspecialchars($row["address"]) . "' required>
                                </div>

                                <div class='col-md-6'>
                                    <label for='contact' class='col-form-label'>Contact:</label>
                                    <input type='text' class='form-control' name='contact' id='contact' value= '" . htmlspecialchars($row["contact"]) . "' required>
                                </div>        
                            </div>



                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-warning'>Update</button>
                        </div>
                        </form> 

                        </div>
                    </div>
                    </div>


                    <div class='modal fade' id='MODAL_ID_DEL". htmlspecialchars($row["id"]) ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel1' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5 w-100 text-center' id='staticBackdropLabel1'>Delete Data</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' style=' text-align:left;'>

                        <form action='http://localhost/OOP/app/requests/deleterequest.php' method='post'>
                            <h6 class='text-center'>Are you sure you want to delete this record?</h6>
                            <input type='hidden' name='id' placeholder='Input ID' value= '" . htmlspecialchars($row["id"]) . "' required>                            
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </div>
                        </form> 

                        </div>
                    </div>
                    </div>
 
                    ";
                }   
                echo "</table></div></div>";
            } 
            
                }   else {
                echo "0 results";
            }

        
            ?>




<?php

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


<br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>




