<?php

//import get and post files
require_once "./modules/Get.php";
require_once "./modules/Post.php";


//instantiate post, get class
$post = new Post();
$get = new Get();



//retrieved and endpoints and split
if(isset($_REQUEST['request'])){
    $request = explode("/", $_REQUEST['request']);
}
else{
    echo "URL does not exist.";
}



//get post put patch delete etc
//Request method - http request methods you will be using

switch($_SERVER['REQUEST_METHOD']){

    case "GET":
        switch($request[0]){

            case "students":
                echo $get->getStudents();
            break;

            case "classes":
                echo $get->getClasses();
            break;

            case "faculty":
                echo "This is my get faculty route.";
            break;

            case "quests":
                echo $get->getQuests();
            break;

            default:
                http_response_code(401);
                echo "This is invalid endpoint";
            break;
        }

    break;

    case "POST":
        switch($request[0]){
            case "students":
                echo $post->postStudents();
            break;

            case "classes":
                echo $post->postClasses();

            break;

            case "faculty":
                echo "This is my post faculty route.";
            break;

            case "quests":
                echo "This is my post quests route.";
            break;

            default:
                http_response_code(401);
                echo "This is invalid endpoint";
            break;
        }
    break;

    default:
        http_response_code(400);
        echo "Invalid Request Method.";
    break;
}



?>