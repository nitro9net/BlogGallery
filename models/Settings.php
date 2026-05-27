<?php namespace Nitro9net\BlogPhotos\Models;

use Model;

class Settings extends Model
{
    public $implement = [\System\Behaviors\SettingsModel::class];

    public $settingsCode = 'nitro9net_blogphotos_settings';

    public $settingsFields = 'fields.yaml';

    public function initSettingsData()
    {
        $this->gallery_thumb_width = 480;
        $this->gallery_thumb_height = 320;
        $this->gallery_include_css = true;
        $this->gallery_include_js = true;
        $this->random_thumb_width = 480;
        $this->random_thumb_height = 320;
        $this->random_link_to = 'image';
        $this->random_post_page = 'blog/post';
        $this->random_include_css = true;
    }
}
