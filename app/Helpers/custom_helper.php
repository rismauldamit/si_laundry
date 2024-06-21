<?php
function MoneyFormatID($money): string
{
    return "Rp " . number_format($money, 0, ',', '.');
}
