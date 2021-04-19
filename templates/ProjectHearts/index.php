<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectHeart[]|\Cake\Collection\CollectionInterface $projectHearts
 */
?>
<div class="projectHearts index content">
    <?= $this->Html->link(__('New Project Heart'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project Hearts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ip_address') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectHearts as $projectHeart): ?>
                <tr>
                    <td><?= $this->Number->format($projectHeart->id) ?></td>
                    <td><?= h($projectHeart->ip_address) ?></td>
                    <td><?= $projectHeart->has('project') ? $this->Html->link($projectHeart->project->title, ['controller' => 'Projects', 'action' => 'view', $projectHeart->project->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectHeart->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectHeart->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectHeart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectHeart->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
