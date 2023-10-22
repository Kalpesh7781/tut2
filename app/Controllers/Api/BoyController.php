<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
 
class BoyController extends ResourceController
{
   
     public function addUser()
     {
        $data=['name'=>$_REQUEST['name'],
        'age'=>$_REQUEST["age"],
        'hobby'=>$_REQUEST['hobby']];
        $uservar=new UserModel();

//curl post
        // $apiURL ='https://dummyjson.com/posts/add';
    
        // $client = \Config\Services::curlrequest();
    
        // $postData = array(
           
        //     'title' => "sharma",
        //     'userId' => 15 
        // );
    
        // // Header data
        // $headerData = array(
        //     'Content-Type' => 'application/json',
        //     'Accept' => 'application/json',
        // );
    
        // // Send request
        // $response = $client->post($apiURL,[
        //     'debug' => true,
        //     'headers'=>$headerData,
        //     'json' => $postData
        // ]);

 //    if(!empty($response))


       if($uservar->insert($data))
   
       {
        $response=[
            'status'=>true,
            'message'=>"database updated"
        ];
       }
       else
       {
        $response=[
            'status'=>false,
            'message'=>"database not updated"
        ];
       }

        return $this->respondCreated($response);

     }

     public function allUsers()
     {
        
        $UserObj=new UserModel();
        $val=$UserObj->findAll();
        
        //curl request
        // $client = \Config\Services::curlrequest();
        // $va=$client->get('https://dummyjson.com/carts',['debug' => true]);
        // $val=json_decode($va->getBody());

          
        if(!empty($val))
        {
            $response=[
               
                    'status'=>true,
                    'message'=>"database values",
                    'data'=>$val


            ];
        }
        else
        {
            $response=[
               
                'status'=>false,
                'message'=>"users not found",
                'data'=>[]


        ] ; 
        }
        return $this->respondCreated($response);
     }

     public function getUser($uid)
     {
        $userob=new UserModel();
        $data=$userob->find($uid);
        if(!empty($data))
        {
            $response=[
               
                    'status'=>true,
                    'message'=>"user found",
                    'data'=>$data


            ];
        }
        else
        {
            $response=[
               
                'status'=>false,
                'message'=>"users not found",
                'data'=>[]


        ] ; 
        }
        return $this->respondCreated($response);


     }



     public function updateUser($uid)
     {
       

        $input_data = json_decode(file_get_contents('php://input'), true);
        
        $userob=new UserModel();
        $data=$userob->find($uid);
        if(!empty($data))
        {
             if(!empty($userob->update($uid,$input_data)))
             {
                $response=[
               
                    'status'=>true,
                    'message'=>"user found",
                    'data'=>$input_data


            ];

             }
        }
        else
        {
            $response=[
               
                'status'=>false,
                'message'=>"users not found",
                'data'=>[]


        ] ; 
        }
        return $this->respondCreated($response);


     }


     public function deleteUser($uid)
     {
        $userob=new UserModel();
        $data=$userob->delete($uid);
        if(!empty($data))
        {
            $response=[
               
                    'status'=>true,
                    'message'=>"user deleted",
                    'data'=>$data


            ];
        }
        else
        {
            $response=[
               
                'status'=>false,
                'message'=>"users not deleted",
                'data'=>[]


        ] ; 
        }
        return $this->respondCreated($response);


     }
}
