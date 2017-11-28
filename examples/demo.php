<?php
require 'vendor/autoload.php';

$sms = new AliyunSdk\Sms("xxx", "xxx");

$response = $sms->sendSms(
    "杜振训", // 短信签名
    "SMS_105025074", // 短信模板编号
    "18888873646", // 短信接收者
    Array (  // 短信模板中字段的值
        "code"=>"12345",
        "product"=>"dsd"
    ),
    "123"   // 流水号,选填
);
echo "发送短信(sendSms)接口返回的结果:\n";
print_r($response);

sleep(2);

$response = $sms->queryDetails(
    "18888873646",  // 手机号码
    "20170718", // 发送时间
    10, // 分页大小
    1 // 当前页码
    // "abcd" // bizId 短信发送流水号，选填
);
echo "查询短信发送情况(queryDetails)接口返回的结果:\n";
print_r($response);