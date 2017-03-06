<?php
include '../.include.php';
$u =get('uname');
$p = get('pword');
$d = get('data');

$r=new Base\Res();

if($u==''||strlen($u)>12)$r->o(json_encode($_GET));
if(strlen($p)<100||strlen($p)>500)$r->o('密码无效');
if(strlen($d)<100||strlen($d)>500)$r->o('数据无效');
req('/lib/rsa');

$pd=decrypt($d);
$pp=decrypt($p);
if(!$pp||!$pd)$r->o('数据错误');

$passwd = Base\Comm::PasswdMd5($pp);


        $datas = $db->sel("SELECT  `pword`,`exptime`>now() as expired, `exptime` FROM `Users` WHERE uname='$u'");
        if(count($datas)!=1)$r->o('用户名或密码错误');
        $d=$datas[0];
if($d['pword']!=$passwd)$r->o('用户名或密码错误');
if($d['expired']!='1')$r->o('您的账户已过期，请到官网充值');
$exd=$d['exptime'];
$r->j['pword']=encrypt($pd.$u);
$r->j['data']=encrypt($exd);
$r->j['result']='ok';  
$r->j['msg']="登陆成功，有效期至$exd";