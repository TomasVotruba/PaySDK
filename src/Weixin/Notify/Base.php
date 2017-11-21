<?php
namespace Yurun\PaySDK\Weixin\Notify;

use Yurun\PaySDK\NotifyBase;
use \Yurun\PaySDK\Weixin\Reply\Base as ReplyBase;
use \Yurun\PaySDK\Lib\XML;
use \Yurun\PaySDK\Lib\ObjectToArray;

abstract class Base extends NotifyBase
{
	public function __construct()
	{
		parent::__construct();
		$this->replyData = new ReplyBase;
	}

	/**
	 * 返回数据
	 * @param boolean $success
	 * @param string $message
	 * @return void
	 */
	public function reply($success, $message = '')
	{
		$this->replyData->return_code = $success ? 'SUCCESS' : 'FAIL';
		$this->replyData->return_msg = $message;
		if($this->needSign)
		{
			$this->replyData->sign = $this->sdk->sign(ObjectToArray::parse($this->replyData));
		}
		echo $this->replyData;
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		return XML::fromString(\file_get_contents('php://input'));
	}
	
	/**
	 * 验证签名
	 * @return bool
	 */
	public function checkSign()
	{
		return !isset($this->data['return_code']) || 'SUCCESS' !== $this->data['return_code'] || $this->sdk->verifyCallback($this->data);
	}
}