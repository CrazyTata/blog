/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.53 : Database - new_blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`new_blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `bg_article` */

CREATE TABLE `bg_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text COMMENT '文章内容',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '最近修改时间',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类',
  `key_words` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `reply_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `image_id` int(11) DEFAULT NULL COMMENT '图片 id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='博客表';

/*Data for the table `bg_article` */

insert  into `bg_article`(`id`,`member_id`,`title`,`content`,`number`,`create_at`,`update_at`,`cate_id`,`key_words`,`reply_num`,`is_delete`,`sort`,`image_id`) values (1,1,'第一天','<p>第一天很好</p>',21,'2018-12-21 16:40:03','2018-12-25 14:09:11',1,'第一天',0,2,0,6),(2,1,'第二篇文章','<p>这是一篇很好的文章</p>',23,'2018-12-24 21:55:09','2019-01-05 18:40:26',8,'文章',0,1,10,16),(3,1,'第三篇文章','<p>这是一篇还不错的文章</p>',22,'2018-12-24 22:03:00','2019-01-05 18:39:57',7,'文章',0,1,5,15),(4,1,'php生成验证码类','<pre style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-size: 12px; font-family: &quot;Courier New&quot; !important;\">验证码在php网站中不可少，它能防止恶意的注册或者提交，防止恶意破解密码、刷票、论坛灌水、刷页等，通过验证码也能减轻服务器压力，下面分享1个好用的php验证码类供您下载使用。\n&lt;?php\n&nbsp;&nbsp;&nbsp;&nbsp;session_start();class&nbsp;Code{&nbsp;&nbsp;&nbsp;&nbsp;//资源\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$img;&nbsp;&nbsp;&nbsp;&nbsp;//画布宽度\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$width=100;&nbsp;&nbsp;&nbsp;&nbsp;//画布高度\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$height=30;&nbsp;&nbsp;&nbsp;&nbsp;//背景颜色\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$bgColor=&#39;#ffffff&#39;;&nbsp;&nbsp;&nbsp;&nbsp;//验证码\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$code;&nbsp;&nbsp;&nbsp;&nbsp;//验证码的随机种子\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$codeStr=&#39;23456789abcdefghjkmnpqrstuvwsyz&#39;;&nbsp;&nbsp;&nbsp;&nbsp;//验证码长度\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$codeLen=4;&nbsp;&nbsp;&nbsp;&nbsp;//验证码字体\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$font;&nbsp;&nbsp;&nbsp;&nbsp;//验证码字体大小\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$fontSize=16;&nbsp;&nbsp;&nbsp;&nbsp;//验证码字体颜色\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$fontColor=&#39;&#39;;&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;__construct()&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//创建验证码\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;make()\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(empty($this-&gt;font))\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;font&nbsp;=&nbsp;base_path().&#39;\\public\\out\\consola.ttf&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;create();//生成验证码\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header(&quot;Content-type:image/png&quot;);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagepng($this-&gt;img);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagedestroy($this-&gt;img);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置字体文件\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;font($font)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;font=&nbsp;$font;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置文字大小\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;fontSize($fontSize)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;fontSize=$fontSize;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置字体颜色\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;fontColor($fontColor)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;fontColor&nbsp;=&nbsp;$fontColor;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//验证码数量\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;num($num)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;codeLen=$num;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置宽度\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;width($width)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;width&nbsp;=&nbsp;$width;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置高度\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;height($height)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;height&nbsp;=&nbsp;$height;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//设置背景颜色\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;background($color)\n&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;bgColor&nbsp;=&nbsp;$color;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//返回验证码\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;get()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$_SESSION[&#39;code&#39;];\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//生成验证码\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;createCode()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$code&nbsp;=&nbsp;&#39;&#39;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;($i&nbsp;=&nbsp;0;&nbsp;$i&nbsp;&lt;&nbsp;$this-&gt;codeLen;&nbsp;$i++)&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$code&nbsp;.=&nbsp;$this-&gt;codeStr&nbsp;[mt_rand(0,&nbsp;strlen($this-&gt;codeStr)&nbsp;-&nbsp;1)];\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;code&nbsp;=&nbsp;strtoupper($code);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_SESSION[&#39;code&#39;]&nbsp;=&nbsp;$this-&gt;code;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//建画布\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;create()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!$this-&gt;checkGD())&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$w&nbsp;=&nbsp;$this-&gt;width;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$h&nbsp;=&nbsp;$this-&gt;height;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$bgColor&nbsp;=&nbsp;$this-&gt;bgColor;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$img&nbsp;=&nbsp;imagecreatetruecolor($w,&nbsp;$h);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$bgColor&nbsp;=&nbsp;imagecolorallocate($img,&nbsp;hexdec(substr($bgColor,&nbsp;1,&nbsp;2)),&nbsp;hexdec(substr($bgColor,&nbsp;3,&nbsp;2)),&nbsp;hexdec(substr($bgColor,&nbsp;5,&nbsp;2)));\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagefill($img,&nbsp;0,&nbsp;0,&nbsp;$bgColor);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;img&nbsp;=&nbsp;$img;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;createLine();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;createFont();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;createPix();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;createRec();\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//画线\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;createLine(){&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$w&nbsp;=&nbsp;$this-&gt;width;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$h&nbsp;=&nbsp;$this-&gt;height;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$line_color&nbsp;=&nbsp;&quot;#dcdcdc&quot;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$color&nbsp;=&nbsp;imagecolorallocate($this-&gt;img,&nbsp;hexdec(substr($line_color,&nbsp;1,&nbsp;2)),&nbsp;hexdec(substr($line_color,&nbsp;3,&nbsp;2)),&nbsp;hexdec(substr($line_color,&nbsp;5,&nbsp;2)));&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$l&nbsp;=&nbsp;$h/5;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for($i=1;$i&lt;$l;$i++){&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$step&nbsp;=$i*5;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imageline($this-&gt;img,&nbsp;0,&nbsp;$step,&nbsp;$w,$step,&nbsp;$color);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$l=&nbsp;$w/10;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for($i=1;$i&lt;$l;$i++){&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$step&nbsp;=$i*10;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imageline($this-&gt;img,&nbsp;$step,&nbsp;0,&nbsp;$step,$h,&nbsp;$color);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//画矩形边框\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;createRec()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//imagerectangle($this-&gt;img,&nbsp;0,&nbsp;0,&nbsp;$this-&gt;width&nbsp;-&nbsp;1,&nbsp;$this-&gt;height&nbsp;-&nbsp;1,&nbsp;$this-&gt;fontColor);&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//写入验证码文字\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;createFont()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;createCode();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$color&nbsp;=&nbsp;$this-&gt;fontColor;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!empty($color))&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fontColor&nbsp;=&nbsp;imagecolorallocate($this-&gt;img,&nbsp;hexdec(substr($color,&nbsp;1,&nbsp;2)),&nbsp;hexdec(substr($color,&nbsp;3,&nbsp;2)),&nbsp;hexdec(substr($color,&nbsp;5,&nbsp;2)));\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$x&nbsp;=&nbsp;($this-&gt;width&nbsp;-&nbsp;10)&nbsp;/&nbsp;$this-&gt;codeLen;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;($i&nbsp;=&nbsp;0;&nbsp;$i&nbsp;&lt;&nbsp;$this-&gt;codeLen;&nbsp;$i++)&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(empty($color))&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fontColor&nbsp;=&nbsp;imagecolorallocate($this-&gt;img,&nbsp;mt_rand(50,&nbsp;155),&nbsp;mt_rand(50,&nbsp;155),&nbsp;mt_rand(50,&nbsp;155));\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagettftext($this-&gt;img,&nbsp;$this-&gt;fontSize,&nbsp;mt_rand(-&nbsp;30,&nbsp;30),&nbsp;$x&nbsp;*&nbsp;$i&nbsp;+&nbsp;mt_rand(6,&nbsp;10),&nbsp;mt_rand($this-&gt;height&nbsp;/&nbsp;1.3,&nbsp;$this-&gt;height&nbsp;-&nbsp;5),&nbsp;$fontColor,&nbsp;$this-&gt;font,&nbsp;$this-&gt;code&nbsp;[$i]);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;fontColor&nbsp;=&nbsp;$fontColor;\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//画线\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;createPix()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pix_color&nbsp;=&nbsp;$this-&gt;fontColor;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;($i&nbsp;=&nbsp;0;&nbsp;$i&nbsp;&lt;&nbsp;50;&nbsp;$i++)&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagesetpixel($this-&gt;img,&nbsp;mt_rand(0,&nbsp;$this-&gt;width),&nbsp;mt_rand(0,&nbsp;$this-&gt;height),&nbsp;$pix_color);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;($i&nbsp;=&nbsp;0;&nbsp;$i&nbsp;&lt;&nbsp;2;&nbsp;$i++)&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imageline($this-&gt;img,&nbsp;mt_rand(0,&nbsp;$this-&gt;width),&nbsp;mt_rand(0,&nbsp;$this-&gt;height),&nbsp;mt_rand(0,&nbsp;$this-&gt;width),&nbsp;mt_rand(0,&nbsp;$this-&gt;height),&nbsp;$pix_color);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//画圆弧\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;($i&nbsp;=&nbsp;0;&nbsp;$i&nbsp;&lt;&nbsp;1;&nbsp;$i++)&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;设置画线宽度\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagearc($this-&gt;img,&nbsp;mt_rand(0,&nbsp;$this-&gt;width),&nbsp;mt_rand(0,&nbsp;$this-&gt;height),&nbsp;mt_rand(0,&nbsp;$this-&gt;width),&nbsp;mt_rand(0,&nbsp;$this-&gt;height)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;mt_rand(0,&nbsp;160),&nbsp;mt_rand(0,&nbsp;200),&nbsp;$pix_color);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;imagesetthickness($this-&gt;img,&nbsp;1);\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;&nbsp;//验证GD库\n&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;function&nbsp;checkGD()&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;extension_loaded(&#39;gd&#39;)&nbsp;&amp;&amp;&nbsp;function_exists(&quot;imagepng&quot;);\n&nbsp;&nbsp;&nbsp;&nbsp;}\n\n}</pre><p><br/></p>',30,'2018-12-27 14:12:19','2019-01-05 18:39:42',1,'php,验证码类',0,1,10,14),(5,1,'php7新内容总结（随时更新）','<p>话说当年追时髦，php7一出就给电脑立马装上了，php5和php7共存，也是立马写了个超级耗时间的循环脚本测了一番，确实php7给力很多，然后也是注意了一些新增的特性与一些丢弃掉的用法。&nbsp;</p><p>由于php升级乃头等大事，公司近期才打算升级，所以之前一直只能私下欣赏php7带来的快感，负责升级的小伙伴搞了个分享，还挺全的，此处mark一下，当作笔记。</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong>一.参数和返回值类型申明</strong></p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\">可以申明的有：float，int，bool，string，interfaces，array，callable</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\">一般模式：<br style=\"margin: 0px; padding: 0px;\"/>function sum(int ...$ints) {<br style=\"margin: 0px; padding: 0px;\"/>return array_sum($ints);<br style=\"margin: 0px; padding: 0px;\"/>}<br style=\"margin: 0px; padding: 0px;\"/>print(sum(2, &#39;3&#39;, 4.1)); //9<br style=\"margin: 0px; padding: 0px;\"/>严格模式：<br style=\"margin: 0px; padding: 0px;\"/>declare(strict_types=1);<br style=\"margin: 0px; padding: 0px;\"/>function sum(int ...$ints) {<br style=\"margin: 0px; padding: 0px;\"/>return array_sum($ints);<br style=\"margin: 0px; padding: 0px;\"/>}<br style=\"margin: 0px; padding: 0px;\"/>print(sum(2, &#39;3&#39;, 4.1)); //Fatal error: Uncaught TypeError: Argument 2 passed to sum() must be of the type integer, string given, ...<br style=\"margin: 0px; padding: 0px;\"/>　　<br style=\"margin: 0px; padding: 0px;\"/>返回值：<br style=\"margin: 0px; padding: 0px;\"/>declare(strict_types = 1);<br style=\"margin: 0px; padding: 0px;\"/>function returnIntValue(int $value): int {<br style=\"margin: 0px; padding: 0px;\"/>return $value + 1.0;<br style=\"margin: 0px; padding: 0px;\"/>}<br style=\"margin: 0px; padding: 0px;\"/>print(returnIntValue(5));//Fatal error: Uncaught TypeError: Return value of returnIntValue() must be of the type integer, float returned.</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">二.空合并运算符</strong><br style=\"margin: 0px; padding: 0px;\"/>isset($_GET[&#39;aa&#39;]) ? $_GET[&#39;aa&#39;] : &#39;not passed&#39;等价于$_GET[&#39;aa&#39;]??&#39;not passed&#39;;</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">三.飞船运算符</strong><br style=\"margin: 0px; padding: 0px;\"/>print( 1 &lt;=&gt; 1);//0<br style=\"margin: 0px; padding: 0px;\"/>print( 1 &lt;=&gt; 2);//-1<br style=\"margin: 0px; padding: 0px;\"/>print( 2 &lt;=&gt; 1);//1</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">四.定义数组常亮</strong><br style=\"margin: 0px; padding: 0px;\"/>define(&#39;animals&#39;, [ &#39;a&#39;, &#39;b&#39;, &#39;c&#39;]);</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">五.过滤unserialize</strong><br style=\"margin: 0px; padding: 0px;\"/>PHP 7引入了过滤的unserialize（）函数，以便在对不可信数据上的对象进行反序列化时提供更好的安全性。它可以防止可能的代码注入，并使开发人员能够对可以反序列化的类进行白名单。</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">六.use 批量声明</strong><br style=\"margin: 0px; padding: 0px;\"/>在同一个命名空间下，现在use可以批量申明<br style=\"margin: 0px; padding: 0px;\"/>use some/namespace/{ClassA, ClassB, ClassC as C};</p><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\"><strong style=\"margin: 0px; padding: 0px;\">七.支持为负的字符串偏移量</strong><br style=\"margin: 0px; padding: 0px;\"/>var_dump(&#39;abcdef&#39;[-2]);<br style=\"margin: 0px; padding: 0px;\"/>var_dump(strpos(&quot;aabbcc&quot;, &quot;b&quot;, -3));<br style=\"margin: 0px; padding: 0px;\"/><br style=\"margin: 0px; padding: 0px;\"/><strong style=\"margin: 0px; padding: 0px;\">八.foreach不再改变内部数组指针</strong><br style=\"margin: 0px; padding: 0px;\"/>$arr = [0,1,2];<br style=\"margin: 0px; padding: 0px;\"/>foreach($array as $val){<br style=\"margin: 0px; padding: 0px;\"/>　　var_dump(current($array));<br style=\"margin: 0px; padding: 0px;\"/>}<br style=\"margin: 0px; padding: 0px;\"/>php5 输出：int(1) int(2) bool(false)<br style=\"margin: 0px; padding: 0px;\"/>php7 输出：int(0) int(0) int(0)</p><p><br/></p>',24,'2018-12-27 14:28:45','2019-01-05 18:38:24',1,'php7',0,1,9,13),(6,1,'thinkphp在原字段上面进行加减操作','<p>经常有需要对某个数据表的计数字段进行加减操作，我们来看下在ThinkPHP中的具体使用办法。</p><p>最简单的，使用下面方法对score自加,第二个参数也可以不要,默认加1：</p><ol style=\"padding: 0px 0px 0px 40px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; white-space: normal; background-color: rgb(254, 254, 242);\" class=\" list-paddingleft-2\"><li><p>M(&#39;User&#39;)-&gt;where(&#39;id=5&#39;)-&gt;setInc(&#39;score&#39;,5);</p></li></ol><p>自减也是同样的道理:</p><ol style=\"padding: 0px 0px 0px 40px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; white-space: normal; background-color: rgb(254, 254, 242);\" class=\" list-paddingleft-2\"><li><p>M(&#39;User&#39;)-&gt;where(&#39;id=5&#39;)-&gt;setDec(&#39;score&#39;);</p></li></ol><p>但是上面这两发方法只能单独对一个字段进行操作，如果要几个字段一起操作的话，就需要采用表达式更新的方式了，例如：</p><ol style=\"padding: 0px 0px 0px 40px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; white-space: normal; background-color: rgb(254, 254, 242);\" class=\" list-paddingleft-2\"><li><p>$User&nbsp;=&nbsp;M(&#39;User&#39;);</p></li><li><p>$User-&gt;id&nbsp;=&nbsp;5;</p></li><li><p>$User-&gt;nickname&nbsp;=&nbsp;&#39;ThinkPHP&#39;;</p></li><li><p>$User-&gt;score&nbsp;=&nbsp;array(&#39;exp&#39;,&#39;score+5&#39;);</p></li><li><p>$User-&gt;save();</p></li></ol><p><br/></p>',30,'2018-12-27 14:32:45','2019-01-05 18:38:10',1,'thinkphp',0,1,8,12),(7,1,'安装mysql5.7报错启动失败（3534）的处理','<p>一 ，在官网下载好了mysql5.7之后，解压到对应的文件的夹下</p><p>二， 在cmd中进入到mysql下单bin目录下，一定要是管理员权限，执行mysqld --initialize 命令，会看到根目录下新生成一个data文件夹（这个文件夹以前是没有的）</p><p>三， 在mysql目录下新建一个my.ini，然后复制mysql的配置文件进去，下面是我的配置文件（my.ini）</p><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">[mysqld]</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">character</span>-set-server=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">utf8</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">#</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">绑定IPv4和3306端口</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\">bind-address = 0.0.0.0</h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">port&nbsp;</span>= 3306</h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">sql_mode</span>=&quot;STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION&quot;</h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">default_storage_engine</span>=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">innodb</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">innodb_buffer_pool_size</span>=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">1000M</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">innodb_log_file_size</span>=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">50M</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">#</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">&nbsp;设置mysql的安装目录</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\">basedir=C:/Users/tata/Desktop/wamp/<span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 128); font-size: 12px !important;\">mysql</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">#</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">&nbsp;设置mysql数据库的数据的存放目录</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\">datadir=C:/Users/tata/Desktop/wamp/<span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 128); font-size: 12px !important;\">mysql</span>/<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">data</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">#</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">&nbsp;允许最大连接数</span>&nbsp;max_connections=200</h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">#</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 0); font-size: 12px !important;\">&nbsp;skip_grant_tables</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\">[<span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 128); font-size: 12px !important;\">mysql</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">]</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 0, 255); font-size: 12px !important;\">default</span>-character-set=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">utf8</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">[</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 128, 128); font-size: 12px !important;\">mysql</span>.<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">server]</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 0, 255); font-size: 12px !important;\">default</span>-character-set=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">utf8</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">[mysql_safe]</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(0, 0, 255); font-size: 12px !important;\">default</span>-character-set=<span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">utf8</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">[client]</span></h3><h3 style=\"margin: 10px 0px; padding: 0px; font-size: 16px; line-height: 1.5; font-family: &quot;Courier New&quot;; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; font-size: 12px !important;\">port&nbsp;</span>= 3306</h3><p style=\"margin: 10px auto; padding: 0px; line-height: 1.5; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(254, 254, 242);\">注意：上面的配置文件中datadir和basedir一定要用正斜杠，用反斜杠就会导致mysql无法启动，也就是报3534错误。</p><p>四，配置文件修改好了之后执行&nbsp; net start mysql 启动数据库</p><p>五，mysql启动了之后，执行mysql -uroot -p，此时会让你输入数据库密码，这个密码是前面生成都data目录下的以当前电脑用户名命名的以.err为后缀的一个文件，打开找到下图中的这段话，选中的部分即为密码</p><p><br/></p>',25,'2018-12-27 14:38:42','2019-01-05 18:31:02',2,'mysql5.7,3534',1,1,10,11);

/*Table structure for table `bg_auth` */

CREATE TABLE `bg_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '权限名称',
  `module` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(60) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(60) NOT NULL DEFAULT '' COMMENT '方法',
  `is_btn` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否是按钮;1:不是(默认),2:是',
  `is_nav` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否是导航;1:不是(默认),2:是',
  `father_nav` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级导航;默认是一级导航,0',
  `is_delete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除，1:否(默认)',
  `order_list` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `acm` (`module`,`controller`,`action`),
  KEY `module` (`module`),
  KEY `controller` (`controller`),
  KEY `action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

