<?php

namespace app\models\traits;

trait ObjectNameTrait
{
    /**
     * Если в трейте жестко прописаны зависимости модели, то почему это трейт?
     * Предполагаю потому что его планировали использовать где-то еще
     * Перенес установку зависимостей в модель, чтобы трейт можно было переиспользовать
     *
     * array of class names to relate
     * @return string[]
     */
    public abstract function getObjectTraitRelations();

    /**
     * @param $name
     * @param bool $throwException
     * @return mixed
     */
    public function getRelation($name, $throwException = true)
    {
        $getter = 'get' . $name;
        $class = self::getClassNameByRelation($name);

        if (!method_exists($this, $getter) && $class) {
            return $this->hasOne($class, ['id' => 'object_id']);
        }

        return parent::getRelation($name, $throwException);
    }

    /**
     * @param $className
     * @return mixed
     */
    public static function getObjectByTableClassName($className)
    {
        if (method_exists($className, 'tableName')) {
            return str_replace(['{', '}', '%'], '', $className::tableName());
        }

        return $className;
    }

    /**
     * @param $relation
     * @return string|null
     */
    public static function getClassNameByRelation($relation)
    {
        foreach (self::$classes as $class) {
            if (self::getObjectByTableClassName($class) == $relation) {
                return $class;
            }
        }
        return null;
    }
}