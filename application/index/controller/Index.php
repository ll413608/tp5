<?php
namespace app\index\controller;

use \think\Db;

class Index extends \think\Controller
{
    public function index()
    {
        $data = Db::table('TestInfo')->order('id desc')->limit(100)->select();
        var_dump($data);
        return url();
    }

    public function test()
    {
        return $this->fetch();
    }

    public function insert()
    {
        $dataInfo = ['type' => 'test呀', 'info' => '测试'];
        $result = Db::table('TestInfo')->insert($dataInfo);
        return $result;
    }

    public function job()
    {
        for($i = 0; $i < 10; $i++) {
            $data = '任务生产时间：' . date('Y-m-d H:i:s');
            \think\Queue::push('index/JobTest', $data = $data, $queue = null);
        }
        return '任务已经生产完毕';
    }
}
