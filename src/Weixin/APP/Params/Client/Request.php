<?php
namespace Yurun\PaySDK\Weixin\APP\Params\Client;

use Yurun\PaySDK\WeixinRequestBase;

class Request extends WeixinRequestBase
{
	/**
	 * 微信支付分配的商户号
	 * @var string
	 */
	public $partnerid = '';

	/**
	 * 微信返回的支付交易会话ID
	 * @var string
	 */
	public $prepayid;

	/**
	 * 扩展字段
	 * 暂填写固定值Sign=WXPay
	 * @var string
	 */
	public $package = 'Sign=WXPay';

	/**
	 * 时间戳，如果不设置则SDK自动生成当前时间
	 * @var int
	 */
	public $timestamp;

	public function __construct()
	{
		parent::__construct();
		$this->needMchID = false;
		$this->needSignType = false;
	}

	public function toArray()
	{
		$data = get_object_vars($this);
		if(!isset($data['timestamp']))
		{
			$data['timestamp'] = time();
		}
		return $data;
	}
}