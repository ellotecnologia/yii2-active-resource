<?php namespace Zaioll\ActiveResource;

class Pagination extends \yii\data\Pagination
{
    public $pageSizeLimit = [1, 1000];

    /**
     * @inheritDoc
     */
    public function getOffset()
    {
        $pageSize = $this->getPageSize();
        if ($pageSize < 0) {
            return 0;
        }
        //$offset = $this->getPage() * $pageSize;
        $offset = $this->getPage() + 1;
        return $offset;
    }
}
