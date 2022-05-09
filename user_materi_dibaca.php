<?php
include 'connect.php';
if (!isset($_SESSION['email'])) {
	// if ($_SESSION['email'] == "admin@gmail.com") {
	// 	header('location: mobile_admin_home.php');
	// } else {
		header("Location: login.php");
	// }

	// echo $_SESSION['email'];
	// echo date("Y-m-d H:i:s");	
}


$idmateri = $_POST['idmateri'];

$sql = "UPDATE id,ayat,renungan,sudah_baca,sudah_baca_at FROM alkitab where id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$idmateri]);

    //test 1
    // $stmt->store_result();
    // if( $stmt->num_rows > 0 )
    // {
    //     while( $stmt->fetch() ) {
    //         echo "<p><strong>" .$name. "</strong><br />" .$comment. "</p>";
    //     }
    // }
    
    //test2
    /* BK: always check whether the execute() succeeded */
if ($stmt === false) {
    echo 'gagal';
  }
  printf("%d Row inserted.\n", $stmt->affected_rows);

    //test3

// $result = $stmt->fetch();
// if( !empty( $result )
// {
//     do
//     {
//         echo "<p><strong>" .$name. "</strong><br />" .$comment. "</p>";
//     } while( $result = $stmt->fetch() ); 
// }


?>