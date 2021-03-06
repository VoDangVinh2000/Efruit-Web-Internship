<?php
if(!empty($cat_products) || !empty($products_in_tags)):
    if(empty($number_of_cols)){
        $number_of_cols = Hash::get($obj, 'config.number_of_cols_in_frontend', 4);
    }
?>
<div class="product-listing <?=empty($class)?'':$class?>">
    <?php if(!empty($heading)): ?>
        <h1 class="title center" style="margin: 30px;" bind-translate="<?=$heading?>"><?=$heading?></h1>
    <?php endif; ?>
    <div class="row">
        <?php
        $counter = 0;
        $viewed_products = array();
        if(!empty($cat_products)):
            foreach($cat_products as $item):
                $viewed_products[$item['product_id']] = true;
                $counter ++;
                $need_hide = !empty($showMore) && $counter > NUMBER_OF_ITEMS_PER_PAGE;
                ?>
                <div class="product-item col-xs-6 col-sm-<?=intval(12/$number_of_cols)?> <?=$need_hide?'e-hide':''?>" <?=$need_hide?'style="display:none;"':''?>>
                    <?php $this->load_partial('product-item-box', array('item' => $item)); ?>
                </div>
        <?php
            endforeach;
        endif;

        if(!empty($products_in_tags)):
            foreach($products_in_tags as $tag_id => $items):
                foreach($items as $item){
                    if(!empty($viewed_products[$item['product_id']])) continue;
                    $viewed_products[$item['product_id']] = true;
                    $counter ++;
                    $need_hide = !empty($showMore) && $counter > NUMBER_OF_ITEMS_PER_PAGE;
                    ?>
                    <div class="product-item col-xs-6 col-sm-<?=intval(12/$number_of_cols)?> <?=$need_hide?'e-hide':''?>" <?=$need_hide?'style="display:none;"':''?>>
                    <?php
                    $this->load_partial('product-item-box', array('item' => $item, 'tag_id' => $tag_id));
                    ?>
                    </div>
                    <?php
                }
            endforeach;
        endif;
        $total_products = count($viewed_products);
        ?>
    </div>
    <?php if(!empty($showMore) && $total_products > NUMBER_OF_ITEMS_PER_PAGE): ?>
    <div class="clearfix"></div>
    <div class="search-more">
        <div style="background: #fff;" id="more" data-page="1" bind-translate="Xem th??m">Xem th??m</div>
    </div>
    <?php endif;?>
</div>
<?php endif;?>