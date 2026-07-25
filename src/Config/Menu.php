<?php

declare(strict_types=1);

namespace Stepapo\Menu\Config;

use Stepapo\Utils\Attribute\ArrayOfType;
use Stepapo\Utils\Config;


class Menu extends Config
{
	/** @var Button[] */ #[ArrayOfType(Button::class)] public array $buttons = [];
	/** @var Button[] */ #[ArrayOfType(Button::class)] public array $actions = [];
	public ?string $templateFile = null;
}