<?php
function getIP(){
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {//判断SERVER里面有没有ip，因为用户访问的时候会自动给你网这里面存入一个ip
        $cip = $_SERVER['REMOTE_ADDR'];
    } elseif (getenv("REMOTE_ADDR")) {//如果没有去系统变量里面取一次 getenv()取系统变量的方法名字
        $cip = getenv("REMOTE_ADDR");
    } elseif (getenv("HTTP_CLIENT_IP")) {//如果还没有在去系统变量里取下客户端的ip
        $cip = getenv("HTTP_CLIENT_IP");
    }else {
        $cip = "";
    }
    return $cip;
}

function uploadFile($path,$file,$type=''){
    include_once (base_path().'\resources\org\Upload.php');
    $upload = new Upload(1, $path);//='./upload/product';
    if($upload->upload_file($file,$type)) {
        if($type) return ['code'=>1,'msg'=>$upload->get_msgs()]; //上传成功
        return ['code'=>1,'msg'=>$upload->get_msg()]; //上传成功
    }
    return ['code'=>0,'msg'=>$upload->get_msg()];
}

 function getLastSql() {
    DB::listen(function ($sql) {
        foreach ($sql->bindings as $i => $binding) {
            if ($binding instanceof \DateTime) {
                $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            } else {
                if (is_string($binding)) {
                    $sql->bindings[$i] = "'$binding'";
                }
            }
        }
        $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
        $query = vsprintf($query, $sql->bindings);
        print_r($query);
        echo '<br />';
    });
}