/*Data for the table `bg_auth` */

/*Table structure for table `bg_category` */

CREATE TABLE `bg_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1前段显示   2不显示',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `img` varchar(255) DEFAULT NULL COMMENT '分类图标',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `is_del` tinyint(1) DEFAULT '1' COMMENT '1正常  2已删除',
  `description` text COMMENT '描述',
  PRIMARY KEY (`id`),
  KEY `pid` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='分类表';

/*Data for the table `bg_category` */

insert  into `bg_category`(`id`,`name`,`is_show`,`sort`,`img`,`parent_id`,`is_del`,`description`) values (1,'php',1,1,NULL,0,1,'php是世界上最好的语言'),(2,'mysql',1,0,NULL,0,1,'一个很好用的数据库'),(3,'linux',1,0,NULL,0,1,NULL),(4,'框架',1,0,NULL,0,1,NULL),(5,'前端',1,0,NULL,0,2,NULL),(6,'laravel',1,0,NULL,0,1,NULL),(7,'笔记',1,3,NULL,0,1,'notebook'),(8,'音乐',1,5,NULL,0,1,'听听音乐');

/*Table structure for table `bg_comment` */

CREATE TABLE `bg_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned DEFAULT '1' COMMENT '作者',
  `article_id` int(10) NOT NULL DEFAULT '0' COMMENT '文章id',
  `content` text COMMENT '评论内容',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '最近修改时间',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='评论表';

