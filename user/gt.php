<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once '../web/.main.php';
$view['title']='GetTable Users';
$html=new Main(1);

$e=post('exptime');
$id=post('id');

if($id&&$e)
{
    if(post('iexptime')==$e)
    {
        echo"<h1>没有修改内容</h1>";
    }else{
    $r=$db->exec("UPDATE `Users` SET `exptime`='$e' WHERE `id`='$id'");
     if($r>0)
     {
         echo"<h1>更新成功{$r}条记录为{$e}</h1>";
     }
     else
     {
         echo"<h1>更新失败，数据错误</h1>";
     }}

}
$server = $db->sel('select * from Users');

?>
<h1>Users Table</h1>
<table class="table table-condensed">
<tbody>
    <tr>
        <th>ID</th>
        <th>名字</th>
        <th>性别</th>
        <th>注册时间</th>
        <th>注册IP</th>
        <th>到期时间</th>
    </tr>
<?php
for($i=0;$i<count($server);$i++)
{
?>
<tr>
<td><?php echo$server[$i]['id']?></td>
<td><?php echo$server[$i]['uname']?></td>
<td><?php echo$server[$i]['sex']==1?'男':'女'?></td>
<td><?php echo$server[$i]['regtime']?></td>
<td><?php echo$server[$i]['registerIP']?></td>
<td>
<form method="post">
<input type="hidden" name="id" value="<?php echo$server[$i]['id']?>">
<input type="hidden" name="iexptime" value="<?php echo$server[$i]['exptime']?>">
<input name='exptime' value="<?php echo$server[$i]['exptime']?>"/>
<input class="btn btn-default" type="submit" value="修改" />
</form>
</td>
</tr>
<?php
}
?>
</tbody>
</table>