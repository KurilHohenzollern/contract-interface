<?php

namespace \Models\DocModel;

require 'View.php';

class DocController
{
    public function list()
    {
        $data = ['parameters'=>DocModel::getAll()];
        View::render('docList', $data);
    }

    public function create() 
    { 
        /*$errors = [
            'company' => 'Не меньше двух символов',
        ];
        $errors['company'] = 'Не меньше двух символов';
        $errors[] = ['name' => $key, 'error' => $value['message']];*/

        

        if(!empty($_POST)) {

        $data = [
            'company' => $_POST['company'],
            'contractor' => $_POST['contractor'],
            'signer' => $_POST['signer'],

            'beginTerm' => $_POST['beginTerm'],
            'endTerm' => $_POST['endTerm'],

            'scopeOfTheAgreement' => $_POST['scopeOfTheAgreement'],
            'amount' => $_POST['amount'],

            'requisites' => $_POST['address'], $_POST['taxesID'], $_POST['payment']
        ];
        
        $errors = DocModel::validate($data);
        var_dump(!empty($errors));
        if(empty($errors)) {
            DocModel::create($data);
            header('Location: /list');
            return;
            }
        } else
        View::render('docAdd', ['errors'=>DocModel::validate($data)]);

    }

    public function update()
    {
        $data = [
            'company' => $_POST['company'],
            'contractor' => $_POST['contractor'],
            'signer' => $_POST['signer'],

            'beginTerm' => $_POST['beginTerm'],
            'endTerm' => $_POST['endTerm'],

            'scopeOfTheAgreement' => $_POST['scopeOfTheAgreement'],
            'amount' => $_POST['amount'],

            'requisites' => $_POST['address'], $_POST['taxesID'], $_POST['payment']
        ];
        
        DocModel::update();
    }

    public function delete()
    {
        DocModel::delete();
    }
}
