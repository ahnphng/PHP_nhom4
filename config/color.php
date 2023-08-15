<?php 
    CONST COLOR_PRODUCT = [
        [
            'type' => 'blue',
            'label' => 'Xanh dương',
            'hex' => '#0000ff',
        ],
        [
            'type' => 'yellow',
            'label' => 'Vàng',
            'hex' => '#ffff00',
        ],
        [
            'type' => 'pink',
            'label' => 'Hồng',
            'hex' => '#ffc0cb',
        ],
        [
            'type' => 'green',
            'label' => 'Xanh lá',
            'hex' => '#008000',
        ],
        [
            'type' => 'brown',
            'label' => 'Nâu',
            'hex' => '#a52a2a',
        ],
        [
            'type' => 'red',
            'label' => 'Đỏ',
            'hex' => '#ff0000',
        ],
    ];
    
    function getColor($color_type) {
        foreach (COLOR_PRODUCT as $value) {
            if ($value['type'] == $color_type) {
                return $value;
            }
        }
    }
?>