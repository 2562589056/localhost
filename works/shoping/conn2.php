<?php
class db
{
    public $host = "localhost";//����Ĭ�����ӷ�ʽ
    public $zhang = "root";//����Ĭ���û���
    public $mi = "123456";//����Ĭ�ϵ�����
    public $dbname = "test";//����Ĭ�ϵ����ݿ���

//��Ա����   ������ִ��sql���ķ���
    public function Query($sql,$type=1)
//����������sql��䣬�жϷ���1��ѯ������ɾ�ĵķ���
    {
//��һ�����Ӷ��󣬲�������������ĸ�
        $db = new mysqli($this->host,$this->zhang,$this->mi,$this->dbname);
		$db->query('set names utf8');
        $r = $db->query($sql);
        if($type == "1")
        {
            return $r->fetch_all();//��ѯ��䣬��������.ִ��sql�ķ��ط�ʽ��all��Ҳ���Ի���row
        }
        else
        {
            return $r;
        }
    }

}



?>