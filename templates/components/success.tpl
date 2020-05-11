<?php if(!empty($success)):
    foreach($success as $item): ?>
        <?php if(count($item) == 1): ?>                    
            <div class="notifications mb-20">
                <div class="notifications__title notifications__title--success"><?=$item['title']?></div>                    
            </div>                
        <?php elseif(count($item) > 1): ?>
            <div class="notifications notifications__title--with-message mb-20">
                <div class="notifications__title notifications__title--success"><?=$item['title']?></div>
                <div class="notifications__message">
                    <p><?=$item['desc']?></p>						
                </div>
            </div>                
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif;?>