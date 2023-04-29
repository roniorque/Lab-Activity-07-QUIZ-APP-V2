<?php

namespace App;

class Question
{
	protected $number;
	protected $question;
	protected $choices;

	public function __construct($number, $question, $choices)
	{
		$this->number = $number;
		$this->question = $question;
		$this->choices = $choices;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getQuestion()
	{
		return $this->question;
	}

	public function getChoices()
	{
		return $this->choices;
	}
}   