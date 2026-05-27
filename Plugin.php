<?php namespace Nitro9net\BlogPhotos;

use Backend\Widgets\Form;
use Event;
use Nitro9net\BlogPhotos\Models\Settings;
use RainLab\Blog\Controllers\Posts as BlogPostsController;
use RainLab\Blog\Models\Post as BlogPost;
use System\Classes\PluginBase;
use System\Models\File;

class Plugin extends PluginBase
{
    public $require = ['RainLab.Blog'];

    public function pluginDetails()
    {
        return [
            'name' => 'nitro9net.blogphotos::lang.plugin.name',
            'description' => 'nitro9net.blogphotos::lang.plugin.description',
            'author' => 'nitro9net',
            'icon' => 'icon-picture-o'
        ];
    }

    public function registerComponents()
    {
        return [
            \Nitro9net\BlogPhotos\Components\Gallery::class => 'blogGallery',
            \Nitro9net\BlogPhotos\Components\RandomPhoto::class => 'randomBlogPhoto'
        ];
    }

    public function registerNavigation()
    {
        return [
            'blogphotos' => [
                'label' => 'nitro9net.blogphotos::lang.navigation.blogphotos',
                'url' => \Backend::url('nitro9net/blogphotos/galleries'),
                'icon' => 'icon-picture-o',
                'permissions' => ['nitro9net.blogphotos.manage_galleries'],
                'order' => 500,
                'sideMenu' => [
                    'galleries' => [
                        'label' => 'nitro9net.blogphotos::lang.navigation.galleries',
                        'url' => \Backend::url('nitro9net/blogphotos/galleries'),
                        'icon' => 'icon-th-large',
                        'permissions' => ['nitro9net.blogphotos.manage_galleries']
                    ]
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'nitro9net.blogphotos::lang.settings.label',
                'description' => 'nitro9net.blogphotos::lang.settings.description',
                'category' => 'nitro9net.blogphotos::lang.plugin.name',
                'icon' => 'icon-picture-o',
                'class' => Settings::class,
                'order' => 500,
                'permissions' => ['nitro9net.blogphotos.manage_settings']
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'nitro9net.blogphotos.manage_galleries' => [
                'tab' => 'nitro9net.blogphotos::lang.plugin.name',
                'label' => 'nitro9net.blogphotos::lang.permissions.manage_galleries'
            ],
            'nitro9net.blogphotos.manage_settings' => [
                'tab' => 'nitro9net.blogphotos::lang.plugin.name',
                'label' => 'nitro9net.blogphotos::lang.permissions.manage_settings'
            ]
        ];
    }

    public function boot()
    {
        $this->extendBlogPostModel();
        $this->extendBlogPostForm();
    }

    protected function extendBlogPostModel(): void
    {
        BlogPost::extend(function ($model) {
            $model->attachMany['gallery_images'] = [
                File::class,
                'order' => 'sort_order',
                'delete' => true
            ];

            $model->addDynamicMethod('getGalleryImagesCountAttribute', function () use ($model) {
                return $model->gallery_images()->count();
            });
        });
    }

    protected function extendBlogPostForm(): void
    {
        Event::listen('backend.form.extendFields', function (Form $widget) {
            if (!$widget->getController() instanceof BlogPostsController) {
                return;
            }

            if (!$widget->model instanceof BlogPost) {
                return;
            }

            if ($widget->isNested) {
                return;
            }

            $widget->addTabFields([
                'gallery_images' => [
                    'label' => 'nitro9net.blogphotos::lang.fields.gallery_images',
                    'commentAbove' => 'nitro9net.blogphotos::lang.fields.gallery_images_comment',
                    'type' => 'fileupload',
                    'mode' => 'image',
                    'useCaption' => true,
                    'imageWidth' => 180,
                    'imageHeight' => 120,
                    'thumbOptions' => [
                        'mode' => 'crop',
                        'extension' => 'auto'
                    ],
                    'tab' => 'nitro9net.blogphotos::lang.tabs.gallery'
                ]
            ]);
        });
    }
}
