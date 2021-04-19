<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectHeart $projectHeart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project Heart'), ['action' => 'edit', $projectHeart->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project Heart'), ['action' => 'delete', $projectHeart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectHeart->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Project Hearts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project Heart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projectHearts view content">
            <h3><?= h($projectHeart->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ip Address') ?></th>
                    <td><?= h($projectHeart->ip_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectHeart->has('project') ? $this->Html->link($projectHeart->project->title, ['controller' => 'Projects', 'action' => 'view', $projectHeart->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projectHeart->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
