<?php
namespace App\Model\Table;

use App\Model\Entity\Task;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\HasMany $Attachments
 * @property \Cake\ORM\Association\HasMany $Sprints
 */
class TasksTable extends Table
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

        $this->table('tasks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Attachments', [
            'foreignKey' => 'task_id'
        ]);
        $this->hasMany('Sprints', [
            'foreignKey' => 'task_id'
        ]);
        
        $this->belongsTo('AssignedUser', [
            'className' => 'Users',
            'foreignKey' => false,
            'conditions' => '`Tasks`.`assgined_to` = `AssignedUser`.`id`',
            'fields' => 'first_name,last_name',
        ]);
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
            ->requirePresence('task_name', 'create')
            ->notEmpty('task_name');

        $validator
            ->allowEmpty('detail');

        $validator
            ->integer('assgined_to')
            ->allowEmpty('assgined_to');
        
        $validator
            ->integer('task_duration')
            ->allowEmpty('task_duration');

//        $validator
//            ->dateTime('start_date')
//            ->allowEmpty('start_date');
//
//        $validator
//            ->dateTime('end_date')
//            ->allowEmpty('end_date', 'create');
//
//        $validator
//            ->dateTime('actual_end_date')
//            ->allowEmpty('actual_end_date', 'create');

//        $validator
//            ->dateTime('created_at')
//            ->requirePresence('created_at', 'create')
//            ->notEmpty('created_at');
//
//        $validator
//            ->integer('created_by')
//            ->allowEmpty('created_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        return $rules;
    }
}
