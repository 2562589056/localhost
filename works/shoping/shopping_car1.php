 <?php
    //������ʾ���� ���ﳵ�ж��ٲ�Ʒ���Ͳ�Ʒ���ܼ۸�
    $ann=array();
    if(!empty($_SESSION["gwc"]))
    {
        $ann=$_SESSION["gwc"];

    }
	print_r($ann);
	echo "<hr color='red'>";
    $zhonglei = count($ann);
	

    $aa=0;
    foreach($ann as $k)
    {

        $k[0];//ˮ������
        $k[1];//ˮ������
        $sql1="select d_money_o from discount where d_id='{$k[0]}'";

        $danjia=$db->Query($sql1);
		print_r($danjia);
		echo "<hr color='red'>";
        foreach($danjia as $n)
        {

            $aa=$aa + $n[0]*$k[1];
        }
    }
    echo"������{$zhonglei}<br/>
	�۸�:<mark>{$aa}Ԫ";
    ?>
<?php
	session_start();
	$id = $_GET['id'];
	if(empty($_SESSION['gwc']))
	{
		 $arr = array(array($id,1));
		 $_SESSION['gwc']=$arr;
	}
	else
	{
			$chuxian = false;
			$arr = $_SESSION['gwc'];
			 foreach ($arr as $v) 
			 {
				if ($v[0] == $id) //���ȡ������$v[0]����Ʒ�Ĵ��ţ�����$ids��ô��֤�����ﳵ���Ѿ�������һ����Ʒ
				{
					$chuxian = true;
					//������֣�ֱ�Ӱ�chuxian�ĳ�true
				}
			}
		if($chuxian)
		{
			//���ﳵ���д���Ʒ
			for($i=0;$i<count($arr);$i++)
			{
				if($arr[$i][0] == $id)
				{
					//�ѵ㵽����Ʒ��ż�1
					$arr[$i][1] += 1;
				}
			}
			$_SESSION["gwc"] = $arr;
		}
		else
		{
			 //�����ֻʣ�£����ﳵ���ж��������ǲ�û�������Ʒ
			 $asg = array($id,1);
			 //��һ��С����
			 $arr[] = $asg;
			 $_SESSION["gwc"]=$arr;
		}
	}
echo "<script>";
echo  "location.href='index2.php';";
echo "</script>";
?>