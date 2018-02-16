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
        'add'=>'asas',
        'count'=>'ay',
        'gender'=>'male',
        'skills'=>['php'],
        'uname'=>'focusss',
        'password'=>'123',
        'dept'=>'OS'
    ];
    // $uc->create($arr);
  
    //   $user=User::find(1) ;
    // print_r($user);     
    $uc->index();