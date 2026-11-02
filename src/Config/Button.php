<?php

declare(strict_types=1);

namespace Stepapo\Menu\Config;

use Stepapo\Utils\Config;


class Button extends Config
{
	public ?string $label = null;
	public ?string $destination = null;
	public ?array $attributes = null;
	public array $parameters = [];
	public ?string $selector = null;
	public ?string $icon = null;
	public ?string $type = null;
	public ?string $confirmationText = null;
	public bool $ajax = false;
	public bool $history = false;
	public bool $hide = false;
	public array $buttons = [];
}
