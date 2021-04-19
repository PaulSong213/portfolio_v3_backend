<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects view content">
            <h3><?= h($project->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($project->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($project->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('File') ?></th>
                    <td><?= h($project->file) ?></td>
                </tr>
                <tr>
                    <th><?= __('ImageThumbnail') ?></th>
                    <td><?= h($project->imageThumbnail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Project Hearts') ?></h4>
                <?php if (!empty($project->project_hearts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Ip Address') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->project_hearts as $projectHearts) : ?>
                        <tr>
                            <td><?= h($projectHearts->id) ?></td>
                            <td><?= h($projectHearts->ip_address) ?></td>
                            <td><?= h($projectHearts->project_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProjectHearts', 'action' => 'view', $projectHearts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectHearts', 'action' => 'edit', $projectHearts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectHearts', 'action' => 'delete', $projectHearts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectHearts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
