<?php
namespace App\Model\Table;

use App\Model\Entity\Project;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \Cake\ORM\Association\HasMany $Attachments
 * @property \Cake\ORM\Association\HasMany $Sprints
 * @property \Cake\ORM\Association\HasMany $Tasks
 * @property \Cake\ORM\Association\HasMany $Teams
 */
class ProjectsTable extends Table
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

        $this->table('projects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Attachments', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Sprints', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'project_id'
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
            ->integer('managerid')
            ->requirePresence('managerid', 'create')
            ->notEmpty('managerid');

        $validator
            ->allowEmpty('client_name');

        $validator
            ->allowEmpty('description');

//        $validator
//            ->date('start_date')
//            ->requirePresence('start_date', 'create')
//            ->notEmpty('start_date');
//
//        $validator
//            ->date('end_date')
//            ->requirePresence('end_date', 'create')
//            ->notEmpty('end_date');
//
//        $validator
//            ->date('actual_end_date')
//            ->requirePresence('actual_end_date', 'create')
//            ->notEmpty('actual_end_date');

        $validator
            ->decimal('amount')
            ->allowEmpty('amount');

        $validator
            ->allowEmpty('duration');

        $validator
            ->integer('duration_hours')
            ->allowEmpty('duration_hours');

        $validator
            ->integer('current_status')
            ->allowEmpty('current_status');

        $validator
            ->integer('achieve_status')
            ->allowEmpty('achieve_status');

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
}
