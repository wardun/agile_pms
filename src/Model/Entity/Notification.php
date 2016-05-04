<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity.
 *
 * @property int $id
 * @property int $receiverid
 * @property string $message
 * @property string $link
 * @property int $status
 * @property int $created_by
 * @property \Cake\I18n\Time $created
 */
class Notification extends Entity
{

}
