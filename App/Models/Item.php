<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.2
 */
class Item extends \Core\Model
{
    private static function __getUserIpAddr(){
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

    public static function saveItem($request)
    {        

        if(isset($_COOKIE[$request['entry_by']])) {
            return ['status'=>"error",'message'=> $_COOKIE[$request['entry_by']]];
        }

        $db = static::getDB();
        $insertParam = [
            'amount'=> $request['amount'],
            'buyer'=> $request['buyer'],
            'receipt_id'=> $request['receipt_id'],
            'items'=> json_encode($request['items']),
            'buyer_email'=> $request['buyer_email'],
            'buyer_ip'=> Item::__getUserIpAddr(),
            'note'=> $request['note'],
            'city'=> $request['city'],
            'phone'=> $request['phone'],
            'hash_key'=> hash('sha512', $request['receipt_id']),
            'entry_at'=> date('Y-m-d'),
            'entry_by'=> $request['entry_by']
        ];

        $columns = implode(", ",array_keys($insertParam));
        $values = "'". implode("', '",array_values($insertParam)). "'";
        $sql = "INSERT INTO buyers ({$columns}) VALUES ({$values})";

        if (!$db->query($sql)) {
            return ['status'=>"error",'message'=>"Iteam Save Failed"];            
        }

        $cookie_value = "You already insert item at ". date('Y-m-d H:i:s')." you should wait 24 hours.";
        setcookie($request['entry_by'], $cookie_value, time()+3600); 

        return ['status'=>"success",'message'=>"Item Save Successfully"];
    }  

    public static function searchItems($request)
    {
        $db = static::getDB();
        $sql = "SELECT * FROM buyers";
        $dateStatus = false;
        if (!empty($request['from_date']) && $request['to_date']) {
            $dateStatus = true;
            $sql .=" WHERE entry_at >= '{$request['from_date']}' AND entry_at <= '{$request['to_date']}'";
        }

        if (!empty($request['user_id'])) {
            if ($dateStatus) {
                $sql .=" AND entry_by = '{$request['user_id']}'";    
            }else{
                $sql .=" WHERE entry_by = '{$request['user_id']}'";
            }            
        }

        $sql .=" ORDER BY id DESC";        
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } 

}
