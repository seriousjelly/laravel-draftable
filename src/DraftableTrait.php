<?php namespace Seriousjelly\Draftable;

trait DraftableTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootDraftableTrait()
    {
        static::addGlobalScope(new DraftableScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getStatusColumn()
    {
        return defined('static::STATUS_COLUMN') ? static::STATUS_COLUMN : 'status';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedStatusColumn()
    {
        return $this->getTable().'.'.$this->getStatusColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withDrafts()
    {
        return with(new static)->newQueryWithoutScope(new DraftableScope);
    }
}