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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectHeart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectHeart->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Project Hearts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projectHearts form content">
            <?= $this->Form->create($projectHeart) ?>
            <fieldset>
                <legend><?= __('Edit Project Heart') ?></legend>
                <?php
                    echo $this->Form->control('ip_address');
                    echo $this->Form->control('project_id', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
