<?php
    include_once 'controller.php';
    include_once '../config.php';
    class UserController{
        public function index()
        {
            # code...
            $users=User::all();
            render('page',array('pageTitle' => 'Manage Directory', 'users' => $users));
        }
        public function create(array $data)
        {    
            $user = new User();
            $user->username=$data['username'];        
            $user->password=password_hash($data['password'],PASSWORD_BCRYPT);
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->gender = $data['gender']; 
            $user->country = $data['count'];
            $user->status=0;
            $user->role=0;
            $user->save();
        }
        public function edit()
        {
            # code...
        }
        public function update()
        {
            # code...
        }
        public function delete($id)
        {
            # code...
            $user = new User();
            $user=User::find($id);
            $user->delete();
        }


    }
    $uc=new UserController();
    $arr=[
        'fname'=>'nora',
        'lname'=>'ashraf',
        'count'=>'ay',
        'gender'=>'male',
        'username'=>'focus',
        'password'=>'123',
        'dept'=>'OS'
    ];
//    / $uc->create($arr);
  
       $user=User::find(1) ;
    // print_r($user);
    print_r($user->posts);     
    