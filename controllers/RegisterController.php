<?php
    include_once 'controller.php';
    include_once '../config.php';
    class RegisterController{
        public function validate($dataArr){
            $rexName = '/^[a-z ]+$/i';
            $rexPass='/^.{6,}$/';
            $imgError="";
            $fnameError=$lnameError=$genderError=$countryError=$passwordError='';           
            ($dataArr['gender']=="male"||$dataArr['gender']=="female")?$genderError='':$fnameError='Gender must be male or female';
            preg_match($rexName,$dataArr['fname'])?$fnameError='':$fnameError='Name canot contain special chars or numbers';
            preg_match($rexName,$dataArr['lname'])?$lnameError='':$lnameError='Name canot contain special chars or numbers';
            preg_match($rexName,$dataArr['gender'])?$countryError='':$countryError='Country canot contain special chars';
            preg_match($rexPass,$dataArr['password'])?$passwordError='':$passwordError='At least six chars';
            ($dataArr['password']==$dataArr['confirmpassword'])?$confirmError='':$confirmError='Doesnot match';
            if(isset($_FILES['image'])){
                $imgError= '';
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $tmp = explode('.', $file_name);
                $file_exten = end($tmp);
                $file_ext=strtolower($file_exten);
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                   $imgError="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 5097152){
                   $imgError='File size must be excately 2 MB';
                }
                if($imgError){
                    $file_name='';
                }else{       
                   move_uploaded_file($file_tmp,"../public/images/".$file_name);
                }
               $errors=['fnameError'=>$fnameError,'lnameError'=>$lnameError,'genderError'=>$genderError,'countryError'=>$countryError,'passwordError'=>$passwordError,'imageError'=>$imageError,'confirmError'=>$confirmError];
             }
             return $errors;
        }
        public function create(array $data)
        { 
            $arrErrors=$this->validate($data);
            // $valide=TRUE;
            // foreach ($arrErrors as $value) {
            //     # code...
            //     if($value){
            //         $valide=FALSE;
            //         break;
            //     }
            // }
            isset($_FILES['image'])?$imageName= $_FILES['image']['name']:$imageName='';
            // if($value){
                $user = new User();
                $user->username=$data['username'];        
                $user->password=password_hash($data['password'],PASSWORD_BCRYPT);
                $user->fname = $data['fname'];
                $user->lname = $data['lname'];
                $user->gender = $data['gender']; 
                $user->country = $data['count'];
                $user->status=0;
                $user->role=0;
                $user->image=$imageName;
                $user->save();
            // }else{
            //     render('signup',['pageTitle'=>'Sign Up','uname'=>'','user_id'=>"",'data'=>$data,'errors'=>$arrErrors]);
            // }            
        }
        public function login(array $data){
            $password=$data['password'];
            $check='';
            if(isset($data['remember'])){
                $check=$data['remember'];
            }else{
                $check=" ";
            }
            $user=User::find_by_username($data['username']);
            $uname=$user->username;
            $comPassword=$user->password;
            if($user){
                if(password_verify($password,$comPassword)){
                    $_SESSION['uname']=$uname;
                    $_SESSION['user_id']=$user->id;
                    $_SESSION['role']=$user->role;
                    if($check=="on"){
                        setcookie("user_id", $user->id, time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie("uname", $uname, time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie("password", $password, time() + (86400 * 30), "/"); // 86400 = 1 day  
                        setcookie("log", "true", time() + (86400 * 30), "/"); // 86400 = 1 day                                              
                    }
                    header('location:PostController.php');
                }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        public function logout(){
            session_start();
           session_destroy();
           $_COOKIE['log']=="false";
            header('location:PostController.php');
        }
    }
    $uc=new RegisterController();
    if(isset($_POST['op'])&&$_POST['op']=="signup"){
        $uc->create($_POST);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if(isset($_POST['op'])&&$_POST['op']=="signin"){
        $uc->login($_POST);
    }else if(isset($_GET['logout'])){
        $uc->logout();
    }
    