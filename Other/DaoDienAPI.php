<?php
require_once __DIR__ . "/../Controller/ControllerUser.php";
require_once __DIR__ . "/../Controller/ControllerNguoi.php";

//session_start();
//if (!isset($_SESSION['email'])){
//    header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
//    exit();
//}  else{
//    $controllerUser = new ControllerUser();
//    $user = $controllerUser->getUserFromEmail($_SESSION['email']);
//    if (strcmp($user->getISADMIN(), "1") != 0) {
//        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
//        exit();
//    }
//}
$controllerNguoi = new ControllerNguoi();
if (isset($_REQUEST['getDaoDien'])){

    $daoDiens = $controllerNguoi->getAllDaoDien();
    $result = array();
    foreach ($daoDiens as $item){
        $result1 = array('id' => $item->getID(), 'text' => $item->getHOTEN());
        array_push($result, $result1);
    }
   $result = array('daodien'=>$result);
    echo json_encode($result);
    exit();
}

if (isset($_REQUEST['adddaodien'])){
    $controllerNguoi->addDaoDien($_REQUEST['hoten'], $_REQUEST['ngaysinh'], $_REQUEST['quoctich'], $_REQUEST['tieusu']);
}
if (isset($_REQUEST['getSelectedDaoDien']) && isset($_REQUEST['idphim'])){
    $daoDiens = $controllerNguoi->getDaoDiensFormPhim($_REQUEST['idphim']);
    $result = array();
    foreach ($daoDiens as $daoDien) {
        $result1 = array('id' => $daoDien->getID(), 'text' => $daoDien->getHOTEN());
        array_push($result, $result1);
    }
    $result = array('daodien'=>$result);
    echo json_encode($result);
}


