<?php

namespace blacklizard\Whatsapp\Services;

/**
 * @TODO: Finish this when have time
 */
class Media
{

    var $type = ['', '', 'image/jpeg'];

    public function media($data)
    {
        if ($data->media_mime_type == 'video/mp4' || $data->media_mime_type == 'video/3gpp') {
            return $this->video($data->thumb_image);
        }

        return $this->image($data->thumb_image);
    }

    public function video($data)
    {

        return 0;
    }

    public function image($data)
    {

        return 0;
    }

}