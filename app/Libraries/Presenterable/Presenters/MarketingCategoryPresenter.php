<?php

namespace App\Libraries\Presenterable\Presenters;

class MarketingCategoryPresenter extends Presenter
{
    /**
     * Render filter for owl carousel.
     *
     * @return string
     */
    public function renderFilter()
    {
        return sprintf(".%s", $this->model->name);
    }
}