/*Data for the table `bg_comment` */

insert  into `bg_comment`(`id`,`member_id`,`article_id`,`content`,`create_at`,`update_at`,`is_delete`) values (1,1,7,'我就是想评论下','2019-01-04 16:30:48','2019-01-04 16:30:50',1),(2,1,7,'第一个留言咯','2019-01-04 19:23:11','2019-01-04 19:23:11',1),(3,1,0,'试试','2019-01-04 19:27:24','2019-01-04 19:27:24',1),(4,1,0,'再试试','2019-01-04 19:32:13','2019-01-04 19:32:13',1),(5,1,0,'再来试试','2019-01-04 19:34:01','2019-01-04 19:34:01',1);

/*Table structure for table `bg_config` */

CREATE TABLE `bg_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configs` text COMMENT '配置值',
  `name` varchar(300) DEFAULT NULL COMMENT '配置名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='配置信息表';

/*Data for the table `bg_config` */

insert  into `bg_config`(`id`,`configs`,`name`) values (1,'{\"website_title\":\"_tata个人博客 - 一个站在php代码中学习的个人博客网站\",\"website_keywords\":\"tata,blog,博客,php\",\"website_name\":\"http:\\/\\/www.tata.com\",\"website_copyright\":\"cc\",\"website_icp\":\"dd\",\"website_tongji\":\"49841651651\",\"website_description\":\"一起学习，一起进步\",\"website_use\":\"1\",\"src\":\"\\/upload\\/product\\/1546061354107554.png\"}','基本配置'),(2,'{\"src\":\"\\/upload\\/product\\/origin1546696283742740.jpg\",\"nickname\":\"tata\",\"name\":\"王模刚\",\"description\":\"tata的个人博客\",\"job\":\"php软件工程师\",\"mail\":\"crazytata@126.com\",\"qq\":\"1933559078\"}','站长配置'),(3,NULL,'其它配置');

