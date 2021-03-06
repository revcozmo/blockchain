<?php

namespace Brosland\Blockchain;

class TransactionRequest extends \Nette\Object
{

	/**
	 * @var string
	 */
	private $from = NULL;
	/**
	 * @var array
	 */
	private $recipients = [];
	/**
	 * @var string
	 */
	private $fee = 0;
	/**
	 * @var string
	 */
	private $note = NULL;


	/**
	 * @return string
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * @param string $from
	 * @return self
	 */
	public function setFrom($from)
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * @param string $address
	 * @param string $amount
	 * @return self
	 */
	public function addTo($address, $amount)
	{
		if (empty($amount))
		{
			unset($this->recipients[$address]);
		}
		else
		{
			$this->recipients[$address] = $amount;
		}

		return $this;
	}

	/**
	 * @return array
	 */
	public function getRecipients()
	{
		return $this->recipients;
	}

	/**
	 * @return string
	 */
	public function getFee()
	{
		return $this->fee;
	}

	/**
	 * Transaction fee value in Satoshi (must be greater than default fee).
	 * 
	 * @param string $fee
	 * @return self
	 */
	public function setFee($fee)
	{
		$this->fee = $fee;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * A public note to include with the transaction -- can only be attached to
	 * transactions where all outputs are greater than 0.005 BTC.
	 * 
	 * @param string $note
	 * @return self
	 */
	public function setNote($note = NULL)
	{
		$this->note = $note;

		return $this;
	}
}