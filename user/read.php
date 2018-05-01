<?php
  // require headers
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // include databse and object files
  include '../config/config.php';
  include '../objects/user.php';

  // Instantiate databse and user object
  $database = new Database();
  $db = $database->getConnection();

  // initialize object
  $user = new User($db);

  // query users
  $stmt = $user->read();
  $num = $stmt->rowCount();

  // check if more that 0 record found
  if ($num > 0) {
    // user array
    $user_arr = array();
    $user_arr["records"] = array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $user_record = array(
            "id" => $user_id,
            "name" => $name,
            "emai" => $email,
            "password" => $password
        );
 
        array_push($user_arr["records"], $user_record ) ;
    }
 
    echo json_encode($user_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}   