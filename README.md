# sidebar-generator
A simple generate sidebar for PHP/Laravel

[<img src="https://github.com/truongbo17/sidebar-generator/blob/main/exam.png?raw=true" />](example)

### Usage :

* Install

```
composer require truongbo/sidebar
```

* Use

  * Register in method `boot` of `ServiceProvider`

Example in method `boot` of `AppServiceProvider` : 
```injectablephp
        // Register group sidebar
        \SideBarDashBoard::registerGroup('permission_manager')
            ->setLabel('Authentication')
            ->setPosition(99)
            ->setIcon('nav-icon la la-users')
            ->render();

        // Register item in group permission_manager sidebar
        \SideBarDashBoard::registerItem('user')
            ->setLabel('Users')
            ->setPosition(1)
            ->setRoute(bo_url('user'))
            ->setIcon('nav-icon la la-user')
            ->setGroup('permission_manager')
            ->render();

        // Register item in group permission_manager sidebar
        \SideBarDashBoard::registerItem('role')
            ->setLabel('Roles')
            ->setPosition(2)
            ->setRoute(bo_url('role'))
            ->setIcon('nav-icon la la-id-badge')
            ->setGroup('permission_manager')
            ->render();

        // Register item in group permission_manager sidebar
        \SideBarDashBoard::registerItem('permission')
            ->setLabel('Permission')
            ->setPosition(3)
            ->setRoute(bo_url('permission'))
            ->setIcon('nav-icon la la-key')
            ->setGroup('permission_manager')
            ->render();
```

* Show sidebar
  * Example show result in file `sidebar.blade.php`

### Group
* `setLabel` : set label name for group
* `setPosition` : set position for group
* `setIcon` : set icon for group
* `setClass` : set class for group
* `setStyleCss` : set custom style css for group
  * anymore...

#### Don't forget to add render method to show it on sidebar

### Item
* `setGroup` : set group for item (by key group)
* `setLabel` : set label name for item
* `setPosition` : set position for item
* `setIcon` : set icon for item
* `setClass` : set class for item
* `setStyleCss` : set custom style css for item
  * anymore...

#### Don't forget to add render method to show it on sidebar
