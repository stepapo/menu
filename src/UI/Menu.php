<?php

declare(strict_types=1);

namespace Stepapo\Menu\UI;

use Nette\Application\UI\Control;
use Nette\Application\UI\Template;
use Nette\Localization\Translator;
use Nette\Neon\Neon;
use Nette\Utils\FileSystem;
use Stepapo\Menu\Button;
use Stepapo\Menu\Utils;


class Menu extends Control
{
	/**
	 * @param Button[] $buttons
	 * @param Button[] $actions
	 */
	public function __construct(
		private array $buttons = [],
		private array $actions = [],
		private ?string $templateFile = null,
		private ?Translator $translator = null,
	) {}


	public static function createFromNeon(string $file, array $params = []): Menu
	{
		$config = (array) Neon::decode(FileSystem::read($file));
		$parsedConfig = Utils::replaceParams($config, $params);
		return self::createFromArray($parsedConfig);
	}


	public static function createFromArray(array $config): Menu
	{
		$menu = new self();
		if (array_key_exists('buttons', $config)) {
			foreach ($config['buttons'] as $buttonConfig) {
				$menu->addButton(Button::createFromArray($buttonConfig));
			}
		}
		if (array_key_exists('actions', $config)) {
			foreach ($config['actions'] as $buttonConfig) {
				$menu->addAction(Button::createFromArray($buttonConfig));
			}
		}
		if (array_key_exists('templateFile', $config)) {
			$menu->setTemplateFile($config['templateFile']);
		}
		if (array_key_exists('translator', $config)) {
			$menu->setTemplateFile($config['translator']);
		}
		return $menu;
	}


	protected function createTemplate(): Template
	{
		$template = parent::createTemplate();
		$template->setTranslator($this->translator);
		return $template;
	}


	public function render()
	{
		$this->template->buttons = $this->buttons;
		$this->template->actions = $this->actions;
		$this->template->render($this->templateFile ?: __DIR__ . '/menu.latte');
	}


	public function addButton(Button $button): Menu
	{
		$this->buttons[] = $button;
		return $this;
	}


	public function addAction(Button $button): Menu
	{
		$this->actions[] = $button;
		return $this;
	}


	public function setTemplateFile(?string $templateFile): Menu
	{
		$this->templateFile = $templateFile;
		return $this;
	}


	public function setTranslator(?Translator $translator): Menu
	{
		$this->translator = $translator;
		return $this;
	}
}
