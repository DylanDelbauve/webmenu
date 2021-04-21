<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Allergens Model
 *
 * @property \App\Model\Table\DishesTable&\Cake\ORM\Association\BelongsToMany $Dishes
 *
 * @method \App\Model\Entity\Allergen newEmptyEntity()
 * @method \App\Model\Entity\Allergen newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Allergen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Allergen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Allergen findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Allergen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Allergen[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Allergen|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allergen saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allergen[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allergen[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allergen[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allergen[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AllergensTable extends Table
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

        $this->setTable('allergens');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Dishes', [
            'foreignKey' => 'allergen_id',
            'targetForeignKey' => 'dish_id',
            'joinTable' => 'allergens_dishes',
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
}
