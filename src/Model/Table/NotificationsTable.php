<?php
namespace App\Model\Table;

use App\Model\Entity\Notification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifications Model
 *
 */
class NotificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('notifications');
        $this->displayField('id');
        $this->primaryKey('id');


//        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('receiverid')
            ->requirePresence('receiverid', 'create')
            ->notEmpty('receiverid');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->allowEmpty('link');

//        $validator
//            ->integer('status')
//            ->requirePresence('status', 'create')
//            ->notEmpty('status');

//        $validator
//            ->integer('created_by')
//            ->requirePresence('created_by', 'create')
//            ->notEmpty('created_by');

        return $validator;
    }
}
