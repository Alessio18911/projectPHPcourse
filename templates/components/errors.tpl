<?php if(!empty($errors)):
    foreach($errors as $error): ?>
        <?php if(count($error) == 1): ?>                    
            <div class="notifications mb-20">
                <div class="notifications__title notifications__title--error"><?=$error['title']?></div>                    
            </div>                
        <?php elseif(count($error) > 1): ?>
            <div class="notifications notifications__title--with-message mb-20">
                <div class="notifications__title notifications__title--error "><?=$error['title']?></div>
                <div class="notifications__message">
                    <p><?=$error['desc']?></p>						
                </div>
            </div>                
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif;?>