/*Table structure for table `bg_friend` */

CREATE TABLE `bg_friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '友情链接名',
  `link` text COMMENT '外链',
  `types` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1：友情链接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `create_user` varchar(32) NOT NULL DEFAULT '' COMMENT '评论人',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1否，2是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

/*Data for the table `bg_friend` */

insert  into `bg_friend`(`id`,`name`,`link`,`types`,`sort`,`create_at`,`create_user`,`is_delete`) values (1,'百度','https://www.baidu.com',1,5,'2019-01-02 16:43:59','tata',1),(2,'新浪','https://www.sina.com.cn/',1,2,NULL,'',1),(3,'网易','https://www.163.com/',1,6,NULL,'',1);

/*Table structure for table `bg_group` */

CREATE TABLE `bg_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) NOT NULL DEFAULT '' COMMENT '分组组名',
  `auth_ids` text COMMENT '权限ID组',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_name` (`group_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户分组表';

/*Data for the table `bg_group` */

insert  into `bg_group`(`id`,`group_name`,`auth_ids`,`is_delete`) values (1,'超级管理员',NULL,1),(2,'人事部',NULL,1),(3,'技术部',NULL,1),(4,'采购部',NULL,1);

/*Table structure for table `bg_images` */

CREATE TABLE `bg_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(5000) DEFAULT NULL COMMENT '原图',
  `b_url` varchar(5000) DEFAULT NULL COMMENT '中图',
  `s_url` varchar(5000) DEFAULT NULL COMMENT '小图',
  `desc` varchar(5000) DEFAULT NULL COMMENT '图片描述',
  `types` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0为banner',
  `is_delete` tinyint(1) DEFAULT '1' COMMENT '1正常  2已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='图片表';

/*Data for the table `bg_images` */

insert  into `bg_images`(`id`,`url`,`b_url`,`s_url`,`desc`,`types`,`is_delete`) values (6,'/upload/product/1545717997447478.jpg',NULL,NULL,'博客图片',1,1),(11,'/upload/product/origin1546684259386921.jpg','/upload/product/big1546684259386921.jpg','/upload/product/small1546684259386921.jpg','博客图片',1,1),(12,'/upload/product/origin154668468879547.jpg','/upload/product/big154668468879547.jpg','/upload/product/small154668468879547.jpg','博客图片',1,1),(13,'/upload/product/origin1546684701891775.jpg','/upload/product/big1546684701891775.jpg','/upload/product/small1546684701891775.jpg','博客图片',1,1),(14,'/upload/product/origin1546684777915294.jpg','/upload/product/big1546684777915294.jpg','/upload/product/small1546684777915294.jpg','博客图片',1,1),(15,'/upload/product/origin1546684795873072.jpg','/upload/product/big1546684795873072.jpg','/upload/product/small1546684795873072.jpg','博客图片',1,1),(16,'/upload/product/origin154668482364946.jpg','/upload/product/big154668482364946.jpg','/upload/product/small154668482364946.jpg','博客图片',1,1),(17,'/upload/product/origin154670299768785.jpg',NULL,NULL,'这是第一个bannner',0,1),(18,'/upload/product/origin1546703201391450.jpg',NULL,NULL,'这是第二个banner',0,1),(19,'/upload/product/origin1546703243144318.jpg',NULL,NULL,'这是第三个banner',0,1),(20,'/upload/product/origin1546703272306859.png',NULL,NULL,'再来一个banner',0,2);

/*Table structure for table `bg_nav` */

CREATE TABLE `bg_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '导航title',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT 'name',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT 'description',
  `url` text COMMENT '链接',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_delete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1没有删除，2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='导航表';

