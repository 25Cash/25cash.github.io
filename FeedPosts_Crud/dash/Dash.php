<?php
    include 'Connection.php';
    session_start();
    if(!isset($_SESSION['feedpost'])) {
        echo "<script>
        window.location.href='../Login.php'</script> ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Feed Posts</title>
    <link rel="shortcut icon" href="../images/icons8_smiling_face_with_sunglasses_256px.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="./images/Logoo.png" type="image/x-icon">
</head>
<body>
    <div class="main-dash">
        <div class="aside">
            <h1>Feed Posts Dashboard</h1>
            <div class="links">
            <a href="">Go-Dash</a>
                <a href="#">Users</a>
                <a href="#">Posts</a>
            </div>
        </div>
        <div class="main-dashboard-container">
            <div class="nav">
                <div class="session-user">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40"><path fill="#98ccfd" d="M15.608 36.388L10.539 36.388 8.004 31.996 3.612 29.461 3.612 24.391 1.077 20 3.612 15.609 3.612 10.539 8.004 8.004 10.539 3.612 15.608 3.612 20 1.077 24.392 3.612 29.461 3.612 31.996 8.004 36.388 10.539 36.388 15.609 38.923 20 36.388 24.391 36.388 29.461 31.996 31.996 29.461 36.388 24.392 36.388 20 38.923z"/><path fill="#4788c7" d="M20,1.655l4.025,2.324l0.232,0.134h0.268h4.648l2.324,4.025L31.63,8.37l0.232,0.134l4.025,2.324 v4.648v0.268l0.134,0.232L38.345,20l-2.324,4.025l-0.134,0.232v0.268v4.648l-4.025,2.324L31.63,31.63l-0.134,0.232l-2.324,4.025 h-4.648h-0.268l-0.232,0.134L20,38.345l-4.025-2.324l-0.232-0.134h-0.268h-4.648l-2.324-4.025L8.37,31.63l-0.232-0.134 l-4.025-2.324v-4.648v-0.268l-0.134-0.232L1.655,20l2.324-4.025l0.134-0.232v-0.268v-4.648l4.025-2.324L8.37,8.37l0.134-0.232 l2.324-4.025h4.648h0.268l0.232-0.134L20,1.655 M20,0.5l-4.525,2.612H10.25L7.637,7.637L3.113,10.25v5.225L0.5,20l2.613,4.525 v5.225l4.525,2.612l2.613,4.525h5.225L20,39.5l4.525-2.612h5.225l2.613-4.525l4.525-2.612v-5.225L39.5,20l-2.613-4.525V10.25 l-4.525-2.613L29.75,3.112h-5.225L20,0.5L20,0.5z"/><path fill="none" stroke="#fff" stroke-width="3" d="M11.179 20.052L17.025 25.898 30.179 12.745"/></svg>
                    <p>Welcome, <i><?php echo $_SESSION['feedpost']; ?></i></p>
                </div>
                <div class="log">
                    <a href="Logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>