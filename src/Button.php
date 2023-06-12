<?php

declare(strict_types=1);

namespace Stepapo\Menu;


class Button
{
	/** @param $buttons Button[] */
	public function __construct(
		public ?string $label = null,
		public ?string $destination = null,
		public array $parameters = [],
		public ?string $selector = null,
		public ?string $icon = null,
		public ?string $type = null,
		public ?string $confirmationText = null,
		public bool $ajax = false,
		public bool $history = false,
		public bool $hide = false,
		public array $buttons = [],
	) {}


	public static function createFromArray(array $config): Button
	{
		$button = new self();
		if (array_key_exists('label', $config)) {
			$button->setLabel($config['label']);
		}
		if (array_key_exists('destination', $config)) {
			$button->setDestination($config['destination']);
		}
		if (array_key_exists('parameters', $config)) {
			$button->setParameters($config['parameters']);
		}
		if (array_key_exists('selector', $config)) {
			$button->setSelector($config['selector']);
		}
		if (array_key_exists('icon', $config)) {
			$button->setIcon($config['icon']);
		}
		if (array_key_exists('type', $config)) {
			$button->setType($config['type']);
		}
		if (array_key_exists('confirmationText', $config)) {
			$button->setConfirmationText($config['confirmationText']);
		}
		if (array_key_exists('ajax', $config)) {
			$button->setAjax($config['ajax']);
		}
		if (array_key_exists('history', $config)) {
			$button->setHistory($config['history']);
		}
		if (array_key_exists('hide', $config)) {
			$button->setHide($config['hide']);
		}
		if (array_key_exists('buttons', $config)) {
			foreach ($config['buttons'] as $buttonConfig) {
				$button->addButton(Button::createFromArray($buttonConfig));
			}
		}
		return $button;
	}


	public function setLabel(string $label): Button
	{
		$this->label = $label;
		return $this;
	}


	public function setDestination(?string $destination): Button
	{
		$this->destination = $destination;
		return $this;
	}


	public function setParameters(array $parameters): Button
	{
		$this->parameters = $parameters;
		return $this;
	}


	public function setSelector(?string $selector): Button
	{
		$this->selector = $selector;
		return $this;
	}


	public function setIcon(?string $icon): Button
	{
		$this->icon = $icon;
		return $this;
	}


	public function setType(?string $type): Button
	{
		$this->type = $type;
		return $this;
	}


	public function setConfirmationText(?string $confirmationText): Button
	{
		$this->confirmationText = $confirmationText;
		return $this;
	}


	public function setAjax(bool $ajax): Button
	{
		$this->ajax = $ajax;
		return $this;
	}


	public function setHistory(bool $history): Button
	{
		$this->history = $history;
		return $this;
	}


	public function setHide(bool $hide): Button
	{
		$this->hide = $hide;
		return $this;
	}


	public function addButton(Button $button): Button
	{
		$this->buttons[] = $button;
		return $this;
	}
}
