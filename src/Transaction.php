<?php namespace SeBuDesign\BuckarooJson;

use \SeBuDesign\BuckarooJson\Parts\IpAddress;

/**
 * Class Transaction
 *
 * @package SeBuDesign\BuckarooJson
 *
 * @method $this setCurrency(string $sCurrency)
 * @method string|boolean getCurrency()
 *
 * @method $this setAmountCredit(float $fAmountCredit)
 * @method float|boolean getAmountCredit()
 *
 * @method $this setAmountDebit(float $fAmountDebit)
 * @method float|boolean getAmountDebit()
 *
 * @method $this setInvoice(string $sInvoice)
 * @method string|boolean getInvoice()
 *
 * @method $this setOrder(string $sOrder)
 * @method string|boolean getOrder()
 *
 * @method $this setDescription(string $sDescription)
 * @method string|boolean getDescription()
 *
 * @method $this setClientIP(IpAddress $oIpAddress)
 * @method IpAddress|boolean getClientIP()
 */
class Transaction extends RequestBase
{

}