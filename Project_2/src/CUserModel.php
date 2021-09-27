<?php

class UserModel
{
    public static function getAll()
    {
        $dir = 'data/users';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file == "." || $file == "..") continue;
            $data = file_get_contents('data/users/' . $file);
            $arr = json_decode($data, true);
            $arr['id'] = str_replace('.json', '', $file);
            $parameters[] = $arr;
        }
        return $parameters;
    }
    
    public static function create($data)
    {
            
            $manyFiles = opendir('data/users');
            $countJson = 1;
            while ($file = readdir($manyFiles)) {
            if ($file == '.' || $file == '..' || is_dir('data/users' . $file)) {
                continue;
            }
            $countJson++;
            }

            file_put_contents("data/users/{$countJson}.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function update($data)
    {
        $id = $_GET('id');
        file_put_contents("data/users/{$id}.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function get()
    {
        $id = $_GET('id');
        $data = file_get_contents("data/users/{$id}.json");
        $arr = json_decode($data, true);
        $parameters[] = $arr;
        return $parameters;
    }

    public static function delete($data)
    {
        
        $fileDelete = unlink("data/users/{$data}.json");
    }

    public static function validate($data)
    {
        
    }

}