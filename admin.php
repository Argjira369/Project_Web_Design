<?php
    include "connect.php";
    $sql="SELECT ID,Name,Email,Password,registration_date FROM users";
    $result=$conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">

    <style>
        button {
        background-color: #002349;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    

    a {
        text-decoration: none;
    }
    </style>
</head>
<body>
    <div class="container">
        
        <aside id="side-bar">
            <div class="side-bar">
            
            
                <h3>Menu</h3>
                <ul>
                    <li><a href="#dashboard">Dashboard</a></li>
                    
                    <li><a href="contactadmin.php">User Contact</a></li>
                    
                    <li><a href="airportshotels.php">Airport/Hotel</a></li>
                    <li><a href="adminflightshotels.php">Flight Booking/Hotel Reservations</a></li>
                    
                    
                </ul>
               
               
    
            </div>
        </aside>
       <div class="main_content">
             <header>
                  <h1>Welcome Admin!</h1>
                  <button class="logout_btn"><a href="logout.php" style="text-decoration: none;color: #fff;font: size 16px;">Logout</a></button>
                  
            </header>
           
            <section id="bookings" class="section">
                <h2 style="display: flex;
                 justify-content: space-between;
                 align-items: center;
                margin-bottom: 20px;" >Manage users</h2>
                <button style="border: none;
                        padding: 10px 20px;
                        cursor: pointer;
                        background-color:  #002349;margin-bottom: 40px;
                        "><a style="text-decoration: none;font: size 16px;color: #fff;" href="create.php">Add a user</a></button>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Registration date</th>
                            
                        </tr>
                    </thead>
                    <tbody id="bookingTable">
                        <?php
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<tr>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['Name']}</td>
                                        <td>{$row['Email']}</td>
                                        <td>{$row['Password']}</td>
                                        <td>{$row['registration_date']}</td>
                                        <td><a href='updateUsers.php?ID=" . $row['ID'] . "'>
                                     <button>Update</button>
                                    </a> </td>
                                        <td><a href='deleteUsers.php?ID=" . $row['ID'] . "'>
                                       <button>Delete</button>
                                    </a> </td>
                                    </tr>";
                            }
                        }else{
                            echo "<tr>
                                    <td colspan='4' >No users found</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </section>
        </div>


    </div>
    <script src="login.js"> </script>
    
</body>
</html>
<?php
$conn->close();
?>