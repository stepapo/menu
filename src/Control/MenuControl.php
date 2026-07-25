<?php

declare(strict_types=1);

namespace Stepapo\Menu\Control;

use Nette\Application\UI\Control;
use Stepapo\Menu\Config\Menu;


/** @property MenuTemplate $template */
class MenuControl extends Control
{
	public function __construct(
		private Menu $menu
	) {
	}


	public function render()
	{
		$this->template->buttons = $this->menu->buttons;
		$this->template->actions = $this->menu->actions;
		$this->template->render($this->menu->templateFile ?: __DIR__ . '/menu.latte');
	}
}