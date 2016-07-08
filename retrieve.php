<?PHP

include_once("connection.php");
$uname = $_GET['id'];

    $query = "SELECT * FROM status,student where student.username=status.uname and status.uname = '$uname' ORDER BY id DESC LIMIT 1"; 
    
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)){

            $data[] = $row;
    }
    echo json_encode($data);


?>