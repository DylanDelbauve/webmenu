<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DishesMenus Model
 *
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsTo $Menus
 * @property \App\Model\Table\DishesTable&\Cake\ORM\Association\BelongsTo $Dishes
 *
 * @method \App\Model\Entity\DishesMenu newEmptyEntity()
 * @method \App\Model\Entity\DishesMenu newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DishesMenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DishesMenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\DishesMenu findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DishesMenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DishesMenu[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DishesMenu|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DishesMenu saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DishesMenu[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishesMenu[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishesMenu[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DishesMenu[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DishesMenusTable extends Table
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

        $this->setTable('dishes_menus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dishes', [
            'foreignKey' => 'dish_id',
            'joinType' => 'INNER',
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
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmptyString('priority');

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
        $rules->add($rules->existsIn(['menu_id'], 'Menus'), ['errorField' => 'menu_id']);
        $rules->add($rules->existsIn(['dish_id'], 'Dishes'), ['errorField' => 'dish_id']);

        return $rules;
    }
}
