<?php
require __DIR__ . '/vendor/autoload.php';

use Webkul\Customer\Rules\VatValidator;

$validator = new VatValidator();

echo "Testing BQ (Undefined Country)...\n";
try {
    // '123' doesn't look like a valid VAT to split, but splitVat splits by 2 chars.
    // validate('123', 'BQ'):
    // 1. vatCleaner('123') -> '123'
    // 2. splitVat('123') -> ['12', '3']
    // 3. '12' not in patterns.
    // 4. formCountry is 'BQ'.
    // 5. country = 'BQ'.
    // 6. Check if 'BQ' in patterns. (This is where the fix is)
    $result = $validator->validate('123', 'BQ');
    echo "Result for BQ: " . ($result ? 'Valid' : 'Invalid (Correctly handled)') . "\n";
} catch (\Throwable $e) {
    echo "FAIL: Exception caught: " . $e->getMessage() . "\n";
}

echo "Testing AT (Valid Country)...\n";
try {
    // AT pattern: U[A-Z\d]{8}
    // Let's pass something that matches valid splits or just valid country fallback
    // validate('U12345678', 'AT')
    $result = $validator->validate('U12345678', 'AT');
    echo "Result for AT: " . ($result ? 'Valid' : 'Invalid') . "\n";
} catch (\Throwable $e) {
    echo "FAIL: Exception caught for AT: " . $e->getMessage() . "\n";
}
