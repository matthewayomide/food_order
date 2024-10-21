<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) // Checking whether the Session is Set or Not
            {
                echo $_SESSION['add']; // Display  the Session Message if Set
                unset($_SESSION['add']);  // Remove Session Message
            }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                     <td>Full Name:</td>
                     <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                     </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php") ?>

<?php
// Process value from form and save it in the database

//  Check wether the submit button is clicked or not
if(isset($_POST['submit']))
{

    // button clicked
    // echo"button clicked";

    // 1. Get data from the form
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 2. SQL Query to save data in the database
    $sql= "INSERT INTO tbl_admin SET
      full_name = '$fullname',
      username = '$username',
      password = '$password'

    ";
 
   // 3. Executing  Query and Saving Data into Database 
   $res = mysqli_query($conn,$sql) or die(mysqli_error());

// 4. check whether Query is executed or not and display appropriate message
if($res == True){
    // Data Inserted
    // echo"Data Inserted";
    // Create a Session Variable to Display Message
    $_SESSION['add'] = "<div class='success'>Admin Added Successfully </div>";
    // Redirect Page to manage admin
    header("Location:".SITEURL.'admin/manage_admin.php');
}
else{
    // Failed to insert Data
    // echo"Failed to Insert Data";
     // Create a Session Variable to Display Message
     $_SESSION['add'] = "<div class='error'>Failed to Add Admin </div>";
     // Redirect Page to Add admin
     header("Location:".SITEURL.'admin/manage_admin.php');
}
}

?>