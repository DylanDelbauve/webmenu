<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dishes Model
 *
 * @property \App\Model\Table\DishTypesTable&\Cake\ORM\Association\BelongsTo $DishTypes
 * @property \App\Model\Table\AllergensTable&\Cake\ORM\Association\BelongsToMany $Allergens
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsToMany $Menus
 *
 * @method \App\Model\Entity\Dish newEmptyEntity()
 * @method \App\Model\Entity\Dish newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Dish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dish get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dish findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Dish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dish[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dish|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dish saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DishesTable extends Table
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

        $this->setTable('dishes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('DishTypes', [
            'foreignKey' => 'dish_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Allergens', [
            'foreignKey' => 'dish_id',
            'targetForeignKey' => 'allergen_id',
            'joinTable' => 'allergens_dishes',
        ]);
        $this->belongsToMany('Menus', [
            'foreignKey' => 'dish_id',
            'targetForeignKey' => 'menu_id',
            'joinTable' => 'dishes_menus',
            'through' => 'DishesMenus',
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['dish_type_id'], 'DishTypes'), ['errorField' => 'dish_type_id']);

        return $rules;
    }
}
