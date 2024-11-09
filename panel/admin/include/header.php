<?php 

 include "../assets/constant/config.php";


 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

$stmt = $conn->prepare("SELECT * FROM `login` ");
                   //print_r($stmt); exit;
                       $stmt->execute();
                        $record=$stmt->fetchAll();
                        foreach ($record as $key) { 
?>

                    <div class="topbar">

                        <nav class="navbar-custom">
                            <ul class="list-inline menu-left float-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>  
                                    <li  class="list-inline-item mt-4">
                                 <b id="time" class="ml-lg-5 pl-lg-5 d-none d-md-block"></b>
                               </li>                           
                            </ul>
                          
                            <ul class="list-inline float-right mb-0">
                                <!-- language-->
                                     
                                    <li  class="list-inline-item google-multi languge-list">
                                        <div id="google_translate_element">
                                            
                                        </div>
                                    </li>
                                <!-- language-->
                                
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="../assets/images/<?php echo $key['image']?>" alt="user" class="rounded-circle">
                                    </a><?php } ?>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Welcome</h5>
                                        </div>
                                        <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="changepass.php"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            

                            <div class="clearfix"></div>

                        </nav>

                    </div>