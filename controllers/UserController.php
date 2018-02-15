<?php
    include_once 'controller.php';
    class UserController{
        public function create(array $data)
        {
            $user = new User();
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->addr = $data['add'];
            $user->count = $data['count'];
            $user->gender = $data['gender']; 
            $skills="";
            foreach ($data['skills'] as $value) {
                # code...
                    $skills.="#".$value;
                }   
            $user->skills=$skills;
            $user->uname=$data['uname'];        
            $user->password=password_hash($data['password'],PASSWORD_BCRYPT);       
            $user->dept=$data['dept'];                    
            $user->save();
        }


    }
    $uc=new UserController();
    $arr=[
        'fname'=>'nora',
        'lname'=>'ashraf',
        'add'=>'asas',
        'count'=>'ay',
        'gender'=>'male',
        'skills'=>['php'],
        'uname'=>'focusss',
        'password'=>'123',
        'dept'=>'OS'
    ];
    // $uc->create($arr);
  
//  $userdl=User::find_by_fname('asd') ;
//   $userdl->delete();
//   echo "Deleted";