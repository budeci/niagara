<?php

namespace App\Libraries\Attachmentable;

use App\Attachment;

trait HasAttachments
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }
}