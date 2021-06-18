# Menu

Component for Nette Framework, that helps generate menus with links and action buttons. The docs show basic example and explains ways of configurating menus.

## Example

Let's create a menu with three links. Administration link is hidden for non-admins.

### Definition

```neon
buttons:
	-
		label: Homepage
		destination: Home:default
	-
		label: About us
		destination: About:default
	-
		label: Administration
		destination: Admin:default
		hide: %hideAdmin%
```

### Component

```php
public function createComponentMainMenu()
{
	return Stepapo\Menu\UI\Menu::createFromNeon(__DIR__ . '/mainMenu.neon', [
		'hideAdmin' => !$this->user->isInRole('admin')
	]);
}
```

### Template

```latte
{control mainMenu}
```

## Configuration

### Menu

```neon
buttons:
	- # include Button configuration
	- # include Button configuration
actions:
	- # include Button configuration
	- # include Button configuration
templateFile:
translator:
```

### Button

```neon
label:
destination:
parameters:
selector:
icon:
type:
ajax:
history:
hide:
buttons:
	- # include Button configuration
	- # include Button configuration
```

