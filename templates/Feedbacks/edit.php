<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feedback $feedback
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $feedback->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Feedbacks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="feedbacks form content">
            <?= $this->Form->create($feedback) ?>
            <fieldset>
                <legend><?= __('Edit Feedback') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('message');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
