<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity.
 *
 * @property int $id
 * @property int $managerid
 * @property string $client_name
 * @property string $description
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property \Cake\I18n\Time $actual_end_date
 * @property float $amount
 * @property string $duration
 * @property int $duration_hours
 * @property int $current_status
 * @property int $achieve_status
 * @property \Cake\I18n\Time $created_at
 * @property int $created_by
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Sprint[] $sprints
 * @property \App\Model\Entity\Task[] $tasks
 * @property \App\Model\Entity\Team[] $teams
 */
class Project extends Entity
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
