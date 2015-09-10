<?php
namespace liangzoe\mobilesmser;
use Yii;
use yii\helpers\FileHelper;

class TextSmser extends \yii\base\Component
{
	/**
	 * 请求地址
	 * @var string
	 */
	public $url;
	
	/**
	 * 用户名
	 * @var string
	 */
	public $username;
	
	/**
	 * 密码
	 * @var string
	 */
	protected $password;
	
	/**
	 * 状态码
	 * @var string
	 */
	protected $state;
	
	/**
	 * 状态信息
	 * @var string
	 */
	protected $message;
	
	/**
	 * 是否使用文件形式保存发送内容
	 * @var boolean
	 */
	public $useFileTransport = true;
	
	public function sendSMS($mobile,$message)
	{
		$post_data['account'] = iconv('GB2312', 'GB2312',$this->username);
		$post_data['pswd'] = iconv('GB2312', 'GB2312',$this->password);
		$post_data['mobile'] =$mobile;
		$post_data['msg']=mb_convert_encoding($message,'UTF-8', 'auto');
		$url='';
		 
		$res = $this->request_post($this->url, $post_data);
		print_r($res);
	
	}
	/**
	 * 模拟post进行url请求  拼接url封装起来
	 * @param string $url
	 * @param array $post_data
	 */
	
	public function request_post($url = '', $post_data = array()) {
		if (empty($url) || empty($post_data)) {
			return false;
		}
	
		$o = "";
		foreach ( $post_data as $k => $v )
		{
			$o.= "$k=" . urlencode( $v ). "&" ;
		}
		$post_data = substr($o,0,-1);
	
		$postUrl = $url;
		$curlPost = $post_data;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		$data = curl_exec($ch);//运行curl
		curl_close($ch);
	
		return $data;
	}
}
