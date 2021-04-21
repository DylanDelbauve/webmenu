<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DishTypes Model
 *
 * @property \App\Model\Table\DishesTable&\Cake\ORM\Association\HasMany $Dishes
 *
 * @method \App\Model\Entity\DishType newEmptyEntity()
 * @method \App\Model\Entity\DishType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DishType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DishType get($primaryKey, $options = [])
 * @method \App\Model\Entity\DishType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DishType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DishType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DishType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DishType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DishType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DishTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('dish_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Dishes', [
            'foreignKey' => 'dish_type_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
