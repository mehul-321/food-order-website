<?php include("partials/menu.php"); ?>
        <!-- main content section starts  -->
        <div class="main-content">
        <div class="wrapper">
        <h1>Manage Admin</h1>

         <br/>
         <?php
          if(isset($_SESSION['add']))
          {
             echo $_SESSION['add']; // displaying session message
             unset($_SESSION['add']); // removing session message 
          }
          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
             unset($_SESSION['delete']);
          }
          if(isset($_SESSION['update']))
          {
             echo $_SESSION['update'];
             unset($_SESSION['update']);
          }
          if(isset($_SESSION['user-not-found']))
          {
             echo $_SESSION['user-not-found'];
             unset($_SESSION['user-not-found']);
          }
          if(isset($_SESSION['pwd-not-match']))
          {
             echo $_SESSION['pwd-not-match'];
             unset($_SESSION['pwd-not-match']);
          }
          if(isset($_SESSION['Change-pwd']))
          {
             echo $_SESSION['Change-pwd'];
             unset($_SESSION['Change-pwd']);
          }
          ?>
         </br></br></br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
       <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            
            <?php 
               $sql = "SELECT * FROM tbl_admin";
               $res = mysqli_query($conn,$sql);
                if($res == TRUE)
                {
                    
                    $count = mysqli_num_rows($res);
                    $sn = 1;
                    $cout = mysqli_num_rows($res);


                    if($count>0)
                    {
                        // we have data in adatabase
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id =$rows['id'];
                         $full_name =$rows['full_name'];
                         $username=$rows['username'];
                         ?>
                         <tr>
                             <td><?php echo $sn++;?></td>
                             <td><?php echo $full_name; ?></td>
                              <td><?php echo $username; ?></td>
                               <td>
                        <a href ="<?php echo SITEURAL ?>admin/update-password.php?id=<?php echo $id;  ?>" class="btn-primary">Change Password</a>
                        <a href ="<?php echo SITEURAL ?>admin/update-admin.php?id=<?php echo $id;  ?>" class="btn-secondary">Update Admin </a> 
                       <a href="<?php echo SITEURAL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                          </td>
                        </tr>
            
                         <?php
                        }

                    }
                else 
                {
                    // we donot have data in database
                }
            }
            
                ?>

        </table>

     </div>
    </div>
        <!-- main content section ends -->

   <?php include("partials/footer.php") ?>

        