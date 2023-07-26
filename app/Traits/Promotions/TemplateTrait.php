<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     TemplateTrait.php
 * @LastModified 2/13/19 2:10 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Promotions;

use App\Models\Promotion\Template;

trait TemplateTrait
{

    /**
     * Get Template
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getTemplate(int $id)
    {
        return Template::find($id);
    }

}