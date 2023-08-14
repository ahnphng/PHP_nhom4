<?php 
    CONST ORDER_TYPE = [
        [
            'type' => 1,
            'label' => 'Đơn được tạo',
        ],
        [
            'type' => 2,
            'label' => 'Đơn đã xác nhận',
        ],
        [
            'type' => 3,
            'label' => 'Đơn đã được gửi',
        ],
        [
            'type' => 4,
            'label' => 'Đơn giao thành công',
        ],
        [
            'type' => -1,
            'label' => 'Đơn bị huỷ',
        ],
    ];
    function getOrderStatus($status) {
        foreach (ORDER_TYPE as $value) {
            if ($value['type'] == $status) {
                return $value;
            }
        }
    }
?>