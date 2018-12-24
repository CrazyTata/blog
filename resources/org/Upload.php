<?php
/**
 * Created by PhpStorm.
 * User: AS
 * Date: 2018/12/24
 * Time: 11:23
 */

  class Upload{
      private $max_size   = '2000000'; //设置上传文件的大小，此为2M
      private $rand_name   = true;   //是否采用随机命名
      private $allow_type  = array();  //允许上传的文件扩展名
      private $error     = 0;     //错误代号
      private $msg      = '';    //信息
      private $new_name   = '';    //上传后的文件名
      private $save_path   = '';    //文件保存路径
      private $uploaded   = '';    //路径.文件名
      private $file     = '';    //等待上传的文件
      private $file_type   = array();  //文件类型
      private $file_ext   = '';    //上传文件的扩展名
      private $file_name   = '';    //文件原名称
      private $file_size   = 0;     //文件大小
      private $file_tmp_name = '';    //文件临时名称

      /**
       * 构造函数，初始化
       * @param string $rand_name 是否随机命名
       * @param string $save_path 文件保存路径
       * @param string $allow_type 允许上传类型
      $allow_type可为数组  array('jpg', 'jpeg', 'png', 'gif');
      $allow_type可为字符串 'jpg|jpeg|png|gif';中间可用' ', ',', ';', '|'分割
       */
      public function __construct($rand_name=true, $save_path='./upload/', $allow_type=array('jpg', 'jpeg', 'png', 'gif')){
          $this->rand_name = $rand_name;
          $this->save_path = $save_path;
          $this->allow_type = $this->get_allow_type($allow_type);
      }

      /**
       * 上传文件
       * 在上传文件前要做的工作
       * (1) 获取文件所有信息
       * (2) 判断上传文件是否合法
       * (3) 设置文件存放路径
       * (4) 是否重命名
       * (5) 上传完成
       * @param array $file 上传文件
       *     $file须包含$file['name'], $file['size'], $file['error'], $file['tmp_name']
       */
      public function upload_file($file){
          //$this->file   = $file;
          $this->file_name   = $file['name'];
          $this->file_size   = $file['size'];
          $this->error     = $file['error'];
          $this->file_tmp_name = $file['tmp_name'];

          $this->ext = $this->get_file_type($this->file_name);

          switch($this->error){
              case 0: $this->msg = ''; break;
              case 1: $this->msg = '超出了php.ini中文件大小'; break;
              case 2: $this->msg = '超出了MAX_FILE_SIZE的文件大小'; break;
              case 3: $this->msg = '文件被部分上传'; break;
              case 4: $this->msg = '没有文件上传'; break;
              case 5: $this->msg = '文件大小为0'; break;
              default: $this->msg = '上传失败'; break;
          }
          if($this->error==0 && is_uploaded_file($this->file_tmp_name)){
              //检测文件类型
              if(in_array($this->ext, $this->allow_type)==false){
                  $this->msg = '文件类型不正确';
                  return false;
              }
              //检测文件大小
              if($this->file_size > $this->max_size){
                  $this->msg = '文件过大';
                  return false;
              }
          }
          $this->set_file_name();
          is_dir($this->save_path) || @mkdir($this->save_path, 0777, true);
          $this->uploaded = $this->save_path.$this->new_name;
          if(move_uploaded_file($this->file_tmp_name, $this->uploaded)){
              $this->msg = substr($this->uploaded,1);
              return true;
          }else{
              $this->msg = '文件上传失败';
              return false;
          }
      }

      /**
       * 设置上传后的文件名
       * 当前的毫秒数和原扩展名为新文件名
       */
      public function set_file_name(){
          if($this->rand_name==true){
              $a = explode(' ', microtime());
              $t = $a[1].($a[0]*1000000);
              $this->new_name = $t.'.'.($this->ext);
          }else{
              $this->new_name = $this->file_name;
          }
      }

      /**
       * 获取上传文件类型
       * @param string $filename 目标文件
       * @return string $ext 文件类型
       */
      public function get_file_type($filename){
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          return $ext;
      }

      /**
       * 获取可上传文件的类型
       */
      public function get_allow_type($allow_type){
          $s = array();
          if(is_array($allow_type)){
              foreach($allow_type as $value){
                  $s[] = $value;
              }
          }else{
              $s = preg_split("/[\s,|;]+/", $allow_type);
          }
          return $s;
      }

      //获取错误信息
      public function get_msg(){
          return $this->msg;
      }
  }
