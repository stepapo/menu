<?php

declare(strict_types=1);

namespace Stepapo\Menu\Control;

use App\AppsModule\Lib\Menu\Config\Menu;
use Nette\Application\UI\Control;


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