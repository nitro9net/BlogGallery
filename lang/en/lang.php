<?php

return [
    'plugin' => [
        'name' => 'BlogPhotos',
        'description' => 'Adds image galleries to RainLab Blog posts.'
    ],
    'navigation' => [
        'blogphotos' => 'BlogPhotos',
        'galleries' => 'Galleries'
    ],
    'permissions' => [
        'manage_galleries' => 'Manage BlogPhotos galleries',
        'manage_settings' => 'Manage BlogPhotos settings'
    ],
    'settings' => [
        'label' => 'BlogPhotos',
        'description' => 'Configure default gallery and random photo component settings.',
        'gallery_tab' => 'Gallery',
        'random_tab' => 'Random photo',
        'gallery_section' => 'Default gallery component settings',
        'random_section' => 'Default random photo component settings'
    ],
    'galleries' => [
        'title' => 'BlogPhotos Galleries',
        'gallery' => 'Gallery',
        'create' => 'Create Gallery',
        'update' => 'Edit Gallery',
        'preview' => 'View Gallery',
        'photo_count' => 'Photos',
        'gallery_images_help' => 'Add, reorder, caption, edit, or delete photos attached to this blog post.',
        'add_gallery' => 'Add Gallery',
        'delete_gallery' => 'Delete Gallery',
        'delete_selected' => 'Delete Selected Galleries'
    ],
    'messages' => [
        'no_galleries_selected' => 'Please select at least one gallery.',
        'galleries_deleted' => 'Selected galleries have been deleted.',
        'gallery_deleted' => 'Gallery has been deleted.',
        'confirm_delete_gallery' => 'Delete all photos in this gallery?',
        'confirm_delete_selected' => 'Delete all photos in the selected galleries?'
    ],
    'fields' => [
        'gallery_images' => 'Gallery images',
        'gallery_images_comment' => 'Upload and reorder images for this blog post.'
    ],
    'tabs' => [
        'gallery' => 'Gallery'
    ],
    'components' => [
        'gallery' => [
            'name' => 'BlogPhotos Gallery',
            'description' => 'Displays the image gallery attached to a blog post.'
        ],
        'random_photo' => [
            'name' => 'Random Blog Photo',
            'description' => 'Displays a random gallery image from any published blog post.'
        ]
    ],
    'properties' => [
        'slug' => [
            'title' => 'Post slug',
            'description' => 'Blog post slug used when no blog post variable is available.'
        ],
        'post_variable' => [
            'title' => 'Post variable',
            'description' => 'Page variable containing the RainLab Blog post model.'
        ],
        'thumb_width' => [
            'title' => 'Thumbnail width'
        ],
        'thumb_height' => [
            'title' => 'Thumbnail height'
        ],
        'thumb_mode' => [
            'title' => 'Thumbnail mode'
        ],
        'include_css' => [
            'title' => 'Include CSS',
            'description' => 'Adds the default gallery stylesheet to the page.'
        ],
        'include_js' => [
            'title' => 'Include JavaScript',
            'description' => 'Adds the default lightbox script to the page.'
        ],
        'link_to' => [
            'title' => 'Link to',
            'description' => 'Choose what happens when the random photo is clicked.'
        ],
        'post_page' => [
            'title' => 'Post page',
            'description' => 'CMS page used to build blog post links.'
        ],
        'numeric_validation' => 'Please enter a whole number.'
    ]
];
