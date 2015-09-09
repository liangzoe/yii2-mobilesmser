# yii2-smser
Send text messages with api of SMS platform

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist liangzoe/yii2-mobilesmser "*"
```

or add

```
"liangzoe/yii2-mobilesmser": "*"
```

to the require section of your `composer.json` file.


Usage
-----
1. Let 's add into Component config in your main config file

````
'smser' => [
    'smser' => [
       	  'class' => 'zoe\smser\TextSmser',
	        'url' => '',
	        'username' => '',
	        'password' => '',
    ],
],

```use in phpfile
Yii::$app->smser->sendSMS('手机号码', '短信内容');
```

'''reference in the view'''
   Countdown with jquery
   
   
   <script type="text/javascript">
   
   var wait=60; 
	
		function time(o) {//o为按钮对象
		
			if (wait == 0) { 
		
				o.removeAttribute("disabled"); 
			
				o.value="免费获取短信动态码"; 
				
				wait = 60; 
		
			} else { 
	
				o.setAttribute("disabled", true); //倒计时中，禁止点击按钮
			
				o.value= wait + "秒后重新发送"; 
			
				wait--; 
	
				setTimeout(function() { time(o);}, 1000);
	
			} 
</script>

