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
            <?= $this->Html->link(__('List Project Hearts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projectHearts form content">
            <?= $this->Form->create($projectHeart) ?>
            <fieldset>
                <legend><?= __('Add Project Heart') ?></legend>
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
