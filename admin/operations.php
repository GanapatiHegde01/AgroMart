<?php
require("connection.php");
// Functions
function image_upload($img)
{
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999) . $img['name'];
    $new_loc = UPLOAD_SRC . $new_name;
    if (!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location: index.php?alert=img_upload_failed");
        exit;
    } else {
        return $new_name;
    }
}
function image_remove($img)
{
    if (!unlink(UPLOAD_SRC . $img)) {
        header("location:index.php?alert=img_remove_failed");
        exit;
    }
}


//  APIs for Events

if (isset($_POST['addevent'])) {
    foreach ($_POST as $key => $value) {
        $_POST['$key'] = mysqli_real_escape_string($con, $value);
    }

    $img_path = image_upload($_FILES['E_image']);
    $Event_name  = $_POST['Ename'];
    $Event_description = mysqli_real_escape_string($con, $_POST['Edescription']);
    $query = "INSERT INTO `product_category`(Eid,Ename,Edescription,Eimage)VALUES('','$Event_name', '$Event_description', '$img_path')";
    if (mysqli_query($con, $query)) {
        header("location:viewCategory.php?success=added");
    } else {
        header("location:addCategory.php?alert=add_filed");
    }
}

if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    $query = "SELECT * FROM `product_category` WHERE `Eid`='$_GET[rem]'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['Eimage']);

    $query = "DELETE FROM `product_category` WHERE `Eid`='$_GET[rem]'";
    if (mysqli_query($con, $query)) {
        header("location:viewCategory.php?success=removed");
    } else {
        header("location:viewCategory.php?alert=remove_failed");
    }
}

if (isset($_POST['update_event'])) {
    foreach ($_POST as $key => $value) {
        $_POST['$key'] = mysqli_real_escape_string($con, $value);
    }
    $desc = '';
    if (file_exists($_FILES['Eimage']['tmp_name']) || is_uploaded_file($_FILES['Eimage']['tmp_name'])) {
        $query = "SELECT * FROM `product_category` WHERE `Eid`='$_POST[editpid]'";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        image_remove($fetch['Eimage']);

        $imgpath = image_upload($_FILES['Eimage']);
        $desc = mysqli_real_escape_string($con, $_POST['Edescription']);
        $update = "UPDATE `product_category` SET `Ename`='$_POST[Ename]',`Edescription`='$desc',`Eimage`='$imgpath' WHERE `Eid`='$_POST[editpid]'";
    } else {
        $desc = mysqli_real_escape_string($con, $_POST['Edescription']);
        $update = "UPDATE `product_category` SET `Ename`='$_POST[Ename]',`Edescription`='$desc' WHERE `Eid`='$_POST[editpid]'";
    }
    if (mysqli_query($con, $update)) {
        header("location:viewCategory.php?success=updated");
    } else {
        header("location:updateCategory.php?alert=update_failed");
    }
}

// Apis for Menu Category




if (isset($_POST['addcat'])) {
    foreach ($_POST as $key => $value) {
        $_POST['$key'] = mysqli_real_escape_string($con, $value);
    }
    $img_path = image_upload($_FILES['Category_image']);
    $e_id = $_POST['eid'];
    $Category_name = $_POST['catname'];
    $Category_description = mysqli_real_escape_string($con,  $_POST['catdesc']);
    $price = $_POST['price'];
    $mquantity = $_POST['mquantity'];
    $query = "INSERT INTO `product`(mc_name,mc_description,mc_image,Eid,price,mquantity)VALUES('$Category_name', '$Category_description',
'$img_path', ' $e_id', '$price', '$mquantity')";
    if (mysqli_query($con, $query)) {
        header("location:viewMenuCat.php?success=added");
    } else {
        header("location:menu_category.php?alert=add_filed");
    }
}

if (isset($_GET['rem1']) && $_GET['rem1'] > 0) {
    $query = "SELECT * FROM `product` WHERE `mc_id`='$_GET[rem1]'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['mc_image']);

    $query = "DELETE FROM `product` WHERE `mc_id`='$_GET[rem1]'";
    if (mysqli_query($con, $query)) {
        header("location:viewMenuCat.php?success=removed");
    } else {
        header("location:viewMenuCat.php?alert=remove_failed");
    }
}

