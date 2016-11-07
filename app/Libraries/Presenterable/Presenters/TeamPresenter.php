<?php

namespace App\Libraries\Presenterable\Presenters;

use App\Traits\HasImagesPresentable;
use Jenssegers\Date\Date;

class TeamPresenter extends Presenter
{
    use HasImagesPresentable;

    /**
     * Render short description from post's body.
     *
     * @param $range
     * @return string
     */
    public function renderShortDescription($range = 75)
    {
        return sprintf('%s... </p>', substr($this->model->body, 0, $range));
    }

    /**
     * Render post name.
     *
     * @return string
     */
    public function renderTitle($upper = false)
    {
        $name = $this->model->name;

        if($upper)
            return strtoupper($name);

        return ucfirst($name);
    }
    /**
     * Render post's views.
     *
     * @return string
     */
    public function renderPostViews()
    {
        return $this->model->view_count;
    }
}