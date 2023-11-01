<?php
function Palindrome($word)
{

    $length = strlen($word);
    $start = 0;
    $end = $length - 1;

    while ($start < $end) {
        if ($word[$start] !== $word[$end]) {
            return false;
        }
        $start++;
        $end--;
    }

    return true;
}


if (Palindrome("tacocat")) {
    echo "It's a palindrome!";
} else {
    echo "It's not a palindrome.";
}
