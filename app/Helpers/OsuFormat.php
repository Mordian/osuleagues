<?php 

function formatMode($mode)
{
	$modes = [
		'Standard',
		'Taiko',
		'Catch the Beat',
		'Mania'
	];

	return $modes[$mode];
}

function modeToInt($mode)
{
	$modes = [
		'standard' => 0,
		'taiko' => 1,
		'ctb' => 2,
		'catch the Beat' => 2, // ayy lmao next level programming
		'mania' => 3
	];

	if (isset($modes[$mode]))
	{
		return $modes[$mode];
	}
	else
	{
		return false;
	}
}

function formatRomans($number)
{
	$romans = [
		false,
		'I',
		'II',
		'III'
	];

	return $romans[$number];
}

function formatBitwise($input)
{
	$bitwise = [
		'NF,' => 1,
		'EZ,' => 2,
		'HD,' => 8,
		'HR,' => 16,
		'SD,' => 32,
		'DT,' => 64,
		'HT,' => 256,
		'FL,' => 1024,
		'PF,' => 16384,
		'4KEYS,' => 32768,
		'5KEYS,' => 65536,
		'6KEYS,' => 131072,
		'7KEYS,' => 262144,
	];

	$output = '';

	foreach ($bitwise as $key => $value)
	{
		if ($input & $value)
		{
			$output .= $key;
		}
	}

	return trim($output, ',');
}