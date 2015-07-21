<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Weixin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	//默认入口
	function index(){
		$this->log('开始');
		// if($this->checkSignature() == false){
		// 	exit(0);
		// }
		// if(isset($_GET['echostr'])){
		// 	echo $_GET['echostr'];
		// 	exit(0);
		// }
		if(isset($GLOBALS['HTTP_RAW_POST_DATA'])){
			$postData = $GLOBALS['HTTP_RAW_POST_DATA'];
			$this->log('$postData=>'.$postData);
		}else{
			$this->log('$postData=> NULL');
			exit(0);
		}
		$xmlObj = simplexml_load_string($postData, 'SimpleXMLElement',LIBXML_NOCDATA);
		if(!$xmlObj){
			echo 'wrong input';
			$this->log('$xmlObj=> NULL');
			exit(0);
		}

			$fromUserName = $xmlObj->FromUserName;
			$toUserName = $xmlObj->ToUserName;
			$msgType = $xmlObj->MsgType;
			if('text' != $msgType){
				$retMsg = '只关注文本消息';
			}else{
				$content = $xmlObj->Content;
				$retMsg = $content;
			}
			$retTmp = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			<FuncFlag>0</FuncFlag>
			</xml>";
			$resultStr = sprintf($retTmp, $fromUserName, $toUserName, time(), $retMsg);
			$this->log('$resultStr=>'.$resultStr);
			$this->log('结束');
			echo $resultStr;
	}
	//验证签名
	function checkSignature(){
		if(!isset($_GET['signature'])){
			return false;
		}
		$signature = $_GET['signature'];
		$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];

		$token = 'fuxuejiaoyu';
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);

		if($tmpStr == $signature){
			return true;
		}else{
			return false;
		}
	}

	function log($str){  
        $mode='a';//追加方式写  
        $file = "log.txt";  
        $oldmask = @umask(0);  
        $fp = @fopen($file,$mode); 
        @flock($fp, 3);  
        if(!$fp)  
        {  
            Return false;  
        }  
        else  
        {  
            @fwrite($fp,date('Y-m-d').' --> '.$str."\n");  
            @fclose($fp);  
            @umask($oldmask);  
            Return true;  
        }  
    }  

	function getAllFollower(){
		$this->load->model('WeixinModel');
		//echo $this->WeixinModel->getAccessToken();
		echo $this->WeixinModel->getAllFollower();
	}
	

	//获取IP
	function getIp(){
		if(isset($_SERVER)){
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else if(isset($_SERVER['HTTP_CLIENT_IP'])){
				$realip = $_SERVER['HTTP_CLIENT_IP'];
			}else{
				$realip = $_SERVER['REMOTE_ADDR'];
			}
		}else{
			if(getenv('HTTP_X_FORWARDED_FOR')){
				$realip = getenv('HTTP_X_FORWARDED_FOR');
			}else if(getenv('HTTP_CLIENT_IP')){
				$realip = getenv('HTTP_CLIENT_IP');
			}else{
				$realip = getenv('REMOTE_ADDR');
			}
		}
	}
}