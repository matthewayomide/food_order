<?php include("partials/menu.php");  ?>

     <!-- Main Content Section Start -->
        <div class="main_content">
            <div class="wrapper">
               <h1>Manage Admin</h1>
               <br> 

               <?php  
                     if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; //Displaying session Message
                        unset($_SESSION['add']);  //Removing Session Message
                     }

                     if(isset($_SESSION['delete'])){
                        echo($_SESSION['delete']);
                        unset($_SESSION['delete']);
                     }

                     if(isset($_SESSION['update'])){
                        echo($_SESSION['update']);
                        unset($_SESSION['update']);
                     }

                     if(isset($_SESSION['user-not-found'])){
                        echo($_SESSION['user-not-found']);
                        unset($_SESSION['user-not-found']);
                     }

                     if(isset($_SESSION['pwd-not-match'])){
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                     }

                     if(isset($_SESSION['change-pwd'])){
                           echo $_SESSION['change-pwd'];
                           unset($_SESSION['change-pwd']);
                     }
               ?>
               <br> <br>
               <!-- Button to add admin -->
                <a href="add_admin.php" class="btn-primary">Add Admin</a>
                <br> <br>
              <table class="tbl_full">
                  <tr>
                     <th>S.N.</th>
                     <th>Full Name</th>
                     <th>Username</th>
                     <th>Actions</th>
                  </tr>
                  <?php  
                     // Query to Get all Admin
                     $sql = "SELECT * FROM tbl_admin";
                     // Execute  the Query
                     $res = mysqli_query($conn, $sql);
                     // check wether the query is executed or not
                     if($res == True){
                        // Count Rows to check whether there we have data in databse or not
                        $count =mysqli_num_rows($res); // function to get all the rows in database

                        $sn = 1 ; // create a variable and assign the value to keep track of the id numeric order irrespective of the database id number
                        // Check the number of rows
                        if($count > 0){
                           // means we have data in database
                           while($rows = mysqli_fetch_assoc($res))
                           {
                              // Using while loop to get all the data from database.
                              // And while loop will run as long as we have data in our database

                              // Get individual data
                              $id = $rows['id'];
                              $full_name = $rows['full_name'];
                              $username = $rows['username'];

                              // Display  the values in our table
                              ?>
                               <tr>
                                       <td><?php echo $sn++ ?>. </td>
                                       <td><?php echo $full_name; ?> </td>
                                       <td><?php echo $username; ?></td>
                                       <td>
                                          <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                          <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                          <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                       </td>
                              </tr>
                              <?php 
                           }
                        }
                        {
                           // We do not have data in database
                        }
                     }
                  ?>
                 
              </table>

            </div>
        </div>
     <!-- Main Content Section Ends -->

   <?php include("partials/footer.php"); ?>