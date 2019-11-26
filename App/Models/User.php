<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.2
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $query = $db->query('SELECT * FROM users WHERE status != 3 ORDER BY id DESC');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function registerExistCheck($request)
    {
        $db = static::getDB();
        //Exist email check
        $sql = "SELECT * FROM users WHERE email = '{$request['email']}' AND status != 3";
        $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($result)) {
            return ['status' => "error", 'message'=>"Email ({$request['email']}) already exist"];
        }

        //Exist mobile check
        $sql = "SELECT * FROM users WHERE mobile = '{$request['mobile']}' AND status != 3";
        $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return ['status' => "error", 'message'=>"Mobile ({$request['mobile']}) already exist"];
        }

        return ['status' => "success",'message'=>"No exist data found"];

    }

    private static function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public static function registerUser($request)
    {
        $db = static::getDB();
        $insertParam = [
            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> md5($request['password']),
            'mobile'=> $request['mobile'],
            'status'=> $request['status'],
            'created_by'=> 1,
            'created_ip'=> User::getUserIpAddr(),
            'created_time'=> date('Y-m-d H:i:s'),
        ];

        $columns = implode(", ",array_keys($insertParam));
        $values = "'". implode("', '",array_values($insertParam)). "'";
        $sql = "INSERT INTO users ({$columns}) VALUES ({$values})";

        if (!$db->query($sql)) {
            return ['status'=>"error",'message'=>"User register failed"];            
        }

        return ['status'=>"success",'message'=>"User register successfully"];

    }

    public static function getSingleUser($request)
    {
        $db = static::getDB();
        $sql = "SELECT * FROM users WHERE id = '{$request['id']}'";
        $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return ['status' => "error", 'message'=>"User data not found",'data'=>[]];
        }

        return ['status' => "success", 'message'=>"User data found",'data'=>$result];
    }

    public static function updateExistCheck($request)
    {
        $db = static::getDB();
        //Exist email check
        $sql = "SELECT * FROM users WHERE email = '{$request['email']}' AND id != {$request['id']} AND status != 3";
        $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($result)) {
            return ['status' => "error", 'message'=>"Email ({$request['email']}) already exist"];
        }

        //Exist mobile check
        $sql = "SELECT * FROM users WHERE mobile = '{$request['mobile']}' AND id != {$request['id']} AND status != 3";
        $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return ['status' => "error", 'message'=>"Mobile ({$request['mobile']}) already exist"];
        }

        return ['status' => "success",'message'=>"No exist data found"];

    }

    public static function updateUser($request)
    {
        $db = static::getDB();
        $sql = "UPDATE users SET ";
        $sql .= "name='{$request['name']}', email='{$request['email']}', mobile='{$request['mobile']}', status='{$request['status']}', updated_by='1', updated_ip='".User::getUserIpAddr()."', updated_time='".date('Y-m-d H:i:s')."'";
        
        if (!empty($request['password'])) {
            $sql .=", password='".md5($request['password'])."'";
        }

        $sql .=" WHERE id={$request['id']}";

        if (!$db->query($sql)) {
            return ['status'=>"error",'message'=>"User update failed"];            
        }

        return ['status'=>"success",'message'=>"User update successfully"];

    }

    public static function deleteUser($request)
    {
        $db = static::getDB();
        $sql = "UPDATE users SET status='3', updated_by='1', updated_ip='".User::getUserIpAddr()."', updated_time='".date('Y-m-d H:i:s')."'";
        $sql .= " WHERE id='{$request['id']}'";        
        
        if (!$db->query($sql)) {
            return ['status'=>"error",'message'=>"User delete failed"];            
        }

        return ['status'=>"success",'message'=>"User delete successfully"];

    }
}
