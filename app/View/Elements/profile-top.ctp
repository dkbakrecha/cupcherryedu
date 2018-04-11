<div class="notes-search">
    <div class="bg-stripe-overlay">    
        <div class="container">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                echo $this->Form->create('SearchForm', array('type' => 'get'));
                ?>
                <div class = "input-group input-group-lg">
                    <?php
                    echo $this->Form->input('q', array(
                        'div' => false,
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Search..',
                        'required' => true,
                            //'name' => 'q'
                    ));
                    ?>
                    <span class="input-group-btn">
                        <?php
                        echo $this->Form->button('Submit', array(
                            'type' => 'submit',
                            'div' => false,
                            'class' => 'btn btn-secondary',
                        ));
                        ?>  
                    </span>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div> 
        </div> 
    </div>
</div>

<section class="page-control" style="display: none;"><div class="container"><div class="page-info"><a href="/"><i class="icon fa fa-long-arrow-left"></i>
                    Back to home
                </a></div> <div class="page-view"><div class="mc-select"><button type="button" id="sortOrder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default dropdown-toggle sortbtn" style="box-shadow: none; text-transform: none;">
                                                    Sort by
                                                &nbsp;&nbsp;
                        <i class="fa fa-angle-down"></i></button> <ul aria-labelledby="sortOrder" class="dropdown-menu"><li><a href="http://gold.tutorproapp.com/courses?sort_order=dte_recent_first">Recent first</a></li> <li><a href="http://gold.tutorproapp.com/courses?sort_order=dte_recent_last">Oldest-first</a></li> <li><a href="http://gold.tutorproapp.com/courses?sort_order=price_asc">Price (asc)</a></li> <li><a href="http://gold.tutorproapp.com/courses?sort_order=price_desc">Price (desc)</a></li> <li><a href="http://gold.tutorproapp.com/courses?sort_order=highest_rated">Highest rated</a></li></ul></div></div></div></section>