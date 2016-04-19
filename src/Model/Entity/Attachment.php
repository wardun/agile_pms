<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity.
 *
 * @property int $id
 * @property int $attachment_type_id
 * @property \App\Model\Entity\AttachmentType $attachment_type
 * @property int $project_id
 * @property \App\Model\Entity\Project $project
 * @property int $task_id
 * @property \App\Model\Entity\Task $task
 * @property string $file_name
 * @property string $file_type
 * @property \Cake\I18n\Time $created_at
 * @property int $created_by
 */
class Attachment extends Entity
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
