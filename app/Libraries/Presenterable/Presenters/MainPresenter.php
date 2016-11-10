<?php

namespace App\Libraries\Presenterable\Presenters;

use Jenssegers\Date\Date;
use Carbon\Carbon;
use File;

class MainPresenter extends Presenter
{
    /**
     * Render short description from post's about.
     *
     * @param $range
     * @return string
     */
    public function renderShortDescription($range = 75)
    {
        return sprintf('%s... </p>', substr($this->model->body, 0, $range));
    }

    /**
     * Render published date from created_at.
     *
     * @param string
     * @return string
     */

    public function renderDate($format = 'd F Y')
    {
        Date::setLocale(\Lang::slug());

        $date = Date::createFromTimestamp(
            $this->model->created_at->timestamp
        );

        return $date->format($format);
    }


    public function renderPublishedDate($format = 'd F Y')
    {
        Date::setLocale(\Lang::slug());

        $date = Date::createFromTimestamp(
            $this->model->public_date->timestamp
        );

        return $date->format($format);
    }

    public function renderExpiredDate($format = 'd F Y')
    {
        Date::setLocale(\Lang::slug());

        $date = Date::createFromTimestamp(
            $this->model->expire_date->timestamp
        );
        return $date->format($format);
    }

}