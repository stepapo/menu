# Menu

Component for Nette Framework, that helps generate menus with links and action buttons. The docs show basic example and explain ways of configurating menus.

## Example

Let's create a menu with three links. Administration link is hidden for non-admins.

### Definition

```yml
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
public function createComponentMainMenu(): MenuControl
{
    $menu = Menu::createFromNeon(__DIR__ . '/mainMenu.yml', [
        'hideAdmin' => !$this->user->isInRole('admin')
    ]);
    return new MenuControl($menu);
}
```

### Template

```latte
{control mainMenu}
```

## Configuration

### Menu

```yml
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

```yml
label:
destination:
parameters:
selector:
icon:
type:
confimationText:
ajax:
history:
hide:
buttons:
    - # include Button configuration
    - # include Button configuration
```

