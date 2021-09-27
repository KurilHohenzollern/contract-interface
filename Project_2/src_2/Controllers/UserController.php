<?php

require '/Models/UserModel.php';
require 'View.php';

class UserController
{
    public function list()
    {
        $data = ['parameters'=>UserModel::getAll()];
        View::render('userList', $data);
        
    }

    public function create()
    {
        $errors = [];

        if(!empty($_POST)) {
            $data = [];

            //$errors = UserModel::validate($data);
            if($valid = true) {
                UserModel::create();
                header('Location: /userlist');
                return;
            }  
        } else
        View::render('userAdd', ['errors'=> $errors]);
    }

    public function update()
    {
        $data = UserModel::get();
        View::render('userUp', $data);
    }

    public function delete()
    {
        $data = UserModel::$_GET('id');
        
    }
}