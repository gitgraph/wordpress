


<?php $ihhd = ''; ?>
<?php if (get_theme_mod('ihhd')) { ?> 
    <?php $ihhd = get_theme_mod('ihhd'); ?>
<?php } ?> <?php $imghh = ''; ?> 
<?php if (get_theme_mod('imgbi')) { ?>
    <?php $imghh = get_theme_mod('imgbi'); ?>
    <?php
} else {
    $imghh = '

<div id="wdef2">
</div>';
}
?> 

<div id="headimg"> <?php
if (get_theme_mod('imbr')) {
    $blur = get_theme_mod('imbr');
}
?> 

<div id="himg"> <?php
    if (get_theme_mod('imgbi')) {
        if ($_SESSION['browser'] != 'def') {
            ?> <img src="<?php echo $imghh; ?>"> <?php
            } if ($_SESSION['browser'] == 'def') {
                if (get_theme_mod('imbr')) {
                    ?> <img style="opacity: 0; z-index: -2;" src="<?php echo $imghh; ?>"> 
                    <svg> <image x="0" y="0" style="filter: url(#blur); opacity: 1; z-index: 2;" xlink:href="<?php echo $imghh; ?>" />
                    <filter id="blur"> <?php if ($blur > 0) { ?> <feGaussianBlur stdDeviation="<?php echo $blur; ?>" /><?php } ?> 
                    </filter> </svg> <?php } else { ?> <img src="<?php echo $imghh; ?>">
                <?php } ?> 
                <?php
            }
        } else {
            echo $imghh;
        }
        ?> 
</div>

    <?php if ($_SESSION['browser'] != 'def') { ?> 
        <svg height="100%" width="100%"> 
        <defs>
        <filter id="blur" x="0" y="0">
            <?php if ($blur > 0) { ?> 
                <feGaussianBlur in="SourceGraphic" stdDeviation="<?php echo $blur; ?>" />
            <?php } ?> 
        </filter> </defs> 
        </svg> <?php } ?>
    

<div id="hdbox"> 
        

<div id="headtext"> 
            <?php echo $ihhd; ?>
        
</div> 
    
</div> 

</div> 