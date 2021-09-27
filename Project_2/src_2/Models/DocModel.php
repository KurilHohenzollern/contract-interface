<?php

class DocModel
{
    public static function getAll()
    {
        $dir = 'data/docs';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file == "." || $file == "..") continue;
            $data = file_get_contents('data/docs/' . $file);
            $arr = json_decode($data, true);
            $arr['id'] = str_replace('.json', '', $file);
            $parameters[] = $arr;
        }
        return $parameters;
    }

    public static  function update()
    {
    }

    public static function delete($mustDelete)
    {
        $fileDelete = unlink("data/docs/{$mustDelete}.json");
    }

    public static function create($data)
    {


        $manyFiles = opendir('data/docs');
        $countJson = 1;
        while ($file = readdir($manyFiles)) {
            if ($file == '.' || $file == '..' || is_dir('data/docs' . $file)) {
                continue;
            }
            $countJson++;
        }

        file_put_contents("data/docs/{$countJson}.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function validate($data)
    {
        //$errors = [];
        //$valid = true;
        if(empty($data['company'])) {
            $errors[] = 'бла-бла';
            //$valid = false;
        }
        if(!empty($data['company'])) {
            $errors = [] ;
        }

        return $errors;
        /*
            $data = [
            $company = $_POST['company'],

            $contractor =  Router::getVar($_POST['contractor']),

            $signer = $_POST['signer'],
            $beginTerm = $_POST['beginTerm'],
            $endTerm = $_POST['endTerm'],
            $scopeOfTheAgreement = $_POST['scopeOfTheAgreement'],
            $amount = $_POST['amount'],
            $address = $_POST['address'], 
            $taxes = $_POST['taxesID'],
            $payment = $_POST['payment'],
            ];

            $signer = ($_POST['signer']);
            $pattern_signer = '/^.*[^А-яЁё].*$/';

            if($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                if(!preg_match($pattern_signer, $signer) {
                }
            }
        */
    }
}
