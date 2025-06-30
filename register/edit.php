<?php
                  include "connection.php";

                                if (isset($_POST['Register'])) {
                                    # code...
                                    $id=$_POST['id'];
                                    $fname=$_POST['fname'];
                                    $lname=$_POST['lname'];
                                    $email=$_POST['email'];
                                    $DOB=$_POST['DOB'];
                                    $address=$_POST['address'];
                                    $contact=$_POST['contact'];
                                    $password=$_POST['password'];

                            $qry=mysqli_query($con,"UPDATE `customer` SET `contact`='".$contact."',`DOB`='".$DOB."',`address`='".$address."',`email`='".$email."',`password`='".$password."',`fname`='".$fname."',`lname`='".$lname."' WHERE cid=".$id) or die(mysqli_error($con));

                                        echo "<script>alert('Profile Changed Successfully');window.location='../Login/loginform.html';</script>";
                                    
                                }
                            ?>