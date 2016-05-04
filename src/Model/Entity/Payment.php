<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity.
 *
 * @property int $id
 * @property int $project_id
 * @property \App\Model\Entity\Project $project
 * @property int $sprint
 * @property float $amound
 * @property \Cake\I18n\Time $payment_receive_date
 * @property int $created_by
 * @property \Cake\I18n\Time $created_at
 */
class Payment extends Entity
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
