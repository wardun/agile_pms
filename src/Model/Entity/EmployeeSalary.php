<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeSalary Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property float $current_salaty
 * @property \Cake\I18n\Time $last_increment_date
 * @property float $last_increment_amount
 * @property \Cake\I18n\Time $created_at
 * @property int $created_by
 */
class EmployeeSalary extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
