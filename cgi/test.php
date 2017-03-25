<?php
include '../web/.main.php';


$user=Comm/User::isLogin();
if($user)
{
    echo("<h1>已经登陆了$user</h1>");
}else{
    echo("<h1>未登陆</h1>");
}

$view['title']=666;
$html=new Main(1);
$a=post('a');
if($a)
{
    saveUser($a);echo("<h1>保存用户$a</h1>");
}

?>
<div class="container">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="a" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="b" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

<?php $html->js()?>