<?php

namespace App\Libraries\Presenterable\Presenters;

use App\Traits\HasImagesPresentable;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use File;
class EventPresenter extends Presenter
{
    use HasImagesPresentable;

    /**
     * Render short description from post's about.
     *
     * @param $range
     * @return string
     */
    public function renderShortDescription($range = 75)
    {
        return sprintf('%s... </p>', substr($this->model->about, 0, $range));
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
     * Render published date from created_at.
     *
     * @param string
     * @return string
     */
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
    public function renderPublishedDateShort($format = 'd F Y')
    {
        Date::setLocale(\Lang::slug());

        $date = Date::createFromTimestamp(
            $this->model->public_date->timestamp
        );

        return $date->format($format);
    }
    public function renderExpiredDateShort($format = 'd F Y')
    {
        Date::setLocale(\Lang::slug());

        $date = Date::createFromTimestamp(
            $this->model->expire_date->timestamp
        );
        return $date->format($format);
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
    public function renderImageMedium()
    {
        $image = $this->model->image;
        if(File::exists(public_path($image))){
            $medium = explode('.', $image);
            $mediumFile = $medium[0].'_medium.'.$medium[1];
            if (File::exists(public_path($mediumFile))) {
                return $mediumFile;
            }
        }
        return $image;
    }
}