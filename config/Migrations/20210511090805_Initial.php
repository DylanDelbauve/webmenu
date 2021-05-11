<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('allergens')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('allergens_dishes')
            ->addColumn('allergen_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('dish_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'dish_id',
                ]
            )
            ->addIndex(
                [
                    'allergen_id',
                ]
            )
            ->create();

        $this->table('dish_types')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        $this->table('dishes')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('dish_type_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'dish_type_id',
                ]
            )
            ->create();

        $this->table('dishes_menus')
            ->addColumn('menu_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('dish_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('priority', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'dish_id',
                ]
            )
            ->addIndex(
                [
                    'menu_id',
                ]
            )
            ->create();

        $this->table('menus')
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('allergens_dishes')
            ->addForeignKey(
                'dish_id',
                'dishes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'allergen_id',
                'allergens',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('dishes')
            ->addForeignKey(
                'dish_type_id',
                'dish_types',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('dishes_menus')
            ->addForeignKey(
                'dish_id',
                'dishes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'menu_id',
                'menus',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('allergens_dishes')
            ->dropForeignKey(
                'dish_id'
            )
            ->dropForeignKey(
                'allergen_id'
            )->save();

        $this->table('dishes')
            ->dropForeignKey(
                'dish_type_id'
            )->save();

        $this->table('dishes_menus')
            ->dropForeignKey(
                'dish_id'
            )
            ->dropForeignKey(
                'menu_id'
            )->save();

        $this->table('allergens')->drop()->save();
        $this->table('allergens_dishes')->drop()->save();
        $this->table('dish_types')->drop()->save();
        $this->table('dishes')->drop()->save();
        $this->table('dishes_menus')->drop()->save();
        $this->table('menus')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
