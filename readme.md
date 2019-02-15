# Vanilla2

This is the main repository for Vanilla2 containing the admin panel and some services, along with bootstrap code.

## Contents

- [Setting Up / First Run](#setup_first_run)
- [Vanilla2-Core](#core)
- [Layout Templating](#layout_templating)
- [Templating](#templating)
- [Development](#development)
- [Packages](#packages)
- [Plugins](#plugins)
- [Admin](#admin)
- [Menus](#menus)
- [Sitemaps](#sitemaps)

<a name="setup_first_run" />

## Setting Up / First Run

Firstly, decide which composer file you need to use. The standard composer.json file is geared towards local development, while composer.remote.json is geared towards remote development.

After deciding which file and renaming it to composer.json, run `composer update`

Then:

* Run Migrations
* Run Seeds
* Run *php artisan key:generate* within application environment
* Run *php artisan storage:link* within application environment (in Windows/Vagrant boot VM using administrator privileges if you encounter an error)
* Make *user* directory within *storage/app/public*

<a name="core" />
## Vanilla2-Core

The core functionality of the Vanilla2 CMS is all provided by the 'Core' package (Vanilla2/Core). It is an absolute requirement for this package to be installed in order for the CMS to work correctly.

<a name="layout_templating" />
## Layout Templating

`resources/views/layouts/base.blade.php` is provided as a demo layout and contains the main features required to make Vanilla2 work. Notably:

#### SEO

Within the `<head>` section of the markup include the SEO partial from the core:

```
@include('core::seo')
```

This will provide relevant meta tags as defined in the admin area & plugins.

#### Title

Within the `<head>` section of the markup include the title partial from the core:

```
@include('core::title')
```

This will provide the dynamic title for the page.

#### Styles

Initiate a stack within the layout for styles:

```
@stack('styles')
```

#### Menu

To inject a menu:

```
@inject('menu', 'Menu')
{!! $menu->render() !!}
```

This is further documented in the readme for the menu package.

#### Ecommerce Cart Summary

To include the cart summary conditionally if the ecommerce package is found:

```
@if(View::exists('ecommerce::cart'))
    <div class="cart-summary">
        @include('ecommerce::cart')
    </div>
@endif
```

#### CSRF Protection

The below code is require to ensure that AJAX calls successfully pass Laravel's inbuilt CSRF protections.

```
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
```

<a name="templating" />
## Templating

To define a new template create a subdirectory in the `resources/views/templates/user` directory.

This folder should contain:

 - `template.blade.php` The blade template file
 - `thumbnail.png` The preview shown when creating a new page

With `template.blade.php` setup the template as you would a standard blade view (by extending your created layout). To define a new content area:

```
@absence([ 'template1-area1', '<p><b>Area 1 Default</b></p>' ])

@render([ 'template1-area1' ])
```

`@absence` provides to functionality to define a default content, with the first argument being the content area name and the second argument being the default content.

`@render` places the content in the relevant position.

You can access page parameters using the `@page` directive. For example to show the page title from the database:

```
@page([ 'title' ])
```

<a name="development" />
## Development

You'll need to have a specific setup to develop for this. If you need to modify any plugins to do what you want, clone them into your main project in a subfolder and use that - do not get them through composer VCS.

Get the base and the other packages up one level from that, and clone all the plugins from there. The Homestead.yaml file in the main project needs to be changed to look similar to this.

#### Homestead.yaml

```
ip: 192.168.10.10
memory: 2048
cpus: 1
provider: virtualbox
authorize: ~/.ssh/id_rsa.pub
keys:
    - ~/.ssh/id_rsa
folders:
    -
        map: 'D:\Projects\vanilla2'
        to: /home/vagrant/code
    -
        map: 'D:\Projects\vanilla2-analytics'
        to: '/home/vagrant/vanilla2-analytics'
    -
        map: 'D:\Projects\vanilla2-blog'
        to: '/home/vagrant/vanilla2-blog'
    -
        map: 'D:\Projects\vanilla2-calendar'
        to: '/home/vagrant/vanilla2-calendar'
    -
        map: 'D:\Projects\vanilla2-core'
        to: '/home/vagrant/vanilla2-core'
    -
        map: 'D:\Projects\vanilla2-ecommerce'
        to: '/home/vagrant/vanilla2-ecommerce'
    -
        map: 'D:\Projects\vanilla2-formbuilder'
        to: '/home/vagrant/vanilla2-formbuilder'
    -
        map: 'D:\Projects\vanilla2-html'
        to: '/home/vagrant/vanilla2-html'
    -
        map: 'D:\Projects\vanilla2-menu'
        to: '/home/vagrant/vanilla2-menu'
    -
        map: 'up_one_level'
        to: '/home/vagrant/name_of_plugin'
sites:
    -
        map: homestead.test
        to: /home/vagrant/code/public
databases:
    - homestead
name: vanilla2
hostname: vanilla2

```

#### composer.json

```
...
"repositories": [
    {
        "type": "path",
        "url": "../vanilla2-menu",
        "options": {
          "symlink": true
        }
    },
    {
      "type": "path",
      "url": "../vanilla2-blog",
      "options": {
        "symlink": true
      }
    },
    {
      "type": "path",
      "url": "../vanilla2-html",
      "options": {
        "symlink": true
      }
    }
],
...
"require": {
    "vanilla2/menu": "dev-master",
    "vanilla2/blog": "dev-master",
    "vanilla2/html": "dev-master",
    "vanilla2/your-plugin": "dev-master",
},
```
Or you can use the same require fields, but use
```
    "repositories": [
      {
          "type": "composer",
          "url": "https://packages.outstandingweb.co.uk"
      }
    ],
```

It'll ask for a user an pass - outstandingweb and LiscombePark2017

<a name="packages" />
## Packages

Your packages will be loaded by their service provider as described below.

In each of your package use Laravel's autodiscover to register your plugin, as below.

```
{
    "name": "vanilla2/blog",
    "description": "A blog for the vanilla2 cms system",
    "type": "library",
    "authors": [
        {
            "name": "Tom Gillespy",
            "email": "thomasgillespy@gmail.com"
        }
    ],
    "autoload": {
        "psr-4": {
            "Vanilla2\\Blog\\": "src/"
        }
    },
    "require": {},
    "extra": {
      "laravel": {
        "providers": [
          "Vanilla2\\Blog\\BlogServiceProvider"
        ]
      }
    }
}
```

<a name="plugins" />

## Content Plugins

Content plugins allow for different content types to be inserted into content areas. The below is a list of the standard content plugins provided by the core:

 - Plain Text ('Text')
 - Image ('Image')
 - Filestore ('Filestore')

To register a content plugin, you'll need to have a service provider which binds a class into the service container with a single word, such as 'Text', 'Html' or 'Image', for example:

```
use Vanilla2\Html\HtmlService;
```

```
  $this->app->bind('Html', HtmlService::class);
```

This service must implement the following interface

```
class HtmlService
{

    public function render($content)
    {
        // A method that renders some content, passed into it using the only parameter which is of type App\Content. You should have saved options which are available in $content->options
    }

    public function preview($content)
    {
        // A method that returns a small preview of whatever content is in this block.
    }

    public function create($page, $area)
    {
        // Displays the form on frontend editing that users can pick the options for this content type.

        // The form must post to admin/edit and must have 3 inputs, named handler, page and area to.
    }

    public function store($page, $area, Request $request, $position)
    {
        // Stores the content from the create method. The position specifies the sort order you should use to put this content at the end.
    }

    public function edit(Content $content)
    {
        // Displays the edit form. Required handler hidden field which resolves to the service in the service container.
    }

    public function update(Content $content, Request $request)
    {
        // Updates the content
    }
}

```

<a name="admin" />
## Admin

You can define routes under the /admin prefix to get things to route under the admin panel. As long as your service provider is loaded before the Route Service Provider, your routes will be executed.

The middleware that checks for admin access is auth.admin - you will need to check against the web and auth groups too.

```
Route::group(['middleware' => ['web', 'auth', 'auth.admin'], 'prefix' => 'admin', 'namespace' => 'Vanilla2\Blog'], function () {
    Route::resource('blogs', 'BlogController');
});
```

The view that you need to extend is core::admin.layouts.default - you're given a header section, content section and style and scripts stacks at the top and bottom respectively.

If you need to delete something, place an element with a class of .deletebutton and give it a data-url property of the URL you need to visit to destroy the resource and it will be handled for you.

```
<a href="#" class="btn btn-xs btn-danger deletebutton" data-url="{{route('blogs.destroy', ['blogpost' => $post])}}"><i class="fa fa-trash"></i> Delete Post</a>
```

<a name="menus" />
## Menus

There are 2 'native' menus in the application, the admin menu (on the sidebar of the admin panel) and the edit menu which provides a list of content options. You need to register things onto these menus in the boot method of the service provider.

#### Edit Menu

The edit menu takes 4 paremeters:
* The Title of the content type
* The bare word bound into the service container
* A short description
* An icon

```
use Vanilla2\Core\Services\Menu\EditingMenu;
use Vanilla2\Core\Services\Menu\EditingMenuItem;

public function boot(EditingMenu $editmenu)
{
    $editmenu->appendItem(new EditingMenuItem(
      'HTML',
      'Html',
      'Formatted Text (HTML) for rich text',
      'fa-font'
    ));
}
```

#### Admin Menu

Menu items an either be added as individual items or as a member of a collection of items, known as a block.

##### Menu Items

The AdminMenu class exposes methods to append and prepend menu items:

```
$menu->appendItem()
$menu->prependItem()
```

Both the methods *appendItem* and *prependItem* accept 5 parameters:
* The label of the menu link
* A class to be added to the link
* The actual link (# for blank)
* An icon
* An array of any children. If this isn't [], the top level is converted to a dropdown and these are the links that go somewhere.

For example:

```
use Vanilla2\Core\Services\Menu\AdminMenu;
use Vanilla2\Core\Services\Menu\AdminMenuItem;

public function boot(AdminMenu $menu)
{
    $menu->appendItem(new AdminMenuItem(
        'Blogs',
        '',
        '#',
        'fa-newspaper-o',
        [
            new AdminMenuItem('List Posts', '', url('admin/blogs/'), 'fa-files-o'),
            new AdminMenuItem('Create Post', '', url('admin/blogs/create'), 'fa-plus'),
        ]
    ));
}
```

##### Menu Blocks

The AdminMenu class also exposes methods to append menu blocks containing several menu items:

```
$menu->appendBlock()
$menu->prependBlock()
```

Both the methods *appendBlock* and *prependBlock* accept 2 parameters:
* The title of the block
* The child AdminMenuItem elements to be contained within the block

For example:

```
use Vanilla2\Core\Services\Menu\AdminMenu;
use Vanilla2\Core\Services\Menu\AdminMenuBlock;
use Vanilla2\Core\Services\Menu\AdminMenuItem;

public function boot(AdminMenu $menu)
{
    $menu->appendBlock(new AdminMenuBlock(
        'Ecommerce',
        [
            new AdminMenuItem(
                'Products',
                '',
                '#',
                'fa-archive',
                [
                    new AdminMenuItem('List Products', '', url('admin/shop/product'), 'fa-files-o'),
                    new AdminMenuItem('Create Product', '', url('admin/shop/product/create'), 'fa-plus'),
                ]
            ),
        ]
    ));
}
```

##### Typehinting

You can of course type hint both of these in your boot method to register items into both menus.

```
public function boot(AdminMenu $menu, EditingMenu $editmenu)
{
    //
}
```

<a name="sitemaps" />
## Sitemaps

Type hint the sitemap service in your service provider and in the boot method call the setModel method with the fully qualified model.

```
public function boot(SitemapService $sitemapService)
{
    $sitemapService->setModel(Page::class);
}
```

In your model that you have bound into the sitemap service you must define a static method that takes no arguments and returns a list of urls - with the following keys:

* The full url
* The updated at time
* (optional) a priority of the URL from 0.0 to 1.0 (default 0.5)
