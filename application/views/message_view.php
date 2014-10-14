<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>ymq</title>
    <meta name="viewport" content="initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="css/calendar.css" />
    <link rel="stylesheet" type="text/css" href="css/qq.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.Sonline.js"></script>
    <!--    <script type="text/javascript" src="js/calendar.js"></script>-->
</head>
<body>

<h1>添加活动信息</h1>

<?php

$query = $this->Message_model->show();

if($query->num_rows() > 0) {
    echo $this->table->set_heading('id', '时间', '人数', '费用', '发起人', '介绍');

    foreach($query->result() as $row) {
        $edit = anchor(site_url('message/edit/'.$row->id), '编辑') . '&nbsp;';
        $delete = anchor(site_url('message/delete/'.$row->id), '删除');

        $this->table->add_row(
            $row->aid,
            $row->time,
            $row->num,
            $row->cost,
            $row->owner,
            $row->description
        );
    }

    echo $this->table->generate();
}

echo form_open('message/post');
echo '人数：' .form_input('num');
echo '<br>费用：' .form_input('cost');
echo '<br>发起人：' .form_input('owner');
echo '<br>介绍：' .form_input('description');
echo '<br>时间：' .form_input('time');
echo form_submit('submit', '提交');

echo form_close();

?>




</body>
</html>