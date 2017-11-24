<?php
namespace Yurun\PaySDK\AlipayApp\Fund\Transfer;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Fund\Transfer\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.fund.trans.toaccount.transfer';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/common/105901
	 * @var \Yurun\PaySDK\AlipayApp\Fund\Transfer\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}