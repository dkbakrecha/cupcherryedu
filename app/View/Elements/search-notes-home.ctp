<div class="notes-search home">
    <div class="bg-stripe-overlay">    
        <div class="container">
            <h3>The Future Begins Here!</h3>
            <p>Working collaboratively to ensure every student achieves academically,<br> socially, and emotionally.</p>
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                echo $this->Form->create('SearchForm', array('url' => array('controller' => 'posts', 'action' => 'index'), 'type' => 'get'));
                ?>
                <div class = "input-group input-group-lg">
                    <?php
                    echo $this->Form->input('q', array(
                        'div' => false,
                        'class' => 'form-control home-search-text',
                        'label' => false,
                        'placeholder' => 'Enter your search here',
                        'required' => true,
                            //'name' => 'q'
                    ));
                    ?>

                    <span class="input-group-btn">
                        <?php
                        echo $this->Form->input('field', array(
                            'options' => array(1 => "Articles", 2 => "Notes", 3 => "Exam Notificaions"),
                            'empty' => 'All Categories',
                            'div' => false,
                            'class' => 'form-control home-search-select',
                            'label' => false,
                        ));
                        ?>
                    </span>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary home-search-button"><i class="fa fa-search"></i></button>  
                    </span>
                </div>

                <div class="slider-feature be-center">
                    <ul>
                        <li><?php echo $this->Html->image('book.png', array('alt' => 'Notes Collection')); ?> 500+ Study Articles</li>
                        <li><?php echo $this->Html->image('man.png', array('alt' => 'Important Questions Collection')); ?> 1500+ Questions</li>
                    </ul>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div> 
        </div> 
    </div>
</div>