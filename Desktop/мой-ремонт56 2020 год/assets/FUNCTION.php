<?
$orders_m_procent = round(((100 / $orders_mothers_h)*$orders_mothers) - 100, 0, PHP_ROUND_HALF_EVEN);
if($orders_mothers_h < $orders_mothers){ 
    $fa_caret = "fa fa-caret-up fa-lg"; 
}else if ($orders_mothers_h > $orders_mothers){
    $fa_caret = "fa fa-caret-down fa-lg";
    $messeng_ads = '<div class="col-sm-3">
                        <div class="profit" id="profitClose">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="entypo-attention"></i>&nbsp;&nbsp;Число заказов упало</span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#profitClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="value">
                                ADS
                            </div>

                            <div class="progress-tinny">
                                <div style="width: 50%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <i class="entypo-sound"></i>&nbsp;&nbsp;Внимание, число заказов упало, советую обратиться за <b>пиаром</b>.</div>
                        </div>
                    </div>';
}else{ $fa_caret = "entypo-dot-3"; }

?>