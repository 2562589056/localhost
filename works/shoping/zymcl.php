<?php
session_start();
//
$ids = $_GET["ids"];
echo $ids;
if(empty($_SESSION["gwc"]))
{
    //�������Ĺ��ﳵ�ǿյģ���һ����ӣ�

    //������ﳵ���ǿյģ����ά���飬
    $arr = array(
        array($ids,1)
        //һά���飬ȡids����һ�ε������һ��
    );
    $_SESSION["gwc"]=$arr;
    //�ӵ�session����
}
else
    //���ﲻ�ǵ�һ�ε��
{
    //���жϹ��ﳵ���Ƿ��Ѿ����˸���Ʒ����$ids
    $arr = $_SESSION["gwc"];
    //�ѹ��ﳵ��״̬ȡ����

    $chuxian = false;
//����һ��������������ʾ�Ƿ���֣�Ĭ����δ����
    foreach ($arr as $v) {
        //������
        //����������������Ʒ
        if ($v[0] == $ids) //���ȡ������$v[0]����Ʒ�Ĵ��ţ�����$ids��ô��֤�����ﳵ���Ѿ�������һ����Ʒ
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
            if($arr[$i][0] == $ids)
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
                $asg = array($ids,1);
                //��һ��С����
                $arr[] = $asg;
                $_SESSION["gwc"]=$arr;
            }

}
header("location:zym.php")


?>