<?php namespace Zaioll\ActiveResource;

class Pagination extends \yii\data\Pagination
{
    public $pageSizeLimit = [1, 1000];

    /**
     * @inheritDoc
     */
    public function getOffset()
    {
        $page = $this->getPage();
        return $page;
    }
}
