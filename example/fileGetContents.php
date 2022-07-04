<?php
//配置信息
$iiiLabVideoDownloadURL = "http://service.iiilab.com/video/download";   //iiiLab通用视频解析接口
$client = "";   //iiiLab分配的客户ID
$clientSecretKey = "";  //iiiLab分配的客户密钥


//必要的参数
$link = "https://weibo.com/tv/v/EFSNuE1Ky";
$timestamp = time() * 1000;
$sign = md5($link . $timestamp . $clientSecretKey);


function file_get_contents_post($url, $post) {
    $options = array(
            "http"=> array(
                "method"=>"POST",
                "header" => "Content-type: application/x-www-form-urlencoded",
                "content"=> http_build_query($post)
            ),
    );
    $result = file_get_contents($url,false, stream_context_create($options));
    return $result;
}

$data = file_get_contents_post($iiiLabVideoDownloadURL, array("link" => $link, "timestamp" => $timestamp, "sign" => $sign, "client" => $client));
var_dump($data);