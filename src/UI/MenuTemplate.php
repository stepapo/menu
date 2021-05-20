<?php

declare(strict_types=1);

namespace Stepapo\Menu\UI;

use Nette\Application\UI\Presenter;
use Nette\Security\User;
use Nextras\Orm\Entity\IEntity;
use Nette\Bridges\ApplicationLatte\Template;
use Stepapo\Menu\Button;


class MenuTemplate extends Template
{
	public Presenter $presenter;

	public User $user;

	public string $basePath;

	public ?IEntity $entity;

	/** @var Button[] */
	public array $buttons;

	/** @var Button[] */
	public array $actions;
}
