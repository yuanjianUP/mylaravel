<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('admins')}}/style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="{{asset('admins')}}/style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="{{asset('admins')}}/style/js/jquery.js"></script>
    <script type="text/javascript" src="{{asset('admins')}}/style/js/ch-ui.admin.js"></script>
    <script type="text/javascript" src="{{asset('admins')}}/layer/layer.js"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/goods/add')}}"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>审核状态</th>
                        <th>点击</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>评论</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td>
                        <td class="tc">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->goods_name}}</a>
                        </td>
                        <td>{{$v->category->cat_name}}</td>
                        <td>{{$v->goods_price}}</td>
                        <td>admin</td>
                        <td>{{$v->created_at}}</td>
                        <td></td>
                        <td>
                            <a href="{{url('admin/goods/update/'.$v->id)}}">修改</a>
                            <a href="javascript:" onclick="delGoods(this,'{{$v->id}}')">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script type="text/javascript">
        function delGoods(o,id){
            layer.confirm('你真的要删除吗',{btn:['真的','假的']},function(){
                $.ajax({
                    type:'post',
                    url:'{{url("admin/goods/del")}}',
                    data:{id:id,'_token':'{{csrf_token()}}'},
                    dataType:'json',
                    success:function(msg){
                        if(msg.info==1){
                            $(o).parent().parent().hide(1000);
                            layer.msg('删除成功',{icon:6,time:2000});
                        }else{
                            layer.msg('删除失败',{icon:5,time:2000});
                        }
                    }
                });
            },function(){

            });
        }
    </script>


</body>
</html>