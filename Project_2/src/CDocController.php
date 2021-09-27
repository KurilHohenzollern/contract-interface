<?php
require 'CDocModel.php';

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
        
        $valid = ['errors'=>DocModel::validate($data)];
        if(empty($valid)) {
            DocModel::create($data);
            header('Location: /list');
            return;
            }
        }
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
