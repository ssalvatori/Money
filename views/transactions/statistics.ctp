<h2>Statistics</h2>

<div class="transactions-form">
    <?php echo $this->Form->create('Transaction'); ?>

    <?php
    echo $this->Form->input('account_id');
    echo $this->Form->input('date_realized', array(
        'dateFormat' => 'MY',
        'maxYear' => date('Y'),
        'minYear' => $min_year,
        'label' => "Select month and year"
            )
    );
    echo $this->Form->input('category_type',array('label'=>__('Type',true),'options' => Category::statuses()));
    ?>

    <?php echo $this->Form->end("Search"); ?>

    <?php
    if (isset($transactions_stats)) {
        $transactions_stats_for_Gchart = $this->GChart->changeFormat($transactions_stats);

        $data = array(
            'labels' => array(
                array('string' => __("Categories", true)),
                array('number' => 'amount')
            ),
            'data' => $transactions_stats_for_Gchart,
            'title' => __("Outcoming by Category {$month} {$year}", true),
            'type' => 'pie',
            'width' => 600,
            'height' => 400,
        );

        echo $this->GChart->start('amount_categories');
        echo $this->GChart->visualize('amount_categories', $data);
    }
    ?>
</div>