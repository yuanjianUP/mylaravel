<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('admins')}}/style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="{{asset('admins')}}/style/font/css/font-awesome.min.css">
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->
    @if(count($errors)>0)
        @foreach($errors->all() as $v)
            <p>{{$v}}</p>
        @endforeach
    @endif
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/goods/add')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>商品名称：</th>
                        <td>
                            <input type="text" class="lg" name="goods_name">
                        </td>
                    </tr>
                    <tr>
                        <th width="120"><i class="require">*</i>所属栏目：</th>
                        <td>
                            <select name="cat_id">
                                <option value="">==请选择==</option>
                                @foreach($category as $v)
                                <option value="{{$v->id}}">{{$v->cat_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>价格：</th>
                        <td>
                            <input type="text" class="sm" name="goods_price">元
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>缩略图：</th>
                        <td><input type="file" name="goods_thumb"></td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <textarea class="lg" name="goods_desc"></textarea>
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html>