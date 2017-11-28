<?php

/*
 * 此文件用于验证短信API接口
 * 请确保文件为utf-8编码，并替换相应参数为您自己的信息后执行
 * 建议执行前执行EnvTest.php验证PHP环境
 *
 * 2017/11/19
 */

require_once 'SmsApi.php';

use Aliyun\SmsApi;

// 调用示例：
set_time_limit(0);
header('Content-Type: text/plain; charset=utf-8');  // 仅用于输出清晰，非必需

$sms = new SmsApi("LTAI49Ibha3Qy7gj", "KCL3BUGArOyoSuFAukUBLSBgWBQR7y"); // 请参阅 https://ak-console.aliyun.com/ 获取AK信息

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