<?php

function findCombinations($inputArray, $score, $countNilai) {
  $combinations = [];

  for ($i = 0; $i < $countNilai; $i++) {
    $currentCombination = [];
    $currentSum = 0;

    for ($j = $i; $j < $countNilai; $j++) {
      $currentSum += $inputArray[$j];
      $currentCombination[] = $inputArray[$j];

      if ($currentSum === $score) {
        $combinations[] = $currentCombination;
        break;
      }

      if ($currentSum >= $score) {
        break;
      }
    }
  }
  return $combinations;
}

  $input = $_POST["input"];
  $score = $_POST["score"];

  // Cleaning input
  $input = str_replace(' ', '', $input);
  $inputArray = explode(",", $input);
  $inputArray = array_map('intval', $inputArray);
  $countNilai = count($inputArray);

  if($countNilai > 10) {
    echo "Input tidak boleh lebih dari 10 nilai";
  } else {
    // Calling function
    $combinations = findCombinations($inputArray, $score, $countNilai);

    foreach ($inputArray as $index => $value) {
      $questionNumber = $index + 1;
      $result["Pertanyaan ke-$questionNumber"] = $value;
    }

    echo "Nilai Total: " . $score . "\n";
    echo "SOAL \n";
    print_r($result);

    if (!empty($combinations)) {
      echo "Total kemungkinan kombinasi: " . count($combinations) . "\n";
      echo "Daftar kombinasi yang memenuhi skor $score:\n";
      foreach ($combinations as $combination) {
          echo implode(", ", $combination) . "\n";
      }
    } else {
      echo "Tidak ada kombinasi yang memenuhi skor $score.\n";
    }
    print_r($combinations);
  }
  
?>