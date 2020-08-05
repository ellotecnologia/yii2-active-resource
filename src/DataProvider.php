<?php

namespace Zaioll\ActiveResource;

use yii\data\BaseDataProvider;
use yii\base\InvalidParamException;
use yii\base\InvalidConfigException;
use Zaioll\ActiveResource\QueryInterface;
use Zaioll\ActiveResource\Pagination;
use Yii;

/**
 * Class DataProvider
 *
 * @package Zaioll\ActiveResource
 */
class DataProvider extends BaseDataProvider
{
    /**
     * @var Query
     */
    public $query;


    /**
     * Prepares the data models that will be made available in the current page.
     * @return array the available data models
     * @throws InvalidConfigException
     */
    protected function prepareModels()
    {
        if (!$this->query instanceof QueryInterface) {
            throw new InvalidConfigException(
                'The "query" property must be an instance of a class that implements the '.
                'Zaioll\ActiveResource\QueryInterface or its subclasses.'
            );
        }

        $query = clone $this->query;

        if (($pagination = $this->getPagination()) !== false) {
            $pagination->totalCount = $this->getTotalCount();
            $query->limit($pagination->getLimit())
                ->offset($pagination->getOffset());
        }

        return $query->all();
    }

    /**
     * Prepares the keys associated with the currently available data models.
     * @param Model[] $models the available data models
     * @return array the keys
     */
    protected function prepareKeys($models)
    {
        $keys = [];
        foreach ($models as $model) {
            $keys[] = $model->getPrimaryKey();
        }
        return $keys;
    }

    /**
     * Returns a value indicating the total number of data models in this data provider.
     * @return integer total number of data models in this data provider.
     */
    protected function prepareTotalCount()
    {
        return $this->query->count();
    }

    /**
     * @inheritDoc
     */
    public function setPagination($value)
    {
        if (is_array($value)) {
            $config = ['class' => Pagination::class];
            if ($this->id !== null) {
                $config['pageParam'] = $this->id . '-page';
                $config['pageSizeParam'] = $this->id . '-per-page';
            }
            return parent::setPagination(Yii::createObject(array_merge($config, $value)));
        }
        if ($value instanceof Pagination || $value === false) {
            return parent::setPagination($value);
        }
        throw new InvalidParamException('Only Pagination instance, configuration array or false is allowed.');
    }
}