if (isset($_POST['update_menucat'])) {
    foreach ($_POST as $key => $value) {
        $_POST['$key'] = mysqli_real_escape_string($con, $value);
    }
    $mcdesc = '';
    if (file_exists($_FILES['mc_image']['tmp_name']) || is_uploaded_file($_FILES['mc_image']['tmp_name'])) {
        $query = "SELECT * FROM `product` WHERE `mc_id`='$_POST[editpid1]'";

        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        image_remove($fetch['mc_image']);

        $imgpath = image_upload($_FILES['mc_image']);
        $mcdesc = mysqli_real_escape_string($con, $_POST['Mcdescription']);
        $price = $_POST['price'];
        $mquantity =  $_POST['mquantity'];
        $update = "UPDATE `product` SET `mc_name`='$_POST[Mcname]',`mc_description`='$mcdesc',`mc_image`='$imgpath',`Eid`=$_POST[Eid],`price`=$price,`mquantity`=$mquantity WHERE mc_id='$_POST[editpid1]'";
    } else {
        $mcdesc = mysqli_real_escape_string($con, $_POST['Mcdescription']);
        $price = $_POST['price'];
        $mquantity =  $_POST['mquantity'];
        $update = "UPDATE `product` SET `mc_name`='$_POST[Mcname]',`mc_description`='$mcdesc',`Eid`='$_POST[Eid]',`price`=$price,`mquantity`=$mquantity
WHERE `mc_id`='$_POST[editpid1]'";
    }
    if (mysqli_query($con, $update)) {
        header("location:viewMenucat.php?success=updated");
    } else {
        header("location:updateProduct.php?alert=update_failed");
    }
}

// Apis for Menu 

// if (isset($_POST['addmenu'])) {
//     foreach ($_POST as $key => $value) {
//         $_POST['$key'] = mysqli_real_escape_string($con, $value);
//     }
//     $img_path = image_upload($_FILES['Mimage']);
//     $e_id = $_POST['Eid'];
//     $ec_id = $_POST['mc_id'];
//     $Menu_name  = $_POST['Mname'];
//     $Menu_description = mysqli_real_escape_string($con, $_POST['Mdescription']);
//     $price = $_POST['price'];

//     $query = "INSERT INTO `menu`(menu_name,m_description,m_image,Eid,mc_id,price)VALUES('$Menu_name', '$Menu_description','$img_path','$e_id','$ec_id', '$price')";
//     if (mysqli_query($con, $query)) {
//         header("location:viewMenu.php?success=added");
//     } else {
//         header("location:addMenus.php?alert=add_filed");
//     }
// }

if (isset($_GET['rem2']) && $_GET['rem2'] > 0) {
    $query = "SELECT * FROM `menu` WHERE `m_id`='$_GET[rem2]'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['m_image']);

    $query = "DELETE FROM `menu` WHERE `m_id`='$_GET[rem2]'";
    if (mysqli_query($con, $query)) {
        header("location:viewMenu.php?success=removed");
    } else {
        header("location:viewMenu.php?alert=remove_failed");
    }
}

if (isset($_POST['update_menu'])) {
    foreach ($_POST as $key => $value) {
        $_POST['$key'] = mysqli_real_escape_string($con, $value);
    }
    $mdesc = '';
    if (file_exists($_FILES['Mimage']['tmp_name']) || is_uploaded_file($_FILES['Mimage']['tmp_name'])) {
        $query = "SELECT * FROM `menu` WHERE `m_id`='$_POST[editpid2]'";

        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        image_remove($fetch['m_image']);
        $mdesc = mysqli_real_escape_string($con, $_POST['Mdescription']);
        $imgpath = image_upload($_FILES['Mimage']);

        $update = "UPDATE `menu` SET `menu_name`='$_POST[Mname]',`m_description`='$mdesc',`m_image`='$imgpath',`Eid`='$_POST[Eid]',`mc_id`='$_POST[mc_id]',`price`='$_POST[price]' WHERE m_id='$_POST[editpid2]'";
    } else {
        $mdesc = mysqli_real_escape_string($con, $_POST['Mdescription']);
        $update = "UPDATE `menu` SET `menu_name`='$_POST[Mname]',`m_description`='$mdesc',`Eid`='$_POST[Eid]',`mc_id`='$_POST[mc_id]',`price`='$_POST[price]' WHERE m_id='$_POST[editpid2]'";
    }
    if (mysqli_query($con, $update)) {
        header("location:viewMenu.php?success=updated");
    } else {
        header("location:updateMenu.php?alert=update_failed");
    }
}
