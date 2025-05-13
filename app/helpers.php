<?php

if (!function_exists('pieSlice')) {
    function pieSlice($innerRadius, $outerRadius, $startAngle, $endAngle) {
        $start = polarToCartesian($innerRadius, $endAngle - 90);
        $end = polarToCartesian($innerRadius, $startAngle - 90);
        $outerStart = polarToCartesian($outerRadius, $endAngle - 90);
        $outerEnd = polarToCartesian($outerRadius, $startAngle - 90);
        $arcSweep = $endAngle > $startAngle ? 1 : 0;
        return "M {$outerStart['x']} {$outerStart['y']} A {$outerRadius} {$outerRadius} 0 {$arcSweep} 0 {$outerEnd['x']} {$outerEnd['y']} L {$end['x']} {$end['y']} A {$innerRadius} {$innerRadius} 0 {$arcSweep} 1 {$start['x']} {$start['y']} Z";
    }
}

if (!function_exists('polarToCartesian')) {
    function polarToCartesian($radius, $angleInDegrees) {
        $angleInRadians = deg2rad($angleInDegrees);
        return [
            'x' => 125 + ($radius * cos($angleInRadians)),
            'y' => 125 + ($radius * sin($angleInRadians))
        ];
    }
} 