<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectHeart Entity
 *
 * @property int $id
 * @property string|null $ip_address
 * @property int $project_id
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectHeart extends Entity
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
        'ip_address' => true,
        'project_id' => true,
        'project' => true,
    ];
}
