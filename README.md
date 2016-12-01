#项目名称
基于Thinkphp开发的电子商城

##author:penn
##email:penn_z@aliyun.com

##项目背景/作用介绍
第一个php项目，学基础有段时间了，尝试着使用框架开发一个项目巩固一下技能。
本项目是电子商城系统，html静态页模板运用了Amaze UI前端模板。
后端完全基于thinkphp,包括首页、搜索、个人信息管理、个人订单管理、购物车、立即购买等。
当然还包括一套后台的系统管理：分类管理、商品管理、会员管理、管理员管理、订单管理、评论管理等。
本项目很丑陋啦，第一个项目，也耗费了很大功夫，以后会慢慢进步的～～～

####示例:  
![首页实例](https://github.com/penn-z/myshop/raw/master/instrution/show the index.png)
![个人信息](https://github.com/penn-z/myshop/raw/master/instrution/show the information of person.png)
![个人订单管理](https://github.com/penn-z/myshop/raw/master/instrution/show the mangements of order.png)
![后台管理](https://github.com/penn-z/myshop/raw/master/instrution/back-stage mangement.png)
###特性（可选）
- 没想到写什么

###原理说明（可选）
- 原理什么的待补- -~!


### 下载安装
该的项目是linux ubuntu下开发的，故而我使用的是LMAP组合。
要进入项目，当然是要配置该项目的虚拟主机地址。(配置Apache)
虚拟主机地址指向该项目的根目录下就好。linux记得重写伪静态，sudo a2enmod rewrite
最后需要给相应权限，给/App目录下的Runtime目录777权限（动态生成各种缓存，日志等）,同样给/Public目录下的Uploads目录777权限（上传图片等用）
###使用方法
进入首页的话，直接输入你配置好的虚拟主机地址即可。
进入后台管理的话，xxx.xxxx.xxxx/admin/admin	后台管理员，超级管理员为account:penn password:123456

### 注意事项
这里有个问题需注意下：我写代码时，没考虑周全，把删除图片的绝对路径写成了/var/www/...
故而造成了，如果要正常删除图片（商品编辑图片，个人头像更换头像时）不报错的话，需要把项目放在/var/www/目录下，变成/var/www/项目名/....
如果是在其他目录下，能正常运行，但是会出现图片无法删除冗余的情况，好吧，原谅我，有时间再修复～～

###TODO（可选）
还有好多地方没实现的，待补。。。

## License
遵守的协议
