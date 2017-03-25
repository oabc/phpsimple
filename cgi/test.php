<?php
include '../web/.main.php';

req('/lib/rsa');
var_dump($_GET);
var_dump($_POST);
echo ("<h1>s</h1>");
$d='sdf';
$d=encrypt($d);
echo ("<h1>$d</h1>");
$d=decrypt($d);
echo ("<h1>$d</h1>");
echo ("<h1>o</h1>");

$view['title']=666;
$html=new Main(1);
$a=post('a');
if($a)
{
    cset('a',$a);echo'set ok';
}
$a=cget('a');

?>
<div class="container">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="a" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="b" value="<?php echo $a?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

<?php $html->js()?>