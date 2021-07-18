                        <?php
                            $hide = Users::can('delete', 'order')?'':'style="display: none;"';
                            $total = 0;
                            $number_of_records = 0;
                        ?>
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="dataTables-orderlist">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Loại</th>
	                                <th>SL</th>
	                                <th>Tổng</th>
	                                <th>Giảm</th>
                                    <th style="width: 50px;">Ngày</th>
                                    <th>Khách hàng</th>
                                    <th>VAT</th>
                                    <th class="not_filter" style="width: 30px;">Đã giao</th>
                                    <th <?=$hide?> class="not_filter"><span class="hidden-lg hidden-md">Thao tác</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($orders): ?>
                                    <?php
                                        foreach($orders as $item):
                                            $number_of_records++;
                                            $total += $item['total'];
                                            $code = $item['code']?$item['code']:$item['id'];
                                            $booking_info = json_decode($item['shipping_info']);
                                            $delivery_date = $item['delivery_date']?$item['delivery_date']:$item['created_dtm'];
                                    ?>
                                <tr id="<?=$item['id']?>">
                                    <td class="center">
	                                    <a target="_blank" href="<?=ROOT_URL. 'in/'.$code?>"><?=$code?></a>
	                                    <?php if($item['status'] == 'Failed'):?><br/>(Hủy)<?php endif; ?>
	                                </td>
                                    <td class="center"><?=$item['type_name']?></td>
	                                <td class="center"><?=$item['quantity']?></td>
	                                <td class="center" data-value="<?=$item['total']*1000?>"><?=number_format($item['total'], 3, '.', '.')?>đ</td>
	                                <td class="center"><?=$item['discount'] > 0?number_format($item['discount'], 3, '.', '.'):'0'?>đ</td>
                                    <td class="center" data-value="<?=strtotime($delivery_date)?>"><?=date('d/m H:i', strtotime($delivery_date))?></td>
                                    <td class="has_tooltip">
                                    <?php if (isset($booking_info->fullname)):?>
                                        <a target="_blank" href="<?=BASE_URL. $URIs['customers']?>/tim/<?=$item['customer_mobile']?>"><?=$booking_info->fullname?></a>, <?=$booking_info->address?><?=!empty($booking_info->ward)?", phường $booking_info->ward,":''?><?=!empty($booking_info->district)?' quận '.$booking_info->district:''?>
	                                    <?php if(!empty($booking_info->mobile)):?>
		                                    - <?=$booking_info->mobile?>
	                                    <?php endif;?>
                                        <?php if (Users::is_admin() && !empty($booking_info->email)) {echo '<br/>Email: '.$booking_info->email;} ?>
                                        <?php if (!empty($booking_info->builiding)):?>
                                        <br />
                                        <b>Tòa nhà: </b><?=$booking_info->builiding?>
                                        <?php endif;?>
	                                    <div class="efruit_note" data-pk="<?=$item['id']?>" data-type="textarea" data-toggle="manual" data-title="Nhập ghi chú" data-placement="top"><?=getvalue($item, 'efruit_note')?></div>
	                                    <a href="#" class="edit-note" data-id="<?=$item['id']?>"><i class="fa fa-pencil" style="padding-right: 5px"></i>[ghi chú]</a>
                                    <?php endif;?>
                                    </td>
                                    <td class="center"><?=$item['VAT']>0?'Có':''?></td>
                                    <td class="center">
                                        <?php if ($item['need_customer_details'] && $item['status'] != 'Failed'):?>
                                        <div class="custom-checkbox-with-tick small">
                                            <input id="is_shipped_<?=$item['id']?>" type="checkbox" value="1" class="is_shipped" <?=getvalue($item, 'is_shipped')?'checked="checked"':''?> autocomplete="off"/>
                                            <label for="is_shipped_<?=$item['id']?>">&nbsp;</label>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td <?=$hide?> class="center">
                                        <?php if (Users::can('delete', 'order')):?>
                                        <a href="#" class="delete_item btn btn-sm btn-danger" title="Xóa"><i class="fa fa-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <input type="hidden" id="order_total" value="<?=number_format($total,3,'.','.')?>" />
                        <input type="hidden" id="number_of_records" value="<?=$number_of_records?>" />