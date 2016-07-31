<?php

    if (isset($_POST['func']))
    {
        $func = $_POST['func'];
        $func();
    }
    else {
        echo "func error";
    }
    
    //查詢餐別商店數目
    function selectStoreCount()
    {
        $homeGroup = $_POST['homeGroup'];
        
        $sql = "SELECT meal1.*, meal2.* "
                . "FROM (SELECT COUNT(*) AS cnt1 FROM store WHERE location = '{$homeGroup}' AND meal = 1) AS meal1, "
                        . "(SELECT COUNT(*) AS cnt2 FROM store WHERE location = '{$homeGroup}' AND meal = 2) AS meal2" ;
        doSelectDB($sql);
    }
    //查詢商店資料
    function selectStoreData()
    {
        $homeGroup = $_POST['homeGroup']; 
	$meal = $_POST['meal'];
        $sql = "SELECT * FROM store WHERE location = '{$homeGroup}' AND meal = '{$meal}'";
        doSelectDB($sql);
    }
    
    //查詢商店菜單
    function selectStoreMenu()
    {
        $id = $_POST['id'];
	$sql = "SELECT * FROM store WHERE id = {$id}" ;
        doSelectDB($sql);
    }
    
    //新增商店
    function insertStore()
    {
        $img = "";
        if (count($_FILES) > 0)
        {
            $file = $_FILES["newUpload"];
                          
            for ($i = 0; $i < count($file['tmp_name']); $i++)
            {
                $destination = "./upload/" .$file['name'][$i];
                move_uploaded_file($file['tmp_name'][$i], $destination);
                $img = $img . $destination . ";";
            }
        }
        
        $name = $_POST['newName'];
        $address = $_POST['newAddr'];
        $tel = $_POST['newTel'];
        $homeGroup = $_POST['newGroup'];
        $meal = $_POST['newMeal'];
        
        $sql = "INSERT INTO store (name, address, telphone, location, meal, image) "
                . "VALUES ('{$name}', '{$address}', '{$tel}', '{$homeGroup}', '{$meal}', '{$img}')";

        doActionDB($sql);
        
    }
    
    //修改店家
    function editStore()
    {
        $id = $_POST['id'];
        $name = $_POST['editName'];
        $address = $_POST['editAddr'];
        $tel = $_POST['editTel'];
        
        $sql = "UPDATE store set name = '{$name}', address = '{$address}', telphone = '{$tel}' WHERE id = '{$id}'";
        
        doActionDB($sql);
    }
    
    //刪除店家
    function deleteStore()
    {
        $id = $_POST['id'];
	
	$sql = "DELETE FROM store WHERE id = {$id}";
        
        doActionDB($sql);
    }
    
    //新增、刪除、修改
    function doActionDB($sql)
    {
        $link = mysqli_connect("siangdb.c6uodrcuam0m.ap-northeast-1.rds.amazonaws.com", "root", "mesa1005", "siangdb");
        mysqli_query($link, "SET NAMES UTF-8");
        mysqli_query($link, $sql);
        mysqli_close($link);
        
        echo json_encode("OK");
    }
    
    //查詢
    function doSelectDB($sql)
    {
        $link = mysqli_connect("siangdb.c6uodrcuam0m.ap-northeast-1.rds.amazonaws.com", "root", "mesa1005", "siangdb");
        $querey = mysqli_query($link, $sql);
        
        $data = array();
        while ($row = mysqli_fetch_array($querey))
        {
            $data[] = $row;
        }
        if (count($data) > 0)
        {
            echo json_encode($data);
        }
        else
        {
            echo "NO DATA";
        }
        mysqli_close($link);
    }

?>

