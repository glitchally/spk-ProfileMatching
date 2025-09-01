<?php
function nilaiBobot($gap) {
  $bobot = [
    0 => 5,
    1 => 4.5,
    -1 => 4,
    2 => 3.5,
    -2 => 3,
    3 => 2.5,
    -3 => 2,
    4 => 1.5,
    -4 => 1,
  ];
  return $bobot[$gap] ?? 0;
}

function getAlternatif() {
  return [
    "Wardah UV Shield SPF 50" => [3, 5, 3, 5, 3, 5, 4, 5],
    "Azarine Hydrasoothe" => [5, 5, 4, 4, 4, 5, 5, 5],
    "Skintific 5X Ceramide" => [2, 5, 4, 5, 3, 5, 4, 5],
    "Emina Sun Battle" => [5, 3, 3, 3, 5, 4, 4, 4],
    "Nivea Sun Protect" => [2, 4, 2, 3, 3, 3, 3, 4],
    "Somethinc Glowing Up" => [2, 5, 4, 4, 4, 5, 5, 5],
    "Avoskin The Great Shield" => [3, 4, 3, 4, 3, 5, 4, 5],
  ];
}
?>