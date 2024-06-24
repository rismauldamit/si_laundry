<?php

function IDR($data)
{
    return "Rp. " . number_format($data, 0, ',', '.');
}
