<?php

declare(strict_types=1);

namespace Stepapo\Menu\Control;

use Nette\Application\IPresenter;
use Nette\Bridges\ApplicationLatte\Template;
use Stepapo\Menu\Config\Button;


class MenuTemplate extends Template
{
	/** @var Button[] */ public array $buttons;
	/** @var Button[] */ public array $actions;
	public IPresenter $presenter;
}