/*Data for the table `bg_nav` */

insert  into `bg_nav`(`id`,`title`,`name`,`description`,`url`,`sort`,`is_delete`) values (1,'关于我','关于我','关于站长的介绍','/about',1,1),(2,'首页','首页','首页的介绍','/',10,1),(3,'留言板','留言板','访客留言的地方','/message',5,1),(4,'PHP','PHP','PHP','/cate/php',8,1);

/*Table structure for table `bg_user` */

CREATE TABLE `bg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '账号名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `ip` varchar(32) NOT NULL DEFAULT '' COMMENT 'ip',
  `load_time` timestamp NULL DEFAULT NULL COMMENT '最近登录时间',
  `true_name` varchar(32) NOT NULL DEFAULT '' COMMENT '真实名',
  `telephone` bigint(20) unsigned DEFAULT NULL COMMENT '电话',
  `cate_id` smallint(5) unsigned DEFAULT NULL COMMENT '分组id',
  `user_group` varchar(32) NOT NULL DEFAULT '' COMMENT '用户分组',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  `pay_password` varchar(64) DEFAULT NULL COMMENT '查看订单密码',
  `pay_moblie` varchar(200) DEFAULT NULL COMMENT '支付验证的手机号码',
  `can_pay` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可以付款',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `bg_user` */

insert  into `bg_user`(`id`,`name`,`password`,`ip`,`load_time`,`true_name`,`telephone`,`cate_id`,`user_group`,`is_delete`,`pay_password`,`pay_moblie`,`can_pay`,`create_at`) values (1,'tata','d0fa9ead4ba8f67b80f82334a4beb090','127.0.0.1','2019-01-05 21:50:01','tata',18913533664,0,'1',1,NULL,NULL,0,'2018-12-11 15:19:26'),(2,'zif','d0fa9ead4ba8f67b80f82334a4beb090','','2018-12-18 16:26:59','zif',18688700750,NULL,'1',2,NULL,NULL,0,'2018-12-05 16:27:09'),(3,'王五','123456','',NULL,'',123456,NULL,'2',1,NULL,NULL,0,'2018-12-19 16:30:20'),(4,'周六','14e1b600b1fd579f47433b88e8d85291','',NULL,'周六',12345678977,NULL,'4',1,NULL,NULL,0,'2018-12-19 16:28:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
