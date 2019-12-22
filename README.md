# simple_composer_package
It's no use
##html
```
	<form action="water" method="post" enctype="multipart/form-data">
		<label for="">原图<input id="img" type="file" name="img"></label>
		<button type="submit">确定</button>		
	</form>
 ```
##php
```
<?php
  use Ller\WaterMark\Water;
  
  //接收上传图片
  $data['target_img'] = $_FILES['img'];
  
  //图片加后缀之后新的名称
  $data['new_name'] = 'a';
  
  //新图片存放地址
  $data['path'] = 'd:/';
  
  new Water($data); 
  ```
 
